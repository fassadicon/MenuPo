<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function termsAndCondi(){
        return view('user.termsAndCondi');
    }

    public function privacyStatement(){
        return view('user.privacyStatement');
    }
}
