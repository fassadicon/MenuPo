<?php

namespace App\Http\Controllers\Admin;

use App\Charts\MonthlySalesChart;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesReportController extends Controller
{
    public function index(
        MonthlySalesChart $monthlySalesChart
    ) {
        $adminNotifs = Adminnotif::get();
        return view('admin.Reports.sales', [
            'adminNotifs' => $adminNotifs,
            'monthlySalesChart' => $monthlySalesChart->build(),
        ]);
    }
}
