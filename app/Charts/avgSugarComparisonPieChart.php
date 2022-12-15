<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class avgSugarComparisonPieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        return $this->chart->radialChart()
        ->setHeight(400)
        ->addData([
            round((Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
            })->avg('totalSatFat') * 100) / 21),
            round((Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
            })->avg('totalSatFat') * 100) / 19),
            round((Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->avg('totalSatFat') * 100) / 27),
            round((Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->avg('totalSatFat') * 100) / 26)
        ])
        ->setLabels(['Male 6 to 9', 'Female 6 to 9', 'Male 10 to 12', 'Female 10 to 12'])
        ->setColors(['#D32F2F', '#03A9F4'])
        ->setToolBar(true);
    }
}
