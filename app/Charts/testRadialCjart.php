<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class testRadialCjart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadialChart
    {
        return $this->chart->radialChart()
            ->setHeight(382)
            ->addData([
                round((Purchase::whereHas('student', function ($query) {
                    $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                })->avg('totalKcal') * 100) / 1600, 1),
                round((Purchase::whereHas('student', function ($query) {
                    $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                })->avg('totalKcal') * 100) / 1470, 1),
                round((Purchase::whereHas('student', function ($query) {
                    $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                })->avg('totalKcal') * 100) / 2060, 1),
                round((Purchase::whereHas('student', function ($query) {
                    $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                })->avg('totalKcal') * 100) / 1980, 1)
            ])
            ->setLabels(['Male 6 to 9', 'Female 6 to 9', 'Male 10 to 12', 'Female 10 to 12', 'test'])
            ->setColors(['#D32F2F', '#03A9F4'])
            ->setToolBar(true);
    }
}
