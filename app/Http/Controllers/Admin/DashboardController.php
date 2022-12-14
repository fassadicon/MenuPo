<?php

namespace App\Http\Controllers\Admin;

use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {

        $adminNotifs = Adminnotif::get();
        
        return view('admin.dashboard', [
            'adminNotifs' => $adminNotifs,
        ]);
    }
}
