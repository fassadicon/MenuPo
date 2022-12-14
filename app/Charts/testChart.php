<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class testChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $test = [1, 2, 3];
        $test1 = [2, 3, 4];
        return $this->chart->barChart()
            ->setTitle('San Francisco vs Boston.')
            ->setXAxis(['January', 'February', 'March'])
            ->setDataset([
                [
                    'name'  =>  'Times Suggested1',
                    'data'  =>  $test
                ],
                [
                    'name'  =>  'Times Suggested2',
                    'data'  =>  $test1
                ],
            ])
            ->setMarkers(['#3F51B5'], 7, 4);
            // ->setGrid('#3F51B5', 0.1);
    }
}
