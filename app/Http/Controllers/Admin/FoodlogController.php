<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\Menu;
use App\Models\Admin;
use App\Models\Foodlog;
use App\Models\Purchase;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodlogController extends Controller
{
    public function index()
    {
        $adminNotifs = Adminnotif::get();

        $cookedMeals = Menu::with('food')
            // WHERE (`STATUS` = 'Temporary' and DATE(`expiring_at`) >= 'TODAY') or (`STATUS` = 'Default' and `expiring_at` IS NULL)
            ->where(function ($query) {
                $query->where('status', 1)
                    ->whereDate('displayed_at', Carbon::today()->format('Y-m-d'))
                    ->whereDate('removed_at', '>', Carbon::today()->format('Y-m-d'));
            })
            ->orWhere(function ($query) {
                $query->where('status', 0)
                    ->whereNull('displayed_at')
                    ->whereNull('removed_at');
            })
            // WHERE `menus`.`food_id` = `foods`.`id` and `TYPE` like '%Cooked Meal%') and
            // get distinct food id 
            ->orderBy('id', 'DESC')
            // ->groupBy('food_id')
            ->latest()
            ->get()
            ->unique('food_id');
        // dd($cookedMeals[10]->food_id);
        $foodIDs = array();
        foreach ($cookedMeals as $cookedMeal) {
            array_push(
                $foodIDs,
                $cookedMeal->food_id
            );
            // Foodlog::create([
            //     'food_id' => $cookedMeal->food_id,
            //     'description' => 'start_menu',
            //     'start' => $cookedMeal->food->stock,
            //     'end' => 0,
            //     'sold' => 0,
            //     'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
            // ]);
            if (Foodlog::where('food_id', $cookedMeal->food_id)->exists() == false) {
                Foodlog::create([
                    'food_id' => $cookedMeal->food_id,
                    'description' => 'start_menu',
                    'start' => $cookedMeal->food->stock,
                    'end' => 0,
                    'sold' => 0,
                    'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
                ]);
            }
            // } else {
            //     $logDate = Foodlog::where('food_id', $cookedMeal->food_id)->first();
            //     if ($logDate->created_at != Carbon::today()) {
            //         $food = Food::where('id', $cookedMeal->food_id)->first();
            //         // dd($food);
            //         Foodlog::create([
            //             'food_id' => $food->id,
            //             'description' => 'start_menu',
            //             'start' => $food->stock,
            //             'end' => 0,
            //             'sold' => 0,
            //             'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
            //         ]);
            //     }
            // }
        }
        // dd($food);
        // dd(Foodlog::all());

        // $foodIDs = array();
        // $foodIDs = Foodlog::select('food_id')->distinct()->pluck('food_id')->toArray();


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

        $items = array();
        $purchases = array();
        
        foreach ($foodIDs as $foodID) {
            array_push(
                $items,
                Food::where('id', '$foodID')->get(['name'])->value('name')
            );

            Purchase::with('order')
            ->whereHas('payment', function ($query) {
                $query->where('paymentStatus', 'paid');
            })
            ->whereHas('order', function ($query) use ($foodID) {
                $query->where('food_id', 'like', $foodID);
            })
            ->whereDate('')
            ->count();
            array_push(
                $purchases,
               0
            );
        }

        return view('admin.Logs.dailyFoodReport', compact(
            'adminNotifs',
            'foodNames',
            'starts',
            'ends',
            'adds',
            'solds',
            'amounts',
            'totalAmount',
            'items'
        ));
    }
}
