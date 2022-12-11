<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class averageNutrientConsumptionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Average Daily Macronutrient Consumed from Bought Foods')
            ->setSubtitle('Total Fat, Saturated Fat, Added Sugar, Sodium')
            ->addData('Average Total Fat', [
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-19'])
                ->avg('totalTotFat'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-20', '2022-11-22'])
                ->avg('totalTotFat'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-23', '2022-11-25'])
                ->avg('totalTotFat'), 2),
                round(Purchase::whereBetween('created_at', [Carbon::yesterday()->format('Y-m-d'), Carbon::today()->format('Y-m-d')])
                ->avg('totalTotFat'), 2)
            ])
            ->addData('Average Saturated Fat', [
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-19'])
                ->avg('totalSatFat'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-20', '2022-11-22'])
                ->avg('totalSatFat'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-23', '2022-11-25'])
                ->avg('totalSatFat'), 2),
                round(Purchase::whereBetween('created_at', [Carbon::yesterday()->format('Y-m-d'), Carbon::today()->format('Y-m-d')])
                ->avg('totalSatFat'), 2)
            ])
            ->addData('Average Added Sugars', [
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-19'])
                ->avg('totalSugar'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-20', '2022-11-22'])
                ->avg('totalSugar'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-23', '2022-11-25'])
                ->avg('totalSugar'), 2),
                round(Purchase::whereBetween('created_at', [Carbon::yesterday()->format('Y-m-d'), Carbon::today()->format('Y-m-d')])
                ->avg('totalSugar'), 2)
            ])
            ->addData('Average Sodium', [
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-19'])
                ->avg('totalSodium') / 70, 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-20', '2022-11-22'])
                ->avg('totalSodium') / 70, 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-23', '2022-11-25'])
                ->avg('totalSodium') / 70, 2),
                round(Purchase::whereBetween('created_at', [Carbon::yesterday()->format('Y-m-d'), Carbon::today()->format('Y-m-d')])
                ->avg('totalSodium') / 70, 2)
            ])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolBar(true);
    }
}
