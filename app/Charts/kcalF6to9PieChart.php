<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class kcalF6to9PieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $caloriesConsumed = round((Purchase::whereHas('student', function ($query) {
            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
        })->avg('totalKcal') * 100) / 1470);
        return $this->chart->donutChart()
            ->addData([
                $caloriesConsumed,
                100 - $caloriesConsumed
            ])
            ->setLabels(['Consumed', 'Left'])
            ->setToolBar(true);
    }
}
