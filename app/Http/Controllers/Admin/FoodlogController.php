<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\Menu;
use App\Models\Admin;
use App\Models\Order;
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

        $items = ['Rice Meals', 'Pastas/Porridges', 'Snacks', 'Beverages', 'Others'];
        $purchases = Purchase::with('order')
            ->whereHas('payment', function ($query) {
                $query->where('paymentStatus', 'paid');
            })
            ->whereDate('updated_at', Carbon::today())
            ->get();
        
        // dd($purchases);a
        $cashs = array();
        $sumCookedMeals = 0;
        $sumPastas = 0;
        $sumSnacks = 0;
        $sumBevs = 0;
        $sumOthers = 0;
        $totalAmountByType = 0;
        foreach ($purchases as $purchase) {
            $orderCookedMealAmount = Order::where('purchase_id', $purchase->id)
            ->whereHas('food', function($query) {
                $query->where('type', 3);
            })->get(['amount'])->value('amount');
            $sumCookedMeals += $orderCookedMealAmount;

            $orderPastaAmount = Order::where('purchase_id', $purchase->id)
            ->whereHas('food', function($query) {
                $query->where('type', 4);
            })->get(['amount'])->value('amount');
            $sumPastas += $orderPastaAmount;

            $orderSnackAmount = Order::where('purchase_id', $purchase->id)
            ->whereHas('food', function($query) {
                $query->where('type', 2);
            })->get(['amount'])->value('amount');
            $sumSnacks += $orderSnackAmount;

            $orderBevAmount = Order::where('purchase_id', $purchase->id)
            ->whereHas('food', function($query) {
                $query->where('type', 1);
            })->get(['amount'])->value('amount');
            $sumBevs += $orderBevAmount;

            $orderOtherAmount = Order::where('purchase_id', $purchase->id)
            ->whereHas('food', function($query) {
                $query->where('type', 0);
            })->get(['amount'])->value('amount');
            $sumOthers += $orderOtherAmount;
        }
        array_push($cashs, $sumCookedMeals);
        array_push($cashs, $sumPastas);
        array_push($cashs, $sumSnacks);
        array_push($cashs, $sumBevs);
        array_push($cashs, $sumOthers);
        // dd($cashs);
        foreach ($cashs as $cash) {
            $totalAmountByType += $cash;
        }
        $chips = [0, 0, 0, 0, 0];
        $total = $cashs;
        // foreach ($foodIDs as $foodID) {

            

        //     array_push(
        //         $purchases,
        //        0
        //     );

        //     array_push(
        //         $chips,
        //        0
        //     );
        // }

        return view('admin.Logs.dailyFoodReport', compact(
            'adminNotifs',
            'foodNames',
            'starts',
            'ends',
            'adds',
            'solds',
            'amounts',
            'totalAmount',
            'items',
            'cashs',
            'chips',
            'total',
            'totalAmountByType'
        ));
    }
}
