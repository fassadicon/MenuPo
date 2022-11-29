<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function index(){

        $notifications = DB::select('SELECT * FROM notifications WHERE status = ? && user_id = ? ORDER BY created_at DESC', [1, 1]);
        $currentTime = \Carbon\Carbon::now('Asia/Singapore')->toTimeString();
        $anaks = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);

        return view('user.survey',[
            'notifs' => $notifications,
            'students' => $anaks
        ]);
    }

    public function store(Request $request){

        $choices = $request->more_choices;
        $choices = implode(',', $choices);

        $notifications = DB::select('SELECT * FROM notifications WHERE status = ? && user_id = ? ORDER BY created_at DESC', [1, auth()->user()->id]);

        // $survey = new Surveys;
        // $survey->user_id = auth()->user()->id;
        // $survey->name = $request->name;
        // $survey->role = $request->role;
        // $survey->rating = $request->rating;
        // $survey->more_choices = $choices;
        // $survey->food_suggest = $request->meal_suggest;
        // $survey->recommendation = $request->recommendation;
        // $survey->save();
        

        return redirect()->route(route:'menu.landing');
    }
}
