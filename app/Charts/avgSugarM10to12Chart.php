<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class avgSugarM10to12Chart
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
        ->addData('Average Sugar', [
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->whereBetween('created_at', ['2022-07-01', '2022-10-31'])
                ->avg('totalSugar'), 2),
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->whereBetween('created_at', ['2022-09-01', '2023-02-28'])
                ->avg('totalSugar'), 2),
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->whereBetween('created_at', ['2023-03-01', '2023-06-30'])
                ->avg('totalSugar'), 2),
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->whereBetween('created_at', ['2023-07-01', '2023-08-31'])
                ->avg('totalSugar'), 2)
        ])
        ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
        ->setToolBar(true);
    }
}