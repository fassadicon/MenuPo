<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\Foodlog;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodlogController extends Controller
{
    public function index()
    {
        $adminNotifs = Adminnotif::get();
        $foodIDs = Foodlog::select('food_id')->distinct()->pluck('food_id')->toArray();


        $foodNames = array();
        foreach ($foodIDs as $foodID) {
            array_push(
                $foodNames,
                Food::where('id', $foodID)->get(['name'])->value('name')
            );
        }

        $starts = array();
        $adds = array();
        $solds = array();
        $ends = array();
        $amounts = array();
        $totalAmount = 0;
        foreach ($foodIDs as $foodID) {
            $firstLog = Foodlog::where('food_id', $foodID)
                ->whereDate('created_at', Carbon::today())->first();
            $startStock = $firstLog->start;
            array_push(
                $starts,
                $startStock
            );

            $lastLog = Foodlog::where('food_id', $foodID)
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at', 'desc')
                ->first();
            $endStock = $lastLog->end;
            array_push(
                $ends,
                $endStock
            );

            $addLog = Foodlog::where('food_id', $foodID)
                ->whereDate('created_at', Carbon::today())
                ->sum('add');
            array_push(
                $adds,
                $addLog
            );

            $soldLog = Foodlog::where('food_id', $foodID)
                ->whereDate('created_at', Carbon::today())
                ->sum('sold');
            array_push(
                $solds,
                $soldLog
            );

            $amountLog = Foodlog::where('food_id', $foodID)
                ->whereDate('created_at', Carbon::today())
                ->sum('sold') * Food::where('id', $foodID)->get(['price'])->value('price');
            array_push(
                $amounts,
                $amountLog
            );
            $totalAmount += $amountLog;
        }

        return view('admin.Logs.dailyFoodReport', compact('adminNotifs', 'foodNames', 'starts', 'ends', 'adds', 'solds', 'amounts', 'totalAmount'));
    }
}
