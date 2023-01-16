<?php

namespace App\Charts;

use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class thisWeekSalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {

        return $this->chart->lineChart()
            ->setHeight(300)
            ->addData('Total Sales', [
                round(Purchase::whereBetween('created_at', ['2023-01-01', '2023-01-07'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2023-01-08', '2023-01-14'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2023-01-15', '2023-01-21'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2023-01-22', '2023-01-31'])->sum('totalAmount'))
            ])
            ->setXAxis(['Week 1', 'Week 2', 'Week 3', 'Week 4']);
    }
}
