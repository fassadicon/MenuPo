<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);

        return view('user.home', [
            'students' => $student
        ]);
    }

    public function sample(){
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);

        // $healthy = Order::where('parent_id', 1)
        // ->where(function($q){
        //     $q->where('grade', 4)
        //     ->orWhere('grade', 5)
        //     ->orWhere('grade', 6);
        // })->count();


        $sample = Order::whereHas('purchase', function($q){
            $q->where('parent_id', '=', 1);
        })->whereHas('food', function($e){
            $e->where('grade', '=', 4)
            ->orWhere('grade', '=', 5)
            ->orWhere('grade', '=', 6);
        })->count();

        dd($sample);

        

        
        
        return view('user.sample', [
            'students' => $student
        ]);
    }
}
