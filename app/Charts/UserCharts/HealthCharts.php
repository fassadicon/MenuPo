<?php

namespace App\Charts\UserCharts;

use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Http\Controllers\Admin\PurchasesController;

class HealthCharts
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $purchases = Purchase::where('student_id', 1)->get();
        $kcal = 0;
        $satFat = 0;
        $fat = 0;
        $sodium = 0;
        $sugar = 0;

        foreach($purchases as $purchase){
            // $kcal += number_format((float)$purchase->totalKcal, 2, '.', '');
            $satFat += number_format((float)$purchase->totalSatFat, 0, '.', '');
            $fat += number_format((float)$purchase->totalFat, 0, '.', '');
            $sodium += number_format((float)$purchase->totalSodium, 0, '.', '');
            $sugar +=  number_format((float)$purchase->totalSugar, 0, '.', '');
        }
        
        $sodium = $sodium/1000;
        
        $sodium = number_format((float)$sodium, 2, '.', '');


        return $this->chart->barChart()
            ->setTitle('Quarterly Health Reports')
            ->setSubtitle('School year 2022-2023')
            // ->addData('Kcal', [$kcal, 9, 3, 4])
            ->addData('Saturated Fat', [$satFat])
            ->addData('Fat', [$fat])
            ->addData('Sugar', [$sugar])
            ->addData('Sodium', [$sodium])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter']);
    }
}
