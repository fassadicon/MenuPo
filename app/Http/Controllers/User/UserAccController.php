<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Survey;
use App\Mail\SampleMail;
use App\Models\Guardian;
use App\Models\Adminnotif;
use App\Models\Passrequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Charts\UserCharts\ParentChart;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserAccController extends Controller
{
    public function index(ParentChart $chart){
        $parent = Guardian::where('user_id', auth()->id())->get();
        
        $purchase_his = DB::select('SELECT * FROM purchases WHERE parent_id = ?', [$parent[0]->id]); 
        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $survey = Survey::where('parent_id', $parent[0]->id)
            ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }

        $passreq = Passrequest::where('user_id', auth()->id())->get();
        $reqbutton = 0;

        foreach ($passreq as $val){
            $key = strpos($val->created_at, \Carbon\Carbon::now('Asia/Singapore')->toDateString());

            if($key===false){
               $reqbutton = 0;
            }
            else{
                $reqbutton = 1;
            }
        }

        
        return view('user.user-account', [
            'notifications' => $notifications,
            'parent' => $parent[0],
            'students' => $student,
            'isSurveyAvail' => $isSurveyAvail,
            'purchases' => $purchase_his,
            'reqbutton' => $reqbutton,
            'chart' => $chart->build()
        ]);
    }

    public function edit(){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $survey = Survey::where('parent_id', $parent[0]->id)
            ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }

        return view('user.edit-userAcc', [
            'notifications' => $notifications,
            'parent' => $parent[0],
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

        Alert::success('Success!', 'Parent details successfully changed.');

        return redirect()->route(route:'user.account');
        
    }

    public function change_pass_request(){

        $parent = DB::select('SELECT * FROM parents WHERE user_id = ?', [ auth()->id()]);

        $passreq = new Passrequest;
        $passreq->user_id = auth()->id();
        $passreq->otp = rand(100000, 999999);
        $passreq->status = 1;
        $passreq->save();

        //Creating notif
        $notification = new Notification;
        $notification->parent_id = $parent[0]->id;
        $notification->title = 'OTP is sent to your email.';
        $notification->description = 'Click this to change your password.';
        $notification->type = 2;
        $notification->status = 1;
        $notification->save();

        Mail::to('bautistaervin7@gmail.com')->send(new SampleMail($passreq->otp));

        return response()->json(['status' => 'Success']);
    }

    public function otp_page(){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $survey = Survey::where('parent_id', $parent[0]->id)
            ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }

        return view('user.submit-otp', [
            'notifications' => $notifications,
            'parent' => $parent[0],
            'isSurveyAvail' => $isSurveyAvail,
            'students' => $student
        ]);
    }

    public function submit_otp(Request $request){

        $parent = Guardian::where('user_id', auth()->id())->get();
        
        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);

        $passreq = DB::select('SELECT * FROM passrequests WHERE user_id = ? && created_at LIKE ?', [auth()->id(), \Carbon\Carbon::now('Asia/Singapore')->toDateString()]);

        $input_otp = $request->input('first') . 
            $request->input('second') .
            $request->input('third') .
            $request->input('fourth') .
            $request->input('fifth') . 
            $request->input('sixth');


            
        $date_today = \Carbon\Carbon::now('Asia/Singapore')->toDateString() . '%';
        $passreq = DB::select('SELECT * FROM passrequests WHERE user_id = ? && created_at LIKE ?', [auth()->id(), $date_today]);
        
        if(empty($passreq)){
            return redirect()->back()->with('message', 'The otp is used/not found! Please request for another one.');
        }

        if($passreq[0]->otp == $input_otp){
            DB::update('DELETE FROM passrequests WHERE id = ?', [$passreq[0]->id]);
            return redirect('/user/changepass-page');
        }else{
            return redirect()->back()->with('message', 'The otp is incorrect!');
        }
        
    }

    public function changepass_page(){
        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $survey = Survey::where('parent_id', $parent[0]->id)
            ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }


        return view('user.changepass-page', [
            'notifications' => $notifications,
            'parent' => $parent[0],
            'isSurveyAvail' => $isSurveyAvail,
            'students' => $student
        ]);
    }

    public function submit_password(Request $request){

        $request->validate([
            'newpass' => 'required|min:8|max:100',
        ]);

        if($request->input('newpass') == $request->input('confirmpass')){
            DB::update('UPDATE users SET password = ? WHERE id = ?', [
                bcrypt($request->input('newpass')),
                auth()->id()
            ]);

            Alert::success('Success!', 'Password is changed.');
            
            return redirect('user/user-account');
        }
    }
}
