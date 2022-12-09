<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Charts\averageCalorieConsumption;
use App\Charts\averageNutrientConsumptionChart;
use App\Charts\averageRecommendedNutrientConsumptionChart;

class StudentNutrientReportController extends Controller
{
    public function index(
        averageNutrientConsumptionChart $averageNutrientConsumptionChart,
        averageCalorieConsumption $averageCalorieConsumptionChart,
        averageRecommendedNutrientConsumptionChart $averageRecommendedNutrientConsumptionChart
    ) {
        $dailyRecoKcalM10to12 = 2060;
        $purchaseM10to12s = Purchase::whereHas('student', function ($query) {
            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
        })
            ->whereBetween('created_at', ['2022-11-17', '2022-11-18'])
            ->get();
        $test = $purchaseM10to12s->count();
        $testArray = array();
        foreach ($purchaseM10to12s as $record) {
            array_push($testArray, ($record->totalKcal / $dailyRecoKcalM10to12) * 100);
        }



        return view('admin.Reports.studentNutrientData', [
            'averageNutrientConsumptionChart' => $averageNutrientConsumptionChart->build(),
            'averageCalorieConsumptionChart' => $averageCalorieConsumptionChart->build(),  'averageRecommendedNutrientConsumptionChart' => $averageRecommendedNutrientConsumptionChart->build(),
            'collection' => $purchaseM10to12s,
            'test' => $test,
            'testArray' => $testArray
        ]);
    }
}
