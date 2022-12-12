<?php

namespace App\Http\Controllers\User;

use App\Charts\UserCharts\CalorieChart;
use App\Charts\UserCharts\FatChart;
use App\Charts\UserCharts\HealthCharts;
use App\Charts\UserCharts\ParentChart;
use App\Charts\UserCharts\SatFatChart;
use App\Charts\UserCharts\SodiumChart;
use App\Charts\UserCharts\SugarChart;
use Carbon\Carbon;
use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\Survey;
use App\Models\Student;
use App\Mail\SampleMail;
use App\Models\Guardian;
use App\Models\Purchase;
use App\Models\Adminnotif;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Cast\Object_;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function index(){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $survey = Survey::where('parent_id', $parent[0]->id)
            ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }
        
        $image = DB::select('SELECT * FROM posts');
        return view('user.home', [
            'students' => $student,
            'notifications' => $notifications,
            'isSurveyAvail' => $isSurveyAvail,
            'image' => $image
        ]);
    }

    public function sample(SatFatChart $satFatChart, SugarChart $sugarChart, SodiumChart $sodiumChart, CalorieChart $calChart, FatChart $fatChart){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $adminNotifs = Adminnotif::get();
        $stud_id = 2;

        return view('user.sample', [
            'students' => $student,
            'notifications' => $notifications,
            'anak' => Student::findOrFail(1),
            'adminNotifs' => $adminNotifs,
            'calChart' => $calChart->build($stud_id),
            'fatChart' => $fatChart->build($stud_id),
            'satFatChart' => $satFatChart->build($stud_id),
            'sodiumChart' => $sodiumChart->build($stud_id),
            'sugarChart' => $sugarChart->build($stud_id)
        ]);
    }

    public function deleteAllNotifs(Request $request){

        $parent = Guardian::where('user_id', auth()->id())->get();

        //DB::table('notifications')->delete('parent_id', 1);
        Notification::getQuery()->where('parent_id', $parent[0]->id)->delete();

        return response()->json(['status' => 'Success']);
    }

}
