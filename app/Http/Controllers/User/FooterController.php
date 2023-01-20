<?php

namespace App\Http\Controllers\User;

use App\Mail\SampleMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class FooterController extends Controller
{
    public function termsAndCondi(){
        return view('user.termsAndCondi');
    }

    public function privacyStatement(){
        return view('user.privacyStatement');
    }
    
    public function changePasswordRequest(){
        
        
        return view('user.login-changePassReq');
       
    }
    public function  sendOtpPassword(Request $request){

        $password = Str::random(8);
        $userCredentials = Hash::make($password);
        
        DB::update('UPDATE users SET password = ? WHERE email = ?', [
            $userCredentials,
            $request->email
        ]);
        Mail::to('bautistaervin7@gmail.com')->send(new SampleMail($password));
        return redirect()->route('login');
        
    }

    public function changePassword(){

        //dapat redirect to
        return view('user.login-changePass');
    }
}
