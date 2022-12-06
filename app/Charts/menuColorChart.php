<?php

namespace App\Charts;

use App\Models\Menu;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class menuColorChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Menu Items by Nutritional Grade Color')
            ->addData([
                Menu::whereHas('food', function ($query) {
                    $query->where('grade', '>', 0)->where('grade', '<=', 6);
                })->count(),
                Menu::whereHas('food', function ($query) {
                    $query->where('grade', '>', 6)->where('grade', '<=', 9);
                })->count(),
                Menu::whereHas('food', function ($query) {
                    $query->where('grade', '>', 9)->where('grade', '<=', 12);
                })->count(),
                Menu::whereHas('food', function ($query) {
                    $query->whereNull('grade');
                })->count()
            ])
            ->setLabels(['Green', 'Amber', 'Red', 'Ungraded'])
            ->setToolBar(true);
    }
}
