<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Bmi;
use App\Models\Student;
use App\Models\Purchase;
use App\Charts\testChart;
use App\Models\Adminnotif;
use App\Charts\testPieChart;
use Illuminate\Http\Request;
use App\Charts\testRadialCjart;
use App\Charts\avgSugarPieChart;
use App\Charts\averageSugarChart;
use App\Charts\avgSatFatPieChart;
use App\Charts\avgSodiumPieChart;
use App\Charts\avgTotFatPieChart;
use App\Charts\kcalF6to9PieChart;
use App\Charts\kcalM6to9PieChart;
use App\Charts\averageSodiumChart;
use App\Charts\avgSugarF6to9Chart;
use App\Charts\avgSugarM6to9Chart;
use App\Charts\sugarF6to9PieChart;
use App\Charts\sugarM6to9PieChart;
use App\Charts\avgSatFatF6to9Chart;
use App\Charts\avgSatFatM6to9Chart;
use App\Charts\avgSodiumF6to9Chart;
use App\Charts\avgSodiumM6to9Chart;
use App\Charts\avgTotFatF6to9Chart;
use App\Charts\avgTotFatM6to9Chart;
use App\Charts\bmiChangeFLineChart;
use App\Charts\kcalF10to12PieChart;
use App\Charts\kcalM10to12PieChart;
use App\Charts\satFatF6to9PieChart;
use App\Charts\satFatM6to9PieChart;
use App\Charts\sodiumF6to9PieChart;
use App\Charts\sodiumM6to9PieChart;
use App\Charts\totFatF6to9PieChart;
use App\Charts\totFatM6to9PieChart;
use App\Charts\averageTotalFatChart;
use App\Charts\avgCalorieBySexChart;
use App\Charts\avgCalorieF6to9Chart;
use App\Charts\avgCalorieM6to9Chart;
use App\Charts\avgSugarF10to12Chart;
use App\Charts\avgSugarF13to15Chart;
use App\Charts\avgSugarM10to12Chart;
use App\Charts\avgSugarM13to15Chart;
use App\Charts\sugarF10to12PieChart;
use App\Charts\sugarM10to12PieChart;
use App\Http\Controllers\Controller;
use App\Charts\avgSatFatF10to12Chart;
use App\Charts\avgSatFatF13to15Chart;
use App\Charts\avgSatFatM10to12Chart;
use App\Charts\avgSatFatM13to15Chart;
use App\Charts\avgSodiumF10to12Chart;
use App\Charts\avgSodiumF13to15Chart;
use App\Charts\avgSodiumM10to12Chart;
use App\Charts\avgSodiumM13to15Chart;
use App\Charts\avgTotFatF10to12Chart;
use App\Charts\avgTotFatF13to15Chart;
use App\Charts\avgTotFatM10to12Chart;
use App\Charts\avgTotFatM13to15Chart;
use App\Charts\satFatF10to12PieChart;
use App\Charts\satFatM10to12PieChart;
use App\Charts\sodiumF10to12PieChart;
use App\Charts\sodiumM10to12PieChart;
use App\Charts\totFatF10to12PieChart;
use App\Charts\totFatM10to12PieChart;
use App\Charts\avgCalorieF10to12Chart;
use App\Charts\avgCalorieF13to15Chart;
use App\Charts\avgCalorieM10to12Chart;
use App\Charts\avgCalorieM13to15Chart;
use App\Charts\bmiCount4thQtrPieChart;
use App\Charts\weightChangeFLineChart;
use App\Charts\averageSaturatedFatChart;
use App\Charts\averageCalorieConsumption;
use App\Charts\avgSugarComparisonPieChart;
use App\Charts\avgSatFatComparisonPieChart;
use App\Charts\avgSodiumComparisonPieChart;
use App\Charts\avgTotFatComparisonPieChart;
use App\Charts\averageNutrientConsumptionChart;
use App\Charts\averageRecommendedNutrientConsumptionChart;

