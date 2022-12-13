<?php

namespace App\Charts;

use App\Models\Food;
use App\Models\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class boughtCookedMealsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function rand_color($count) {
        $colors = array();
        for ($i=0; $i < $count; $i++) {
            array_push($colors, sprintf('#%06X', mt_rand(0, 0xFFFFFF)));
        }
        return $colors;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        $foods = Order::selectRaw('food_id, COUNT(*) as count')
            ->whereHas('food', function ($query) {
                $query->where('type', 3);
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
        $count = (int)sizeof($labels);

        return $this->chart->horizontalBarChart()
            ->setTitle('Most Bought Cooked Meals')
            // ->setColors($this->rand_color($count))
            ->addData('Bought by', $data)
            ->setXAxis($names)
            ->setToolbar(true);
    }
}
