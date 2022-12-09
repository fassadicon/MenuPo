<?php

namespace App\Charts;

use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class averageCalorieConsumption
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
        ->setTitle('Average Daily Calorie Consumed from Bought Foods')
        ->addData('Average Calorie', [
            round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-18'])
            ->avg('totalKcal'), 2), 
            round(Purchase::whereBetween('created_at', ['2022-11-19', '2022-11-20'])
            ->avg('totalKcal'), 2), 
            round(Purchase::whereBetween('created_at', ['2022-11-21', '2022-11-23'])
            ->avg('totalKcal'), 2),
            round(Purchase::whereBetween('created_at', ['2022-11-24', '2022-12-01'])
            ->avg('totalKcal'), 2)
        ])
        ->setXAxis(['Nov.17-18', 'Nov.19-20', 'Nov.21-23', 'Nov.24-Dec.1'])
        ->setToolBar(true);
    }
}
