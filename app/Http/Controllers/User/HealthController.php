<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\Order;
use App\Models\Survey;
use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HealthController extends Controller
{
    public function index(Student $anak){

        
        
        $ids = explode(',' , $anak->restriction);

        $restrict = array();

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $survey = Survey::where('parent_id', $parent[0]->id)
            ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }
        $purchase = DB::select('SELECT * FROM purchases WHERE parent_id = ? && student_id = ?', [$parent[0]->id, $anak->id]);

        // For average food grade
        $sample = Order::whereHas('purchase', (fn($q)=>
            $q->where('parent_id', $parent[0]->id)
        ))->with('food')->get();

        $average = 0;
        $ite = 0;
    
        foreach($sample as $sam){
            $average += $sam->food->grade;
            $ite += 1;
        }

        $average_grade = $average/$ite;
        $average_grade = number_format((float)$average_grade, 2, '.', '');

        foreach($ids as $id){
            $item = DB::select('select * from foods where id = ?', [$id]);
            array_push($restrict, $item);
        }

        $purchase_info = array();

        foreach($purchase as $purch){
            $item2 = DB::select('SELECT * FROM orders WHERE purchase_id = ?', [$purch->id]);
            array_push($purchase_info, $item2);
        }

        return view('user.health', [
            'students' => $student,
            'restricts' => $restrict,
            'parent' => $parent[0],
            'notifications' => $notifications,
            'purchases' => $purchase,
            'isSurveyAvail' => $isSurveyAvail,
            'anaks' => $anak,
            'purchase_info' => $purchase_info,
            'average_grade' => $average_grade
        ]);
    }

    public function removeRestrict(Request $request){
        
        $ids = $request->input('anak-id');
        $ids  = explode(',', $ids);

        $anak_id = $ids[0];
        $food_id = $ids[1].',';

        $restrict = Student::find($anak_id);

        $new = str_replace($food_id, '', $restrict->restriction);


        DB::update('UPDATE students SET restriction = ? WHERE id = ?', [$new, $anak_id]);
        
        return response()->json(['status' => 'Success']);
    }

    public function edit(Student $anak){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $survey = Survey::where('parent_id', $parent[0]->id)
            ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }

        return view('user.edit-studAcc', [
            'notifications' => $notifications,
            'anak' => $anak,
            'isSurveyAvail' => $isSurveyAvail,
            'students' => $student
        ]);
    }

    public function saveUpdate(Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => 'required',
            'gender' => 'required',
            'birthday' => 'required'
        ]);

        DB::update('UPDATE students SET firstName = ? , middleName = ? , lastName = ? , suffix = ? , sex = ? , birthDate = ? WHERE id = ?', [
            $request->input('firstName'),
            $request->input('lastName'),
            $request->input('middleName'),
            $request->input('suffix'),
            $request->input('gender'),
            $request->input('birthday'),
            $request->input('id')

        ]);

        Alert::success('Success!', 'Student details successfully changed.');

        return redirect()->route(route:'user.account');
        
    }
}
