<?php

namespace App\Charts;

use App\Models\Food;
use App\Models\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class boughtBeveragesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $foods = Order::selectRaw('food_id, COUNT(*) as count')
            ->whereHas('food', function ($query) {
                $query->where('type', 1);
            })
            ->groupBy('food_id')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $data = array();
        $labels = array();
        foreach ($foods as $food) {
            array_push($data, $food['count']);
            array_push($labels, $food['food_id']);
        }
        $names = array();
        foreach ($labels as $label) {
            $foodIdName = Food::where('id', $label)
                ->get(['name'])->value('name');
            array_push($names, $foodIdName);
        }
        return $this->chart->horizontalBarChart()
            ->setTitle('Most Bought Beverages')
            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Bought by', $data)
            ->setXAxis($names)
            ->setToolbar(true);
    }
}
