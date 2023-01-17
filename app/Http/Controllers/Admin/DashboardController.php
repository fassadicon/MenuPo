<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Adminnotif;
use App\Models\Menuplanner;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        $adminNotifs = Adminnotif::get();
        
        return view('admin.dashboard', compact('adminNotifs'));
    }

}
