<?php

namespace App\Charts\UserCharts;

use App\Models\Order;
use App\Models\Guardian;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ParentChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $parent = Guardian::where('user_id', auth()->id())->get();
        
        $healthy = Order::whereHas('purchase', (fn($q)=>
            $q->where('parent_id', '=', $parent[0]->id)
        ))->whereHas('food', function($e){
            $e->where('grade', '=', 4)
            ->orWhere('grade', '=', 5)
            ->orWhere('grade', '=', 6);
        })->count();
    
        $mod_healthy = Order::whereHas('purchase', (fn($q)=>
            $q->where('parent_id', '=', $parent[0]->id)
        ))->whereHas('food', function($e){
            $e->where('grade', '=', 7)
            ->orWhere('grade', '=', 8)
            ->orWhere('grade', '=', 9);
        })->count();

        $not_healthy = Order::whereHas('purchase', (fn($q)=>
            $q->where('parent_id', '=', $parent[0]->id)
        ))->whereHas('food', function($e){
            $e->where('grade', '=', 10)
            ->orWhere('grade', '=', 11)
            ->orWhere('grade', '=', 12);
        })->count();

        return $this->chart->pieChart()
            ->setTitle('Purchases by Food Grade')
            ->addData([$healthy, $mod_healthy, $not_healthy])
            ->setColors(['#6AA54D', '#F8C834', '#F83734'])
            ->setLabels(['Healthy', 'Moderately Healthy', 'Not Healthy'])
            ->setWidth(400);
    }
}
