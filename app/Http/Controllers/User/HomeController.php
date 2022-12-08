<?php

namespace App\Http\Controllers\User;

use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Purchase;
use App\Models\Adminnotif;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\Object_;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function index(){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $image = DB::select('SELECT * FROM posts');
        
        return view('user.home', [
            'students' => $student,
            'notifications' => $notifications,
            'image' => $image
        ]);
    }

    public function sample(){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $adminNotifs = Adminnotif::get();

        return view('user.sample', [
            'students' => $student,
            'notifications' => $notifications,
            'anak' => Student::findOrFail(1),
            'adminNotifs' => $adminNotifs
        ]);
    }

    public function deleteAllNotifs(Request $request){

        $parent = Guardian::where('user_id', auth()->id())->get();

        //DB::table('notifications')->delete('parent_id', 1);
        Notification::getQuery()->where('parent_id', $parent[0]->id)->delete();

        return response()->json(['status' => 'Success']);
    }

}
