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
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-19'])
                ->avg('totalSodium') / 1000, 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-20', '2022-11-22'])
                ->avg('totalSodium') / 1000, 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-23', '2022-11-25'])
                ->avg('totalSodium') / 1000, 2),
                round(Purchase::whereBetween('created_at', [Carbon::yesterday()->format('Y-m-d'), Carbon::today()->format('Y-m-d')])
                ->avg('totalSodium') / 1000, 2)
            ])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolBar(true);
    }
}
