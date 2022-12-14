<?php

namespace App\Charts;

use App\Models\Bmi;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class weightChangeFLineChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
        ->setHeight(300)
        ->addData('Male', [
            round(Bmi::whereHas('student', function ($query) {
                $query->where('sex', 'M');
            })->avg('Q1Weight'), 2),
            round(Bmi::whereHas('student', function ($query) {
                $query->where('sex', 'M');
            })->avg('Q2Weight'), 2),
            round(Bmi::whereHas('student', function ($query) {
                $query->where('sex', 'M');
            })->avg('Q3Weight'), 2),
            round(Bmi::whereHas('student', function ($query) {
                $query->where('sex', 'M');
            })->avg('Q4Weight'), 2),
        ])
        ->addData('Female', [
            round(Bmi::whereHas('student', function ($query) {
                $query->where('sex', 'F');
            })->avg('Q1Weight'), 2),
            round(Bmi::whereHas('student', function ($query) {
                $query->where('sex', 'F');
            })->avg('Q2Weight'), 2),
            round(Bmi::whereHas('student', function ($query) {
                $query->where('sex', 'F');
            })->avg('Q3Weight'), 2),
            round(Bmi::whereHas('student', function ($query) {
                $query->where('sex', 'F');
            })->avg('Q4Weight'), 2),
        ])
        ->setXAxis(['1st Qtr', '2nd Qtr', '3rd Qtr', '4th Qtr']);
    }
}
