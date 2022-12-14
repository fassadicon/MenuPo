<?php

namespace App\Charts\UserCharts;

use Carbon\Carbon;
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

        return $this->chart->barChart()
            ->setTitle('Saturated Fat Intake Quarterly')
            ->addData('Saturated Fat', [
                round(Purchase::whereBetween('created_at', ['2022-07-01 00:00:00', '2022-10-31 00:00:00'])
                ->where('student_id', $id)
                ->sum('totalSatFat'), 2),
                round(Purchase::whereBetween('created_at', ['2022-11-01 00:00:00', '2023-02-28 00:00:00'])
                ->where('student_id', $id)
                ->sum('totalSatFat'), 2),
                round(Purchase::whereBetween('created_at', ['2023-03-01 00:00:00', '2023-06-30 00:00:00'])
                ->where('student_id', $id)
                ->sum('totalSatFat'), 2),
                round(Purchase::whereBetween('created_at', ['2023-07-01 00:00:00', '2023-08-31 00:00:00'])
                ->where('student_id', $id)
                ->sum('totalSatFat'), 2)
               ])
            ->setColors(['#F83734'])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setHeight(240);
    }
}
