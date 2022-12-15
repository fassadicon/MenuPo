<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class satFatF6to9PieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $totFatConsumed = round((Purchase::whereHas('student', function ($query) {
            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
        })
        ->avg('totalSatFat') * 100) / 19);
        return $this->chart->donutChart()
            ->addData([
                $totFatConsumed,
                100 - $totFatConsumed
            ])
            ->setLabels(['Consumed', 'Left'])
            ->setToolBar(true);
    }
}
