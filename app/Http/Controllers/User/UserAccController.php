<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserAccController extends Controller
{
    public function index(){
        $parent = Guardian::where('user_id', auth()->id())->get();
        // $parent_id = $parent[0]->id;
        
        $purchase_his = DB::select('SELECT * FROM purchases WHERE parent_id = ?', [$parent[0]->id]); 
        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);

        $healthy = Order::whereHas('purchase', (fn($q)=>
            $q->where('parent_id', '=', $parent[0]->id)
        ))->whereHas('food', function($e){
            $e->where('grade', '=', 4)
            ->orWhere('grade', '=', 5)
            ->orWhere('grade', '=', 6);
        })->count();
       
        $mod_healthy = Order::whereHas('purchase', (fn($q)=>
            $q->where('parent_id', '=', $parent[0]->id)
        ))->whereHas('food', function($e){
            $e->where('grade', '=', 7)
            ->orWhere('grade', '=', 8)
            ->orWhere('grade', '=', 9);
        })->count();

        $not_healthy = Order::whereHas('purchase', (fn($q)=>
            $q->where('parent_id', '=', $parent[0]->id)
        ))->whereHas('food', function($e){
            $e->where('grade', '=', 10)
            ->orWhere('grade', '=', 11)
            ->orWhere('grade', '=', 12);
        })->count();

        $grade_count = array();
        $chart_data = array();

        array_push($grade_count, $healthy, $mod_healthy, $not_healthy);

        $chart_data = "['Healthy', $grade_count[0]], ['Moderately Healthy', $grade_count[1]], ['Not Healthy', $grade_count[2]]";

        return view('user.user-account', [
            'notifications' => $notifications,
            'parent' => $parent[0],
            'students' => $student,
            'chart_data' => $chart_data,
            'grades' => $grade_count,
            'purchases' => $purchase_his
        ]);
    }

    public function edit(){

        $parent = Guardian::where('user_id', auth()->id())->get();
        
        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);

        return view('user.edit-userAcc', [
            'notifications' => $notifications,
            'parent' => $parent[0],
            'students' => $student
        ]);
    }

    public function saveUpdate(Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'birthday' => 'required'
        ]);

        DB::update('UPDATE parents SET firstName = ? , lastName = ? , middleName = ? , suffix = ? , sex = ? , address = ? , birthDate = ? WHERE id = ?', [
            $request->input('firstName'),
            $request->input('lastName'),
            $request->input('middleName'),
            $request->input('suffix'),
            $request->input('gender'),
            $request->input('address'),
            $request->input('birthday'),
            $request->input('id')

        ]);

        return redirect()->route(route:'user.account');;
        
    }
}
