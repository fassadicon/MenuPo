<?php

namespace App\Charts\UserCharts;

use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SugarChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($id): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $purchases = Purchase::where('student_id', $id)->get();
        $sugar = 0;


        foreach($purchases as $purchase){
            $sugar += number_format((float)$purchase->totalSugar, 2, '.', '');
        }

        return $this->chart->barChart()
            ->setTitle('Sugar Intake Quarterly')
            ->addData('Sugar', [$sugar, 0, 0, 0])
            ->setColors(['#F733D9'])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolbar(true);
    }
}
