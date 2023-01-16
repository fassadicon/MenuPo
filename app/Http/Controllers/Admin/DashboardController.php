<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Adminnotif;
use App\Models\Menuplanner;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        $adminNotifs = Adminnotif::get();
        $now = Carbon::now();
        $start = $now->startOfWeek(Carbon::MONDAY);
        $end = $now->endOfWeek(Carbon::FRIDAY);
        $weekStartDate = $now->copy()->startOfWeek();
        $weekEndDate = $now->copy()->endOfWeek();
        $test = array();
        $test[0] = $weekStartDate->format('Y-m-d');
        for ($i = 1; $i < 5; $i++) {
            $test[$i] = $weekStartDate->addDay()->format('Y-m-d');
        }

        // dd($test);
        $Mondays = Menuplanner::whereDate('menuDate', $test[0])->first()->load('admin', 'admin_updated');
        $Tuesdays = Menuplanner::whereDate('menuDate', $test[1])->first();
        $Wednesdays = Menuplanner::whereDate('menuDate', $test[2])->first();
        $Thursdays = Menuplanner::whereDate('menuDate', $test[3])->first();
        $Fridays = Menuplanner::whereDate('menuDate', $test[4])->first();

        // dd($Mondays);
        
        return view(
            'admin.dashboard',
            compact('Mondays', 'Tuesdays', 'adminNotifs', 'Wednesdays', 'Thursdays', 'Fridays')
        );
    }

    public function update(Request $request) {
        
    }
}
