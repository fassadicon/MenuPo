<?php

namespace App\Charts\UserCharts;

use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SatFatChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($id): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $purchases = Purchase::where('student_id', $id)->get();
        $satFat = 0;


        foreach($purchases as $purchase){
            $satFat += $purchase->totalSatFat;
        }
        $satFat = number_format((float)$satFat, 2, '.', '');

        return $this->chart->barChart()
            ->setTitle('Saturated Fat Intake Quarterly')
            ->addData('SatFat', [$satFat, 0, 0, 0])
            ->setColors(['#F83734'])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolbar(true);;
    }
}
