<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewPostController extends Controller
{
    public function index(){

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [1]);
        $students = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);

        return view('user.announcement', [
            'notifications' => $notifications,
            'students' => $students
        ]);
    }

    public function viewpost(){

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [1]);
        $students = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);

        return view('user.new-post', [
            'notifications' => $notifications,
            'students' => $students
        ]);
    }

    public function store(Request $request){
        
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->save();
        return redirect('/user/home');

    }
}
