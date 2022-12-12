<?php

namespace App\Charts;

use App\Models\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Menu;

class boughtColorChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Bought Items by Nutritional Grade Color')
            ->addData([
                Order::whereHas('food', function ($query) {
                    $query->where('grade', '>', 0)->where('grade', '<=', 6);
                })->count(),
                Order::whereHas('food', function ($query) {
                    $query->where('grade', '>', 6)->where('grade', '<=', 9);
                })->count(),
                Order::whereHas('food', function ($query) {
                    $query->where('grade', '>', 9)->where('grade', '<=', 12);
                })->count(),
                Order::whereHas('food', function ($query) {
                    $query->whereNull('grade');
                })->count()
            ])
            ->setLabels(['Green', 'Amber', 'Red', 'Ungraded'])
            ->setColors(['#40916c', '#ff8800', '#d90429', '#adb5bd'])
            ->setToolBar(true);
    }
}
