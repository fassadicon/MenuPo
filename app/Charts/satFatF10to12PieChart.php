<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class satFatF10to12PieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $totFatConsumed = round((Purchase::whereHas('student', function ($query) {
            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
        })
        ->avg('totalSatFat') * 100) / 26);
        return $this->chart->donutChart()
            ->addData([
                $totFatConsumed,
                100 - $totFatConsumed
            ])
            ->setLabels(['Consumed', 'Left'])
            ->setToolBar(true);
    }
}
