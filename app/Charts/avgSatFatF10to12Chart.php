<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class avgSatFatF10to12Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
        ->setTitle('Females Ages 10 to 12')
        ->setHeight(240)
        ->addData('Average Saturated Fat', [
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->whereBetween('created_at', ['2022-11-17', '2022-11-19'])
                ->avg('totalSatFat'), 2),
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->whereBetween('created_at', ['2022-11-20', '2022-11-22'])
                ->avg('totalSatFat'), 2),
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->whereBetween('created_at', ['2022-11-23', '2022-11-25'])
                ->avg('totalSatFat'), 2),
            round(Purchase::whereHas('student', function ($query) {
                $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
            })->whereBetween('created_at', [Carbon::yesterday()->format('Y-m-d'), Carbon::today()->format('Y-m-d')])
                ->avg('totalSatFat'), 2)
        ])
        ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
        ->setToolBar(true);
    }
}