class StudentNutrientReportController extends Controller
{
    public function index(
        averageCalorieConsumption $averageCalorieConsumptionChart,
        testPieChart $testPieChart,
        testRadialCjart $testRadialCjart,
        averageTotalFatChart $averageTotalFatChart,
        avgTotFatPieChart $avgTotFatPieChart,
        avgTotFatComparisonPieChart $avgTotFatComparisonPieChart,
        averageSaturatedFatChart $averageSaturatedFatChart,
        avgSatFatPieChart $avgSatFatPieChart,
        avgSatFatComparisonPieChart $avgSatFatComparisonPieChart,
        averageSugarChart $averageSugarChart,
        avgSugarPieChart $avgSugarPieChart,
        avgSugarComparisonPieChart $avgSugarComparisonPieChart,
        averageSodiumChart $averageSodiumChart,
        avgSodiumPieChart $avgSodiumPieChart,
        avgSodiumComparisonPieChart $avgSodiumComparisonPieChart,
        bmiChangeFLineChart $bmiChangeFLineChart,
        weightChangeFLineChart $weightChangeFLineChart,
        bmiCount4thQtrPieChart $bmiCount4thQtrPieChart
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
        
        return view('admin.Reports.studentNutrientData', [
            'adminNotifs' => $adminNotifs,
            'averageCalorieConsumptionChart' => $averageCalorieConsumptionChart->build(),
            'testPieChart' => $testPieChart->build(),
            'testRadialCjart' => $testRadialCjart->build(),
            'averageTotalFatChart' => $averageTotalFatChart->build(),
            'avgTotFatPieChart' => $avgTotFatPieChart->build(),
            'avgTotFatComparisonPieChart' => $avgTotFatComparisonPieChart->build(),
            'averageSaturatedFatChart' => $averageSaturatedFatChart->build(),  
            'avgSatFatPieChart' => $avgSatFatPieChart->build(),  
            'avgSatFatComparisonPieChart' => $avgSatFatComparisonPieChart->build(),  
            'averageSugarChart' => $averageSugarChart->build(),  
            'avgSugarPieChart' => $avgSugarPieChart->build(),  
            'avgSugarComparisonPieChart' => $avgSugarComparisonPieChart->build(),  
            'averageSodiumChart' => $averageSodiumChart->build(),  
            'avgSodiumPieChart' => $avgSodiumPieChart->build(),  
            'avgSodiumComparisonPieChart' => $avgSodiumComparisonPieChart->build(),
            'bmiChangeFLineChart' => $bmiChangeFLineChart->build(),
            'weightChangeFLineChart' => $weightChangeFLineChart->build(),
            'averageMHeight' => $averageMHeight,
            'averageFHeight' => $averageFHeight,
            'averageMWeight' => $averageMWeight,
            'averageFWeight' => $averageFWeight,
            'bmiCount4thQtrPieChart' => $bmiCount4thQtrPieChart->build()
        ]);
    }

    public function indexTotalFat(
        averageTotalFatChart $averageTotalFatChart,
        avgTotFatPieChart $avgTotFatPieChart,
        avgTotFatComparisonPieChart $avgTotFatComparisonPieChart,
        avgTotFatM6to9Chart $avgTotFatM6to9Chart,
        avgTotFatM10to12Chart $avgTotFatM10to12Chart,
        avgTotFatF6to9Chart $avgTotFatF6to9Chart,
        avgTotFatF10to12Chart $avgTotFatF10to12Chart,
        totFatF6to9PieChart $totFatF6to9PieChart,
        totFatM6to9PieChart $totFatM6to9PieChart,
        totFatF10to12PieChart $totFatF10to12PieChart,
        totFatM10to12PieChart $totFatM10to12PieChart
    ) {
        $adminNotifs = Adminnotif::get();
        return view('admin.Reports.avgTotFat', [
            'adminNotifs' => $adminNotifs,
            'averageTotalFatChart' => $averageTotalFatChart->build(),
            'avgTotFatPieChart' => $avgTotFatPieChart->build(),
            'avgTotFatComparisonPieChart' => $avgTotFatComparisonPieChart->build(),
            'avgTotFatM6to9Chart' => $avgTotFatM6to9Chart->build(),
            'avgTotFatF6to9Chart' => $avgTotFatF6to9Chart->build(),
            'avgTotFatM10to12Chart' => $avgTotFatM10to12Chart->build(),
            'avgTotFatF10to12Chart' => $avgTotFatF10to12Chart->build(),
            'totFatF6to9PieChart' => $totFatF6to9PieChart->build(),
            'totFatM6to9PieChart' => $totFatM6to9PieChart->build(),
            'totFatF10to12PieChart' => $totFatF10to12PieChart->build(),
            'totFatM10to12PieChart' => $totFatM10to12PieChart->build(),

        ]);
    }

