<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewPostController extends Controller
{
    public function index(){

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [1]);
        $students = DB::select('SELECT * FROM students WHERE parent_id = ?', [auth()->user()->id]);

        return view('users.newpost', [
            'notifications' => $notifications,
            'students' => $students
        ]);
    }

    public function viewpost(){

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [1]);
        $students = DB::select('SELECT * FROM students WHERE parent_id = ?', [auth()->user()->id]);

        return view('users.home-post', [
            'notifications' => $notifications,
            'students' => $students
        ]);
    }

    public function store(Request $request){
        
        dd($request);

    }
}
