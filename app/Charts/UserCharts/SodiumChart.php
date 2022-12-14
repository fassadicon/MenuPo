<?php

namespace App\Charts\UserCharts;

use Carbon\Carbon;
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
    

        return $this->chart->barChart()
            ->setTitle('Sodium Intake Quarterly')
            ->addData('Sodium', [
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-19'])
                ->where('student_id', $id)
                ->sum('totalSodium'), 2),
                round(Purchase::whereBetween('created_at', ['2022-11-20', '2022-11-22'])
                ->where('student_id', $id)
                ->sum('totalSodium'), 2),
                round(Purchase::whereBetween('created_at', ['2022-11-23', '2022-11-25'])
                ->where('student_id', $id)
                ->sum('totalSodium'), 2),
                round(Purchase::whereBetween('created_at', [Carbon::yesterday()->format('Y-m-d'), Carbon::today()->format('Y-m-d')])
                ->where('student_id', $id)
                ->sum('totalSodium'), 2)
               ])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolbar(true);;
    }
}
