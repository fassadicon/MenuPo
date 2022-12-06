<?php

namespace App\Charts;

use App\Models\Survey;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CanteenRatingChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
            ->setTitle("Parents' Canteen Rating")
            ->setLabels([1, 2, 3, 4, 5])
            ->addData([
                Survey::where('rating', 1)->count(),
                Survey::where('rating', 2)->count(),
                Survey::where('rating', 3)->count(),
                Survey::where('rating', 4)->count(),
                Survey::where('rating', 5)->count(),
            ])
            ->setToolbar(true);
    }
}