    public function indexSaturatedFat (
        averageSaturatedFatChart $averageSaturatedFatChart,
        avgSatFatPieChart $avgSatFatPieChart,
        avgSatFatComparisonPieChart $avgSatFatComparisonPieChart,
        avgSatFatM6to9Chart $avgSatFatM6to9Chart,
        avgSatFatM10to12Chart $avgSatFatM10to12Chart,
        avgSatFatF6to9Chart $avgSatFatF6to9Chart,
        avgSatFatF10to12Chart $avgSatFatF10to12Chart,
        satFatF6to9PieChart $satFatF6to9PieChart,
        satFatM6to9PieChart $satFatM6to9PieChart,
        satFatF10to12PieChart $satFatF10to12PieChart,
        satFatM10to12PieChart $satFatM10to12PieChart
    ) {
        $adminNotifs = Adminnotif::get();
        
        return view('admin.Reports.avgSatFat', [
            'adminNotifs' => $adminNotifs,
            'averageSaturatedFatChart' => $averageSaturatedFatChart->build(),  
            'avgSatFatPieChart' => $avgSatFatPieChart->build(),  
            'avgSatFatComparisonPieChart' => $avgSatFatComparisonPieChart->build(),  
            'avgSatFatM6to9Chart' => $avgSatFatM6to9Chart->build(),
            'avgSatFatM10to12Chart' => $avgSatFatM10to12Chart->build(),
            'avgSatFatF6to9Chart' => $avgSatFatF6to9Chart->build(),
            'avgSatFatF10to12Chart' => $avgSatFatF10to12Chart->build(),
            'satFatF6to9PieChart' => $satFatF6to9PieChart->build(),
            'satFatM6to9PieChart' => $satFatM6to9PieChart->build(),
            'satFatF10to12PieChart' => $satFatF10to12PieChart->build(),
            'satFatM10to12PieChart' => $satFatM10to12PieChart->build(),
            
        ]);
    }

    public function indexAddedSugar(
        averageSugarChart $averageSugarChart,
        avgSugarPieChart $avgSugarPieChart,
        avgSugarComparisonPieChart $avgSugarComparisonPieChart,
        avgSugarM6to9Chart $avgSugarM6to9Chart,
        avgSugarM10to12Chart $avgSugarM10to12Chart,
        avgSugarF6to9Chart $avgSugarF6to9Chart,
        avgSugarF10to12Chart $avgSugarF10to12Chart,
        sugarF6to9PieChart $sugarF6to9PieChart,
        sugarM6to9PieChart $sugarM6to9PieChart,
        sugarF10to12PieChart $sugarF10to12PieChart,
        sugarM10to12PieChart $sugarM10to12PieChart
    ) {
        $adminNotifs = Adminnotif::get();
        
        return view('admin.Reports.avgSugar', [
            'adminNotifs' => $adminNotifs,
            'averageSugarChart' => $averageSugarChart->build(),  
            'avgSugarPieChart' => $avgSugarPieChart->build(),  
            'avgSugarComparisonPieChart' => $avgSugarComparisonPieChart->build(),  
            'avgSugarM6to9Chart' => $avgSugarM6to9Chart->build(),
            'avgSugarM10to12Chart' => $avgSugarM10to12Chart->build(),
            'avgSugarF6to9Chart' => $avgSugarF6to9Chart->build(),
            'avgSugarF10to12Chart' => $avgSugarF10to12Chart->build(),
            'sugarF6to9PieChart' => $sugarF6to9PieChart->build(),
            'sugarM6to9PieChart' => $sugarM6to9PieChart->build(),
            'sugarF10to12PieChart' => $sugarF10to12PieChart->build(),
            'sugarM10to12PieChart' => $sugarM10to12PieChart->build(),
        ]); 
    }

    public function indexSodium(
        averageSodiumChart $averageSodiumChart,
        avgSodiumPieChart $avgSodiumPieChart,
        avgSodiumComparisonPieChart $avgSodiumComparisonPieChart,
        avgSodiumF6to9Chart $avgSodiumF6to9Chart,
        avgSodiumF10to12Chart $avgSodiumF10to12Chart,
        avgSodiumM6to9Chart $avgSodiumM6to9Chart,
        avgSodiumM10to12Chart $avgSodiumM10to12Chart,
        sodiumF6to9PieChart $sodiumF6to9PieChart,
        sodiumM6to9PieChart $sodiumM6to9PieChart,
        sodiumF10to12PieChart $sodiumF10to12PieChart,
        sodiumM10to12PieChart $sodiumM10to12PieChart,
        
    ) {
        $adminNotifs = Adminnotif::get();
        
        return view('admin.Reports.avgSodium', [
            'adminNotifs' => $adminNotifs,
            'averageSodiumChart' => $averageSodiumChart->build(),  
            'avgSodiumPieChart' => $avgSodiumPieChart->build(),  
            'avgSodiumComparisonPieChart' => $avgSodiumComparisonPieChart->build(),  
            'avgSodiumF6to9Chart' => $avgSodiumF6to9Chart->build(),
            'avgSodiumF10to12Chart' => $avgSodiumF10to12Chart->build(),
            'avgSodiumM6to9Chart' => $avgSodiumM6to9Chart->build(),
            'avgSodiumM10to12Chart' => $avgSodiumM10to12Chart->build(),
            'sodiumF6to9PieChart' => $sodiumF6to9PieChart->build(),
            'sodiumM6to9PieChart' => $sodiumM6to9PieChart->build(),
            'sodiumF10to12PieChart' => $sodiumF10to12PieChart->build(),
            'sodiumM10to12PieChart' => $sodiumM10to12PieChart->build()
        ]); 
    }

 

}
