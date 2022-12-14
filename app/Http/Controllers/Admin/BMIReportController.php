<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bmi;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Charts\bmiPolarChart;
use App\Charts\bmiChangeFLineChart;
use App\Http\Controllers\Controller;
use App\Charts\bmiCount2ndQtrPieChart;
use App\Charts\bmiCount3rdQtrPieChart;
use App\Charts\bmiCount4thQtrPieChart;
use App\Charts\weightChangeFLineChart;

class BMIReportController extends Controller
{
   public function index (
        bmiPolarChart $bmiPolarChart,
        bmiCount2ndQtrPieChart $bmiCount2ndQtrPieChart,
        bmiCount3rdQtrPieChart $bmiCount3rdQtrPieChart,
        bmiCount4thQtrPieChart $bmiCount4thQtrPieChart,
        bmiChangeFLineChart $bmiChangeFLineChart,
        weightChangeFLineChart $weightChangeFLineChart
   ) {

    $avgMQ1Height = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'M');
    })->avg('Q1Height'));
    $avgMQ2Height = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'M');
    })->avg('Q2Height'));
    $avgMQ3Height = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'M');
    })->avg('Q3Height'));
    $avgMQ4Height = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'M');
    })->avg('Q4Height'));
    $averageMHeight = ($avgMQ1Height + $avgMQ2Height + $avgMQ3Height + $avgMQ4Height)/4;

    $avgFQ1Height = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'F');
    })->avg('Q1Height'));
    $avgFQ2Height = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'F');
    })->avg('Q2Height'));
    $avgFQ3Height = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'F');
    })->avg('Q3Height'));
    $avgFQ4Height = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'F');
    })->avg('Q4Height'));
    $averageFHeight = ($avgFQ1Height + $avgFQ2Height + $avgFQ3Height + $avgFQ4Height)/4;

    $avgMQ1Weight = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'M');
    })->avg('Q1Weight'));
    $avgMQ2Weight = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'M');
    })->avg('Q2Weight'));
    $avgMQ3Weight = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'M');
    })->avg('Q3Weight'));
    $avgMQ4Weight = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'M');
    })->avg('Q4Weight'));
    $averageMWeight = ($avgMQ1Weight + $avgMQ2Weight + $avgMQ3Weight + $avgMQ4Weight)/4;

    $avgFQ1Weight = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'F');
    })->avg('Q1Weight'));
    $avgFQ2Weight = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'F');
    })->avg('Q2Weight'));
    $avgFQ3Weight = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'F');
    })->avg('Q3Weight'));
    $avgFQ4Weight = round(Bmi::whereHas('student', function($query){
        $query->where('sex', 'F');
    })->avg('Q4Weight'));
    $averageFWeight = ($avgFQ1Weight + $avgFQ2Weight + $avgFQ3Weight + $avgFQ4Weight)/4;
    
    $adminNotifs = Adminnotif::get();
    return view('admin.Reports.bmi', [
        'adminNotifs' => $adminNotifs,
        'bmiPolarChart' => $bmiPolarChart->build(),
        'bmiCount2ndQtrPieChart' => $bmiCount2ndQtrPieChart->build(),
        'bmiCount3rdQtrPieChart' => $bmiCount3rdQtrPieChart->build(),
        'bmiCount4thQtrPieChart' => $bmiCount4thQtrPieChart->build(),
        'bmiChangeFLineChart' => $bmiChangeFLineChart->build(),
        'weightChangeFLineChart' => $weightChangeFLineChart->build(),
        'averageMHeight' => $averageMHeight,
        'averageFHeight' => $averageFHeight,
        'averageMWeight' => $averageMWeight,
        'averageFWeight' => $averageFWeight,
    ]);
   }
}
