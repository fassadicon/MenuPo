<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Food;

use App\Models\Menu;

use App\Models\Purchase;
use Illuminate\Support\Arr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTables;


class MenuSuggestionController extends Controller
{
    public function suggestion(Request $request)
    {
        // $greens = Food::where('grade', '<=', 6.00)
        // ->inRandomOrder()->limit(3)->get();
        // $ambers = Food::where('grade', '<=', 9.00)
        // ->where('grade', '>', 6.00)
        // ->inRandomOrder()->limit(2)->get();
        // $reds = Food::where('grade', '<=', 12.00)
        // ->where('grade', '>', 9.00)
        // ->inRandomOrder()->limit(2)->get();
        // $grays = Food::where('grade', NULL)
        // ->inRandomOrder()->limit(1)->get();

        // return view('admin.FoodManagement.menuSuggestion', compact('ambers', 'greens', 'reds', 'grays'));

        return view('admin.FoodManagement.menuSuggestion');
    }

    public function suggest()
    {
        $greens = Food::where('grade', '<=', 6.00)
            ->inRandomOrder()->limit(3)->get();
        $ambers = Food::where('grade', '<=', 9.00)
            ->where('grade', '>', 6.00)
            ->inRandomOrder()->limit(2)->get();
        $reds = Food::where('grade', '<=', 12.00)
            ->where('grade', '>', 9.00)
            ->inRandomOrder()->limit(2)->get();
        $grays = Food::where('grade', NULL)
            ->inRandomOrder()->limit(1)->get();

        // return response('/reco', compact('ambers', 'greens', 'reds', 'grays'));
        return response()->json(['ambers' => $ambers, 'greens' => $greens, 'reds' => $reds, 'grays' => $grays]);
    }

    public function publish(Request $request)
    {
        $meals = $request->all();
        $find = Food::query();
        $set = Menu::query();
        $test = 0;
        foreach ($meals as $meal) {
            foreach ($meal as $key=>$value) {
                $find = Food::where('name', $value)->first();
                $set = Menu::insert([
                    'food_id' => $find->id,
                    'status' => 'Default',
                    'user_id' => 1
                ]);
            }
        }

        return $test;
        // return $two;

        //  // Changes the claimStatus to 1 (Claimed)
        //  Purchase::where('student_id', (int)$sid)->update(['claimStatus' => 1]);
        //  // Subtracts the quantity of food items ordered to their stock
        //  $orders = Order::with('food')->where('purchase_id', (int)$pid)->get();
        //  foreach($orders as $order) {
        //       $stock = ($order->food->stock) - ($order->quantity);
        //      Food::where('id', $order->food->id)->update(['stock' => $stock]);
        //  }
    }
}
