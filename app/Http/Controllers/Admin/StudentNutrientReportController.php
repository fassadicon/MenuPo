<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
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
use App\Charts\kcalF10to12PieChart;
use App\Charts\kcalM10to12PieChart;
use App\Charts\satFatF6to9PieChart;
use App\Charts\satFatM6to9PieChart;
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
use App\Charts\totFatF10to12PieChart;
use App\Charts\totFatM10to12PieChart;
use App\Charts\avgCalorieF10to12Chart;
use App\Charts\avgCalorieF13to15Chart;
use App\Charts\avgCalorieM10to12Chart;
use App\Charts\avgCalorieM13to15Chart;
use App\Charts\averageSaturatedFatChart;
use App\Charts\averageCalorieConsumption;
use App\Charts\avgSugarComparisonPieChart;
use App\Charts\avgSatFatComparisonPieChart;
use App\Charts\avgTotFatComparisonPieChart;
use App\Charts\averageNutrientConsumptionChart;
use App\Charts\averageRecommendedNutrientConsumptionChart;
use App\Charts\avgSodiumComparisonPieChart;
use App\Charts\avgSodiumPieChart;
use App\Charts\sodiumF10to12PieChart;
use App\Charts\sodiumF6to9PieChart;
use App\Charts\sodiumM10to12PieChart;
use App\Charts\sodiumM6to9PieChart;

class StudentNutrientReportController extends Controller
{
    public function index(
        averageCalorieConsumption $averageCalorieConsumptionChart,
        avgCalorieM6to9Chart $avgCalorieM6to9Chart,
        avgCalorieF6to9Chart $avgCalorieF6to9Chart,
        avgCalorieM10to12Chart $avgCalorieM10to12Chart,
        avgCalorieF10to12Chart $avgCalorieF10to12Chart,
        avgCalorieM13to15Chart $avgCalorieM13to15Chart,
        avgCalorieF13to15Chart $avgCalorieF13to15Chart,
        avgCalorieBySexChart $avgCalorieBySexChart,
        kcalM6to9PieChart $kcalM6to9PieChart,
        kcalF6to9PieChart $kcalF6to9PieChart,
        kcalM10to12PieChart $kcalM10to12PieChart,
        kcalF10to12PieChart $kcalF10to12PieChart,
        testPieChart $testPieChart,
        testRadialCjart $testRadialCjart
    ) {

        $adminNotifs = Adminnotif::get();
        
        return view('admin.Reports.studentNutrientData', [
            'averageCalorieConsumptionChart' => $averageCalorieConsumptionChart->build(),
            'testPieChart' => $testPieChart->build(),
            'avgCalorieM6to9Chart' => $avgCalorieM6to9Chart->build(),
            'avgCalorieF6to9Chart' => $avgCalorieF6to9Chart->build(),
            'avgCalorieM10to12Chart' => $avgCalorieM10to12Chart->build(),
            'avgCalorieF10to12Chart' => $avgCalorieF10to12Chart->build(),
            'avgCalorieM13to15Chart' => $avgCalorieM13to15Chart->build(),
            'avgCalorieF13to15Chart' => $avgCalorieF13to15Chart->build(),
            'avgCalorieBySexChart' => $avgCalorieBySexChart->build(),
            'kcalM6to9PieChart' => $kcalM6to9PieChart->build(),
            'kcalF6to9PieChart' => $kcalF6to9PieChart->build(),
            'kcalM10to12PieChart' => $kcalM10to12PieChart->build(),
            'kcalF10to12PieChart' => $kcalF10to12PieChart->build(),
            'adminNotifs' => $adminNotifs,
            'testRadialCjart' => $testRadialCjart->build(),

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
        sodiumM10to12PieChart $sodiumM10to12PieChart
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
