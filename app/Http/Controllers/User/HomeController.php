<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function index(){
        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [1]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);
        $image = DB::select('SELECT * FROM posts');
        
        return view('user.home', [
            'students' => $student,
            'notifications' => $notifications,
            'image' => $image
        ]);
    }

    public function sample(){
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);
        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [1]);

        // $sample = Order::whereHas('purchase', function($q){
        //     $q->where('parent_id', '=', 1);
        // })->whereHas('food', function($e){
        //     $e->where('grade', '=', 4)
        //     ->orWhere('grade', '=', 5)
        //     ->orWhere('grade', '=', 6);
        // })->count();

        // dd($sample);

        

        
        
        return view('user.sample', [
            'students' => $student,
            'notifications' => $notifications,
            'anak' => Student::findOrFail(1)
        ]);
    }
}
