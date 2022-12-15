<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class avgSodiumComparisonPieChart
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
                $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
            })
            ->avg('totalSodium') * 100) / 2000),
            round((Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
            })
            ->avg('totalSodium') * 100) / 2000),
            round((Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })
            ->avg('totalSodium') * 100) / 2000),
            round((Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })
            ->avg('totalSodium') * 100) / 2000)
        ])
        ->setLabels(['Male 6 to 9', 'Female 6 to 9', 'Male 10 to 12', 'Female 10 to 12'])
        ->setColors(['#D32F2F', '#03A9F4'])
        ->setToolBar(true);
    }
}
