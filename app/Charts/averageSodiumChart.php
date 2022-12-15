<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class averageSodiumChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Average Daily Sodium')
            ->addData('Average Sodium', [
                round(Purchase::whereBetween('created_at', ['2022-07-01', '2022-10-31'])
                ->avg('totalSodium') / 1000, 2), 
                round(Purchase::whereBetween('created_at', ['2022-09-01', '2023-02-28'])
                ->avg('totalSodium') / 1000, 2), 
                round(Purchase::whereBetween('created_at', ['2023-03-01', '2023-06-30'])
                ->avg('totalSodium') / 1000, 2),
                round(Purchase::whereBetween('created_at', ['2023-07-01', '2023-08-31'])
                ->avg('totalSodium') / 1000, 2)
            ])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolBar(true);
    }
}