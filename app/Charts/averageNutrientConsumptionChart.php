<?php

namespace App\Charts;

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
            ->setTitle('Average Nutrient Consumption')
            ->addData('Average Total Fat', [
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-18'])
                ->avg('totalTotFat'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-19', '2022-11-20'])
                ->avg('totalTotFat'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-21', '2022-11-23'])
                ->avg('totalTotFat'), 2),
                round(Purchase::whereBetween('created_at', ['2022-11-24', '2022-12-01'])
                ->avg('totalTotFat'), 2)
            ])
            ->addData('Average Saturated Fat', [
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-18'])
                ->avg('totalSatFat'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-19', '2022-11-20'])
                ->avg('totalSatFat'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-21', '2022-11-23'])
                ->avg('totalSatFat'), 2),
                round(Purchase::whereBetween('created_at', ['2022-11-24', '2022-12-01'])
                ->avg('totalSatFat'), 2)
            ])
            ->addData('Average Added Sugars', [
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-18'])
                ->avg('totalSugar'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-19', '2022-11-20'])
                ->avg('totalSugar'), 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-21', '2022-11-23'])
                ->avg('totalSugar'), 2),
                round(Purchase::whereBetween('created_at', ['2022-11-24', '2022-12-01'])
                ->avg('totalSugar'), 2)
            ])
            ->addData('Average Sodium', [
                round(Purchase::whereBetween('created_at', ['2022-11-17', '2022-11-18'])
                ->avg('totalSodium') / 1000, 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-19', '2022-11-20'])
                ->avg('totalSodium') / 1000, 2), 
                round(Purchase::whereBetween('created_at', ['2022-11-21', '2022-11-23'])
                ->avg('totalSodium') / 1000, 2),
                round(Purchase::whereBetween('created_at', ['2022-11-24', '2022-12-01'])
                ->avg('totalSodium') / 1000, 2)
            ])
            ->setXAxis(['Nov.17-18', 'Nov.19-20', 'Nov.21-23', 'Nov.24-Dec.1']);
    }
}
