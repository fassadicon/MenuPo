<?php

namespace App\Charts\UserCharts;

use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SodiumChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($id): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $purchases = Purchase::where('student_id', $id)->get();
        $sodium = 0;


        foreach($purchases as $purchase){
            $sodium += number_format((float)$purchase->totalSodium, 2, '.', '');
        }
        $sodium = $sodium/1000;

        return $this->chart->barChart()
            ->setTitle('Sodium Intake Quarterly')
            ->addData('Sodium', [$sodium, 0, 0, 0])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolbar(true);;
    }
}
