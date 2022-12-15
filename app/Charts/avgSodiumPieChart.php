<?php

namespace App\Charts;

use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class avgSodiumPieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $caloriesConsumed = round((Purchase::avg('totalSodium') * 100) / 2000);
        return $this->chart->pieChart()
            ->setHeight(400)
            ->addData([
                $caloriesConsumed,
                100 - $caloriesConsumed
            ])
            ->setLabels(['Consumed', 'Left'])
            ->setToolBar(true);
    }
}
