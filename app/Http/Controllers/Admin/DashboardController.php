<?php

namespace App\Http\Controllers\Admin;

use App\Models\Adminnotif;
use App\Models\Menuplanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {

        $adminNotifs = Adminnotif::get();

        // $Monday = Menuplanner::whereDate('menuDate', '2023-01-09')->get();
        // $Tuesday = Menuplanner::whereDate('menuDate', '2023-01-10')->get();
        // $Wednesday = Menuplanner::whereDate('menuDate', '2023-01-11')->get();
        // $Thursday = Menuplanner::whereDate('menuDate', '2023-01-12')->get();
        // $Friday = Menuplanner::whereDate('menuDate', '2023-01-13')->get();

        // return view('admin.dashboard', [
        //     'adminNotifs' => $adminNotifs,
        //     'Monday' => $Monday,
        //     'Tuesday' => $Tuesday,
        //     'Wednesday' => $Wednesday,
        //     'Thursday' => $Thursday,
        //     'Friday' => $Friday
        // ]);

        $Mondays = Menuplanner::whereDate('menuDate', '2023-01-09')->get();
        $Tuesdays = Menuplanner::whereDate('menuDate', '2023-01-10')->get();
        $Wednesdays = Menuplanner::whereDate('menuDate', '2023-01-11')->get();
        $Thursdays = Menuplanner::whereDate('menuDate', '2023-01-12')->get();
        $Fridays = Menuplanner::whereDate('menuDate', '2023-01-13')->get();
        return view(
            'admin.dashboard',
            compact('Mondays', 'Tuesdays', 'adminNotifs', 'Wednesdays', 'Thursdays', 'Fridays')
        );
    }
}
