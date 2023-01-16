<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menuplanner;

class MenuplannerController extends Controller
{
    public function index()
    {
        $Monday = Menuplanner::whereDate('menuDate', '2023-01-09')->get();
        $Tuesday = Menuplanner::whereDate('menuDate', '2023-01-10')->get();
        $Wednesday = Menuplanner::whereDate('menuDate', '2023-01-11')->get();
        $Thursday = Menuplanner::whereDate('menuDate', '2023-01-12')->get();
        $Friday = Menuplanner::whereDate('menuDate', '2023-01-13')->get();
        return view('admin.dashboard',compact('Monday', 'Tuesday', '', 'Wednesday', 'Thursday', 'Friday'));
    }
}
