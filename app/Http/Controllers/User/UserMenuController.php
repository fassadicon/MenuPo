<?php

namespace App\Http\Controllers\User;

use App\Models\Food;
use App\Models\Survey;
use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Gloudemans\Shoppingcart\Facades\Cart;

class UserMenuController extends Controller
{
    public function index(Student $student){

        
        $restricts = $student->restriction;


        $parent = Guardian::where('user_id', auth()->id())->get();
        $students = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $survey = Survey::where('parent_id', $parent[0]->id)
            ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }
        return view('user.menu', [
            'anak' => $student,
            'foods' => Food::all(),
            'notifications' => $notifications,
            'students' => $students,
            'isSurveyAvail' => $isSurveyAvail,
            'restricts' => $restricts
        ]);

    }

    //For landing page
    public function landing(){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $survey = Survey::where('parent_id', $parent[0]->id)
            ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }
        return view('user.menu-landing', [
            'notifications' => $notifications,
            'isSurveyAvail' => $isSurveyAvail,
            'students' => $student
        ]);

    }

    public function addtocart(Request $request){

        $food_id = $request->input('food-id');

        $item = Food::findOrFail($food_id);
        $rice = Food::findOrFail(2);

        if($item->type == 3){
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
    
            Cart::add(
                $rice->id,
                $rice->name,
                1,
                $rice->price,
                0,
                ['image' => $rice->image,
                'type' => $rice->type
                ]
            );
        }
        else{
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
        }
       
        return response()->json(['status' => 'Success']);
    }

    public function addtorestrict(Request $request){
        
        $food_id = $request->input('food-id');
        $anak_id = $request->input('anak-id');

        $restrict = DB::select('SELECT restriction FROM students WHERE id = ?' , [$anak_id]);
        $restrict = $restrict[0]->restriction;
        
        $id = $restrict.$food_id . ',';
        DB::update('UPDATE students SET restriction = ? where id = ?', [$id, $anak_id]);
        
        return response()->json(['status' => 'Success']);
    }
    
}
