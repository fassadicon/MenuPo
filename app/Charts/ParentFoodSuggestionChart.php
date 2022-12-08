<?php

namespace App\Charts;

use App\Models\Survey;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ParentFoodSuggestionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
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
        return $this->chart->barChart()
            ->setTitle('Most Suggested Meals')
            ->setXAxis($labels)
            ->setDataset([
                [
                    'name'  =>  'Times Suggested',
                    'data'  =>  $data
                ]
            ])
            ->setToolbar(true);
    }
}
