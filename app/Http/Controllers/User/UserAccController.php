<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserAccController extends Controller
{
    public function index(){

        $purchase_his = DB::select('SELECT * FROM purchases WHERE parent_id = ?', [1]); 

        $notifications = DB::select('SELECT * FROM notifications WHERE status = ? && user_id = ? ORDER BY created_at DESC', [1, 1]);
        
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);

        $healthy = Order::whereHas('purchase', function($q){
            $q->where('parent_id', '=', 1);
        })->whereHas('food', function($e){
            $e->where('grade', '=', 4)
            ->orWhere('grade', '=', 5)
            ->orWhere('grade', '=', 6);
        })->count();
       
        $mod_healthy = Order::whereHas('purchase', function($q){
            $q->where('parent_id', '=', 1);
        })->whereHas('food', function($e){
            $e->where('grade', '=', 7)
            ->orWhere('grade', '=', 8)
            ->orWhere('grade', '=', 9);
        })->count();

        $not_healthy = Order::whereHas('purchase', function($q){
            $q->where('parent_id', '=', 1);
        })->whereHas('food', function($e){
            $e->where('grade', '=', 10)
            ->orWhere('grade', '=', 11)
            ->orWhere('grade', '=', 12);
        })->count();

        $grade_count = array();
        $chart_data = array();

        array_push($grade_count, $healthy, $mod_healthy, $not_healthy);

        $chart_data = "['Healthy', $grade_count[0]], ['Moderately Healthy', $grade_count[1]], ['Not Healthy', $grade_count[2]]";

        return view('user.user-account', [
            'notifs' => $notifications,
            'students' => $student,
            'chart_data' => $chart_data,
            'grades' => $grade_count,
            'purchases' => $purchase_his
        ]);
    }
}
