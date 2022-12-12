<?php

namespace App\Charts\UserCharts;

use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CalorieChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($id): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $purchases = Purchase::where('student_id', $id)->get();
        $kcal = 0;

        foreach($purchases as $purchase){
            $kcal += number_format((float)$purchase->totalKcal, 2, '.', '');
        }
        return $this->chart->barChart()
            ->setTitle('Calorie Intake Quarterly')
            ->addData('Calorie', [$kcal, 0, 0, 0])
            ->setColors(['#6AA54D'])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolbar(true);;
    }
}
