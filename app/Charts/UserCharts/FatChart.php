<?php

namespace App\Charts\UserCharts;

use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class FatChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($id): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $purchases = Purchase::where('student_id', $id)->get();
        $fat = 0;


        foreach($purchases as $purchase){
            $fat += number_format((float)$purchase->totalFat, 2, '.', '');
        }
        return $this->chart->barChart()
            ->setTitle('Fat Intake Quarterly')
            ->addData('Fat', [$fat, 0, 0, 0])
            ->setColors(['#F8C834'])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolbar(true);;
    }
}
