<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Survey;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SurveyController extends Controller
{
    public function index(){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

        $survey = Survey::where('parent_id', $parent[0]->id)
            ->whereBetween('created_at', [$weekStartDate, $weekEndDate])->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }

        

        return view('user.survey',[
            'notifications' => $notifications,
            'students' => $student,
            'parent'=> $parent[0],
            'isSurveyAvail' => $isSurveyAvail
        ]);
    }

    public function store(Request $request){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $survey = new Survey;
        $survey->name = $request->name;
        $survey->rating = $request->rating;
        $survey->suggestions = $request->meal_suggest;
        $survey->comment = $request->recommendation;
        $survey->parent_id = $parent[0]->id;
        $survey->save();

        Alert::success('Success!', 'Survey submitted successfully.');
        

        return redirect('user/user-account');
    }
}
