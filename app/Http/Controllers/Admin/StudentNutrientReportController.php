<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charts\averageNutrientConsumptionChart;

class StudentNutrientReportController extends Controller
{
    public function index(
        averageNutrientConsumptionChart $averageNutrientConsumptionChart
    )
    {
       
        return view('admin.Reports.studentNutrientData', [
            'averageNutrientConsumptionChart' => $averageNutrientConsumptionChart->build()
        ]);
    }
}
