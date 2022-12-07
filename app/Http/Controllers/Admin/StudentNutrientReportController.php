<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charts\averageCalorieConsumption;
use App\Charts\averageNutrientConsumptionChart;

class StudentNutrientReportController extends Controller
{
    public function index(
        averageNutrientConsumptionChart $averageNutrientConsumptionChart,
        averageCalorieConsumption $averageCalorieConsumptionChart
    ) {
        // $dailyRecoKcalM9to13 = 1600;
        // $purchaseM9to13s = Purchase::whereHas('student', function ($query) {
        //     $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(13), Carbon::now()->subYear(9)]);
        // })->get();

        // foreach ($purchaseM9to13s as $record) {
        //     $record->
        // }
        

        
        return view('admin.Reports.studentNutrientData', [
            'averageNutrientConsumptionChart' => $averageNutrientConsumptionChart->build(),
            'averageCalorieConsumptionChart' => $averageCalorieConsumptionChart->build(),
            'collection' => $purchaseM9to13s
        ]);
    }
}
