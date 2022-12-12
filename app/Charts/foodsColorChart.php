<?php

namespace App\Charts;

use App\Models\Food;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class foodsColorChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Food Items by Nutritional Grade Color')
            ->addData([
                Food::where('grade', '>', 0)->where('grade', '<=', 6)->count(),
                Food::where('grade', '>', 6)->where('grade', '<=', 9)->count(),
                Food::where('grade', '>', 9)->where('grade', '<=', 12)->count(),
                Food::whereNull('grade')->count()
            ])
            ->setLabels(['Green', 'Amber', 'Red', 'Ungraded'])
            ->setColors(['#40916c', '#ff8800', '#d90429', '#adb5bd'])
            ->setToolBar(true);
    }
}
