<?php

namespace App\Http\Controllers\Admin;

use App\Models\Survey;
use Illuminate\Http\Request;
use App\Charts\CanteenRatingChart;

use App\Http\Controllers\Controller;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SurveyReportController extends Controller
{
    public function index(CanteenRatingChart $ratingChart)
    {
        $surveys = Survey::selectRaw('suggestions, COUNT(*) as count')
            ->groupBy('suggestions')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $data = array();
        $labels = array();
        foreach ($surveys as $survey) {
            array_push($data, $survey['count']);
            array_push($labels, $survey['suggestions']);
        }
        $chart = (new LarapexChart)->barChart()
            ->setTitle('Most Suggested Meals')
            // ->setSubtitle('From January to March')
            ->setXAxis($labels)
            ->setDataset([
                [
                    'name'  =>  'Times Suggested',
                    'data'  =>  $data
                ]
            ])
            ->setToolbar(true);
        // $rating = Survey::whereNotNull('rating')->pluck('rating')->toArray();
        // $ratingData = array_values(array_count_values($rating));
        // $ratingLabel = Survey::distinct()->pluck('rating')->toArray();
        // $ratingChart = (new LarapexChart)->donutChart()
        //     ->setTitle('Top 3 scorers of the team.')
        //     ->setSubtitle('Season 2021.')
        //     ->setLabels($ratingLabel)
        //     ->setDataset([
        //         [
        //             'name'  =>  'Times Suggested',
        //             'data'  =>  $ratingData
        //         ]
        //     ])
        //     ->setToolbar(true);

        return view('admin.Reports.survey', ['ratingChart' => $ratingChart->build()]);
    }

    public function rating()
    {
        $ratings = Survey::whereNotNull('rating')->pluck('rating')->toArray();
        $data = array_values(array_count_values($ratings));
        $labels = Survey::distinct()->pluck('rating')->toArray();
        $average = Survey::avg('rating');
        return response()->json(['labels' => $labels, 'data' => $data, 'average' => $average]);
    }

    public function suggestions()
    {
        $surveys = Survey::selectRaw('suggestions, COUNT(*) as count')
            ->groupBy('suggestions')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $data = array();
        $labels = array();
        foreach ($surveys as $survey) {
            array_push($data, $survey['count']);
            array_push($labels, $survey['suggestions']);
        }
        $mostSuggested = array();
        for ($i = 0; $i < 5; $i++) {
            $mostSuggested[$i] = $labels[$i];
        }
        return response()->json(['labels' => $labels, 'data' => $data, 'mostSuggested' => $mostSuggested]);
    }
}
