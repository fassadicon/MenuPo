<?php

namespace App\Http\Controllers\Admin;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Charts\CanteenRatingChart;

use App\Http\Controllers\Controller;
use App\Charts\ParentFoodSuggestionChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SurveyReportController extends Controller
{
    public function index(ParentFoodSuggestionChart $suggestionChart, CanteenRatingChart $ratingChart)
    {
        $average = Survey::avg('rating');

        $surveys = Survey::selectRaw('suggestions, COUNT(*) as count')
            ->groupBy('suggestions')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $labels = array();
        foreach ($surveys as $survey) {
            array_push($labels, $survey['suggestions']);
        }
        $mostSuggested = array();
        for ($i = 0; $i < 5; $i++) {
            $mostSuggested[$i] = $labels[$i];
        }

        return view('admin.Reports.survey', ['suggestionChart' => $suggestionChart->build(), 'ratingChart' => $ratingChart->build(), 'averageRating' => $average, 'mostSuggestedFoods' => $mostSuggested]);
    }
}
