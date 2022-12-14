<?php

namespace App\Charts;

use App\Models\Bmi;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class bmiChangeFLineChart
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
                })->avg('Q1BMI'), 2),
                round(Bmi::whereHas('student', function ($query) {
                    $query->where('sex', 'M');
                })->avg('Q2BMI'), 2),
                round(Bmi::whereHas('student', function ($query) {
                    $query->where('sex', 'M');
                })->avg('Q3BMI'), 2),
                round(Bmi::whereHas('student', function ($query) {
                    $query->where('sex', 'M');
                })->avg('Q4BMI'), 2),
            ])
            ->addData('Female', [
                round(Bmi::whereHas('student', function ($query) {
                    $query->where('sex', 'F');
                })->avg('Q1BMI'), 2),
                round(Bmi::whereHas('student', function ($query) {
                    $query->where('sex', 'F');
                })->avg('Q2BMI'), 2),
                round(Bmi::whereHas('student', function ($query) {
                    $query->where('sex', 'F');
                })->avg('Q3BMI'), 2),
                round(Bmi::whereHas('student', function ($query) {
                    $query->where('sex', 'F');
                })->avg('Q4BMI'), 2),
            ])
            ->setXAxis(['1st Qtr', '2nd Qtr', '3rd Qtr', '4th Qtr']);
    }
}
