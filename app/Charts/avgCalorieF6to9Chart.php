<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class avgCalorieF6to9Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setHeight(240)
            ->addData('Average Calorie', [
                round(Purchase::whereHas('student', function ($query) {
                    $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                })->whereBetween('created_at', ['2022-08-01', '2022-11-30'])
                    ->avg('totalKcal')),
                round(Purchase::whereHas('student', function ($query) {
                    $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                    ->avg('totalKcal')),
                round(Purchase::whereHas('student', function ($query) {
                    $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                })->whereBetween('created_at', ['2023-04-01', '2023-06-30'])
                    ->avg('totalKcal')),
                round(Purchase::whereHas('student', function ($query) {
                    $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                    ->avg('totalKcal'))
            ])
            ->setXAxis(['1st Qtr', '2nd Qtr', '3rd Qtr', '4th Qtr'])
            ->setToolBar(true);
    }
}
