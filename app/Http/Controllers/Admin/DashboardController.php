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
        $now = Carbon::now();
     
        $start = $now->startOfWeek(CarbonInterface::MONDAY);
        
        $end = $now->endOfWeek(CarbonInterface::SUNDAY);
     
        $weekStartDate = $now->startOfWeek();
        $weekEndDate = $now->copy()->endOfWeek();
        $test = array();
        $test[0] = $weekStartDate->format('Y-m-d');
        for ($i = 1; $i < 5; $i++) {
            $test[$i] = $weekStartDate->addDay()->format('Y-m-d');
        }
        // dd($test);
        // dd($now->format('Y-m-d'));
        // dd($weekStartDate->format('Y-m-d'));
        $Mondays = Menuplanner::whereDate('menuDate', $test[0])->first()->load('admin', 'admin_updated');
        $Tuesdays = Menuplanner::whereDate('menuDate', $test[1])->first()->load('admin', 'admin_updated');
        $Wednesdays = Menuplanner::whereDate('menuDate', $test[2])->first()->load('admin', 'admin_updated');
        $Thursdays = Menuplanner::whereDate('menuDate', $test[3])->first()->load('admin', 'admin_updated');
        $Fridays = Menuplanner::whereDate('menuDate', $test[4])->first()->load('admin', 'admin_updated');
        
        return view(
            'admin.dashboard',
            compact('Mondays', 'Tuesdays', 'adminNotifs', 'Wednesdays', 'Thursdays', 'Fridays')
        );
    }

    public function update(Request $request) {
        
    }
}
