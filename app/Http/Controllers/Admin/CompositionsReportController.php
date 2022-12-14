<?php


namespace App\Http\Controllers\Admin;

use App\Models\Food;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Charts\menuColorChart;
use App\Charts\foodsColorChart;
use App\Charts\boughtColorChart;
use App\Charts\boughtOthersChart;
use App\Charts\boughtSnacksChart;
use App\Charts\boughtBeveragesChart;
use App\Http\Controllers\Controller;
use App\Charts\boughtCookedMealsChart;

class CompositionsReportController extends Controller
{
    public function index(
        boughtCookedMealsChart $boughtCookedMealsChart,
        boughtSnacksChart $boughtSnacksChart,
        boughtBeveragesChart $boughtBeveragesChart,
        boughtOthersChart $boughtOthersChart,
        foodsColorChart $foodsColorChart,
        menuColorChart $menuColorChart,
        boughtColorChart $boughtColorChart
    ) {
        $averageFoodListGrade = Food::avg('grade');
        $averageMenuGrade = Food::has('menus', '>=', 1)->avg('grade');
        $averageBoughtGrade = Food::has('orders', '>=', 1)->avg('grade');
        $adminNotifs = Adminnotif::get();
        return view('admin.Reports.composition', [
            'boughtCookedMealsChart' => $boughtCookedMealsChart->build(),
            'boughtSnacksChart' => $boughtSnacksChart->build(),
            'boughtBeveragesChart' => $boughtBeveragesChart->build(),
            'boughtOthersChart' => $boughtOthersChart->build(),
            'foodsColorChart' => $foodsColorChart->build(),
            'menuColorChart' => $menuColorChart->build(),
            'boughtColorChart' => $boughtColorChart->build(),
            'averageFoodListGrade' => $averageFoodListGrade,
            'averageMenuGrade' => $averageMenuGrade,
            'averageBoughtGrade' => $averageBoughtGrade,
            'adminNotifs' => $adminNotifs
        ]);
    }
}
