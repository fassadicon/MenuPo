<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class avgSatFatF6to9Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
        ->setTitle('Females Ages 6 to 9')
        ->setHeight(240)
        ->addData('Average Saturated Fat', [
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
            })->whereBetween('created_at', ['2022-08-01', '2022-11-30'])
                ->avg('totalSatFat')),
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
            })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                ->avg('totalSatFat')),
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
            })->whereBetween('created_at', ['2023-04-01', '2023-06-30'])
                ->avg('totalSatFat')),
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
            })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                ->avg('totalSatFat'))
        ])
        ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
        ->setToolBar(true);
    }
}
