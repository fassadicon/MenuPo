<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\Purchase;
use App\Charts\testChart;
use Illuminate\Http\Request;
use App\Charts\averageSugarChart;
use App\Charts\averageSodiumChart;
use App\Charts\avgTotFatF6to9Chart;
use App\Charts\avgTotFatM6to9Chart;
use App\Charts\averageTotalFatChart;
use App\Charts\avgCalorieF6to9Chart;
use App\Charts\avgCalorieM6to9Chart;
use App\Http\Controllers\Controller;
use App\Charts\avgTotFatF10to12Chart;
use App\Charts\avgTotFatF13to15Chart;
use App\Charts\avgTotFatM10to12Chart;
use App\Charts\avgTotFatM13to15Chart;
use App\Charts\avgCalorieF10to12Chart;
use App\Charts\avgCalorieF13to15Chart;
use App\Charts\avgCalorieM10to12Chart;
use App\Charts\avgCalorieM13to15Chart;
use App\Charts\averageSaturatedFatChart;
use App\Charts\averageCalorieConsumption;
use App\Charts\averageNutrientConsumptionChart;
use App\Charts\averageRecommendedNutrientConsumptionChart;

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
        averageTotalFatChart $averageTotalFatChart,
        avgTotFatM6to9Chart $avgTotFatM6to9Chart,
        avgTotFatM10to12Chart $avgTotFatM10to12Chart,
        avgTotFatM13to15Chart $avgTotFatM13to15Chart,
        avgTotFatF6to9Chart $avgTotFatF6to9Chart,
        avgTotFatF10to12Chart $avgTotFatF10to12Chart,
        avgTotFatF13to15Chart $avgTotFatF13to15Chart,
        averageSaturatedFatChart $averageSaturatedFatChart,
        averageSugarChart $averageSugarChart,
        averageSodiumChart $averageSodiumChart
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
            'averageCalorieConsumptionChart' => $averageCalorieConsumptionChart->build(),
            'avgCalorieM6to9Chart' => $avgCalorieM6to9Chart->build(),
            'avgCalorieF6to9Chart' => $avgCalorieF6to9Chart->build(),
            'avgCalorieM10to12Chart' => $avgCalorieM10to12Chart->build(),
            'avgCalorieF10to12Chart' => $avgCalorieF10to12Chart->build(),
            'avgCalorieM13to15Chart' => $avgCalorieM13to15Chart->build(),
            'avgCalorieF13to15Chart' => $avgCalorieF13to15Chart->build(),
            'averageTotalFatChart' => $averageTotalFatChart->build(),
            'avgTotFatM6to9Chart' => $avgTotFatM6to9Chart->build(),
            'avgTotFatF6to9Chart' => $avgTotFatF6to9Chart->build(),
            'avgTotFatM10to12Chart' => $avgTotFatM10to12Chart->build(),
            'avgTotFatF10to12Chart' => $avgTotFatF10to12Chart->build(),
            'avgTotFatM13to15Chart' => $avgTotFatM13to15Chart->build(),
            'avgTotFatF13to15Chart' => $avgTotFatF13to15Chart->build(),
            'averageSugarChart' => $averageSugarChart->build(),
            'averageSaturatedFatChart' => $averageSaturatedFatChart->build(),  'averageSugarChart' => $averageSugarChart->build(),
           
            'averageSodiumChart' => $averageSodiumChart->build(),
        ]);
    }
}
