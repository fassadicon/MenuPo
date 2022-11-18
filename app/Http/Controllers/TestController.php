<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\Food;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\Guardian;
use App\Models\Purchase;

// use Yajra\DataTables\DataTables as DataTables;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\SearchPane;

class TestController extends Controller
{
    public function index()
    {
        // $users = User::where('role', 0)->get();
        // $purchases = Purchase::all();
        // $menus = Menu::with('food.orders.purchase', 'food')
        //     // WHERE (`STATUS` = 'Temporary' and DATE(`expiring_at`) >= 'TODAY') or (`STATUS` = 'Default' and `expiring_at` IS NULL)
        //     ->where(function ($query) {
        //         $query->where('status', 'Temporary')
        //             ->whereDate('expiring_at', '>', Carbon::now()->format('Y-m-d'));
        //     })
        //     ->orWhere(function ($query) {
        //         $query->where('status', 'Default')
        //             ->WhereNull('expiring_at');
        //     })
        //     // WHERE `menus`.`food_id` = `foods`.`id` and `TYPE` like '%Cooked Meal%') and
        //     ->whereHas('food', function ($query) {
        //         $query->where('type', 'like', '%Cooked Meal%');
        //     })
        //     ->whereHas('food.orders.purchase', function ($query) {
        //         $query->where('paymentStatus', 'like', '%paid%');
        //     })
        //     // ORDER BY ISNULL(expiring_at), expiring_at DESC
        //     ->orderByRaw('ISNULL(expiring_at), expiring_at ASC')
        //     ->get();
        // $foods = Food::get()->pluck('name');
        // $foods = json_decode($foods);
        return view('admin.test');
    }

    // if (totalPoints <= 0) {
    //     color = 'gray';
    // } else if (totalPoints <= 6) {
    //     color = 'green';
    // } else if (totalPoints <= 9) {
    //     color = 'amber';
    // } else if (totalPoints <= 12) {
    //     color = 'red';
    // } else {
    //     color = null;
    // }

    public function getData()
    {   
        $labels = ['Green', 'Amber', 'Red'];
        $greens = Food::where('grade', '>', 0)->where('grade', '<=', 6);
        $greensCount = $greens->count();
        $ambers = Food::where('grade', '>', 6)->where('grade', '<=', 9);
        $ambersCount = $ambers->count();
        $reds = Food::where('grade', '>', 9)->where('grade', '<=', 12);
        $redsCount = $reds->count();
        $data = [];
        $data[0] = $greensCount;
        $data[1] = $ambersCount;
        $data[2] = $redsCount;

        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    public function dt(Request $request)
    {
        // Initialize DataTable Values
        $purchases = Purchase::with('student', 'parent', 'orders.food')->select('purchases.*');
        // Purchase::where('student_id', (int)$id)->first()->load('student', 'parent', 'orders.food');
        if ($request->ajax()) {
            return DataTables::eloquent($purchases)
                ->addIndexColumn()
                // ->addColumn('Parent', function ($purchase) {
                //     return $purchase->parent->name;
                // })
                ->addColumn('students', '{{$student_id}}')
                ->skipTotalRecords()
                ->toJson();
        }

        // Return View
        return view('admin.FoodManagement.dt', compact('purchases'));
    }

    public function suggest(Request $request)
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

        return view('admin.reco', compact('ambers', 'greens', 'reds', 'grays'));
    }

    public function try(Request $request)
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
}
