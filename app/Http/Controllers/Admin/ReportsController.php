<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index() {
        return view('admin.Reports.foodIntake');
    }

    public function countFoodsBasedInColor($type)
    {   
        $labels = ['Green', 'Amber', 'Red'];
        $greens = Food::where('grade', '>', 0)->where('grade', '<=', 6)->where('type', $type);
        $greensCount = $greens->count();
        $ambers = Food::where('grade', '>', 6)->where('grade', '<=', 9)->where('type', $type);
        $ambersCount = $ambers->count();
        $reds = Food::where('grade', '>', 9)->where('grade', '<=', 12)->where('type', $type);
        $redsCount = $reds->count();
        $data = [];
        $data[0] = $greensCount;
        $data[1] = $ambersCount;
        $data[2] = $redsCount;

        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    public function aveGradePerType($type) {
        $labels = ['Green', 'Amber', 'Red'];
        $greensCount = Order::with('food')
        ->whereHas('food', function ($query) use ($type) {
            $query->where('grade', '>', 0)->where('grade', '<=', 6)->where('type', $type);
        })->count();
        $ambersCount = Order::with('food')
        ->whereHas('food', function ($query) use ($type) {
            $query->where('grade', '>', 6)->where('grade', '<=', 9)->where('type', $type);
        })->count();
        $redsCount = Order::with('food')
        ->whereHas('food', function ($query) use ($type) {
            $query->where('grade', '>', 9)->where('grade', '<=', 12)->where('type', $type);
        })->count();
        $data = [];
        $data[0] = $greensCount;
        $data[1] = $ambersCount;
        $data[2] = $redsCount;
        return response()->json(['labels' => $labels, 'data' => $data]);
    }
}
