<?php

namespace App\Charts;

use App\Models\Order;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlySalesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->addData('Total Sales', [
                round(Purchase::whereBetween('created_at', ['2022-07-01', '2022-07-31'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2022-08-01', '2022-08-31'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2022-09-01', '2022-09-30'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2022-10-01', '2022-10-31'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2022-11-01', '2022-11-30'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2022-12-01', '2022-12-31'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2023-01-01', '2023-01-31'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2023-02-01', '2023-02-28'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2023-03-01', '2023-03-31'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2023-04-01', '2023-04-30'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2023-05-01', '2023-05-31'])->sum('totalAmount')),
                round(Purchase::whereBetween('created_at', ['2023-06-01', '2023-06-30'])->sum('totalAmount'))
            ])
            ->addData('Cooked Food Total Sales', [
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 3);
                })->sum('amount')
               
            ])
            ->addData('Snacks Sales', [
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 2);
                })->sum('amount')
            ])
            ->addData('Beverages Sales', [
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 1);
                })->sum('amount')
            ])
            ->addData('Other Foods Sales', [
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 0);
                })->sum('amount')
            ])
            ->addData('Pastas/Porridges Sales', [
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount'),
                Order::whereHas('purchase', function ($query) {
                    $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                })->whereHas('food', function ($query) {
                    $query->where('type', 4);
                })->sum('amount')
            ])
            // ->addData('Beverages Total Sales', [
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2022-07-01', '2022-07-31'])->sum('totalAmount')),
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2022-08-01', '2022-08-31'])->sum('totalAmount')),
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2022-09-01', '2022-09-30'])->sum('totalAmount')),
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2022-10-01', '2022-10-31'])->sum('totalAmount')),
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2022-11-01', '2022-11-30'])->sum('totalAmount')),
            //     round(Purchase::whereBetween('created_at', ['2022-12-01', '2022-12-31'])->sum('totalAmount')),
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2023-01-01', '2023-01-31'])->sum('totalAmount')),
            //     round(Purchase::whereBetween('created_at', ['2023-02-01', '2023-02-28'])->sum('totalAmount')),
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2023-03-01', '2023-03-31'])->sum('totalAmount')),
            //     round(Purchase::whereBetween('created_at', ['2023-04-01', '2023-04-30'])->sum('totalAmount')),
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2023-05-01', '2023-05-31'])->sum('totalAmount')),
            //     round(Purchase::whereBetween('created_at', ['2023-06-01', '2023-06-30'])->sum('totalAmount')),
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])->sum('totalAmount')),
            //     round(Purchase::whereHas('orders.food', function($query){
            //         $query->where('type', 1);
            //     })->whereBetween('created_at', ['2023-08-01', '2023-08-31'])->sum('totalAmount'))
            // ])
            ->setXAxis(['July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug']);
    }
}
