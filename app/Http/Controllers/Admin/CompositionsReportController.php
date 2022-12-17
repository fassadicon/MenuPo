<?php


namespace App\Http\Controllers\Admin;

use Dompdf\Dompdf;

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

    public function download_composition_report(){

        //Most Bought Cooked Meals
        $foods = Order::selectRaw('food_id, COUNT(*) as count')
            ->whereHas('food', function ($query) {
                $query->where('type', 3);
            })
            ->groupBy('food_id')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $cooked_data = array();
        $labels = array();
        foreach ($foods as $food) {
            array_push($cooked_data, $food['count']);
            array_push($labels, $food['food_id']);
        }
        $cooked_names = array();
        foreach ($labels as $label) {
            $foodIdName = Food::where('id', $label)
                ->get(['name'])->value('name');
            array_push($cooked_names, $foodIdName);
        }
        // End of Most Bought Cooked Meals

        // Most Bought Snacks
        $snacks = Order::selectRaw('food_id, COUNT(*) as count')
            ->whereHas('food', function ($query) {
                $query->where('type', 2);
            })
            ->groupBy('food_id')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $snack_data = array();
        $snack_label = array();
        foreach ($snacks as $snack) {
            array_push($snack_data, $snack['count']);
            array_push($snack_label, $snack['food_id']);
        }
        $snack_name = array();
        foreach ($snack_label as $label) {
            $foodIdName = Food::where('id', $label)
                ->get(['name'])->value('name');
            array_push($snack_name, $foodIdName);
        }
        // End of Most Bought Snacks

        // Most Bought Beverages
        $bevs = Order::selectRaw('food_id, COUNT(*) as count')
            ->whereHas('food', function ($query) {
                $query->where('type', 1);
            })
            ->groupBy('food_id')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $bevs_data = array();
        $bevs_labels = array();
        foreach ($bevs as $bev) {
            array_push($bevs_data, $bev['count']);
            array_push($bevs_labels, $bev['food_id']);
        }
        $bevs_name = array();
        foreach ($bevs_labels as $label) {
            $foodIdName = Food::where('id', $label)
                ->get(['name'])->value('name');
            array_push($bevs_name, $foodIdName);
        }
        // End of Most Bought Beverages

        // Most Bought Others
        $others = Order::selectRaw('food_id, COUNT(*) as count')
            ->whereHas('food', function ($query) {
                $query->where('type', 0);
            })
            ->groupBy('food_id')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $other_data = array();
        $other_label = array();
        foreach ($others as $other) {
            array_push($other_data, $other['count']);
            array_push($other_label, $other['food_id']);
        }
        $other_name = array();
        foreach ($other_label as $label) {
            $foodIdName = Food::where('id', $label)
                ->get(['name'])->value('name');
            array_push($other_name, $foodIdName);
        }
        // End of Most Bought Others

        /////////////////////////////////////////////////////////////////////////


        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <style>
            .main-container {
                margin-left: auto;
                margin-right: auto;
            }

            table{
                margin-left: auto;
                margin-right: auto;
            }

            h2{
                text-align: center;
            }

            th{
                width: 120px;
            }

            tr{
                text-align: center;
            }

            td{
                height: 20px;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }

            

        </style>
        <body>
            <h2> <u> Nuestra Seniora De Aranzazu Parochial School </u> </h2>
            <h2> <u> Most Bought </u> </h2>
            <div class="main-container">
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="2">Cooked Meals</th>
                        <th colspan="2">Snacks</th>
                        <th colspan="2">Beverages</th>
                        <th colspan="2">Others</th>
                    </tr>
                    <tr> 
                        <th>Food Name</th>
                        <th>Count</th>
                        <th>Food Name</th>
                        <th>Count</th>
                        <th>Food Name</th>
                        <th>Count</th>
                        <th>Food Name</th>
                        <th>Count</th>
                    </tr>

                    <tr>
                        <td>'.$cooked_names[0].'</td>
                        <td>'.$cooked_data[0].'</td>

                        <td>'.$snack_name[0].'</td>
                        <td>'.$snack_data[0].'</td>

                        <td>'.$bevs_name[0].'</td>
                        <td>'.$bevs_data[0].'</td>

                        <td>'.$other_name[0].'</td>
                        <td>'.$other_data[0].'</td>
                    </tr>
                    <tr>
                        <td>'.$cooked_names[1].'</td>
                        <td>'.$cooked_data[1].'</td>

                        <td>'.$snack_name[1].'</td>
                        <td>'.$snack_data[1].'</td>

                        <td>'.$bevs_name[1].'</td>
                        <td>'.$bevs_data[1].'</td>

                        <td>'.$other_name[1].'</td>
                        <td>'.$other_data[1].'</td>
                    </tr>
                    <tr>
                        <td>'.$cooked_names[2].'</td>
                        <td>'.$cooked_data[2].'</td>

                        <td>'.$snack_name[2].'</td>
                        <td>'.$snack_data[2].'</td>

                        <td>'.$bevs_name[2].'</td>
                        <td>'.$bevs_data[2].'</td>

                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>'.$cooked_names[3].'</td>
                        <td>'.$cooked_data[3].'</td>

                        <td>'.$snack_name[3].'</td>
                        <td>'.$snack_data[3].'</td>

                        <td>'.$bevs_name[3].'</td>
                        <td>'.$bevs_data[3].'</td>

                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>'.$cooked_names[4].'</td>
                        <td>'.$cooked_data[4].'</td>

                        <td>'.$snack_name[4].'</td>
                        <td>'.$snack_data[4].'</td>

                        <td>'.$bevs_name[4].'</td>
                        <td>'.$bevs_data[4].'</td>

                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>'.$cooked_names[5].'</td>
                        <td>'.$cooked_data[5].'</td>

                        <td>'.$snack_name[5].'</td>
                        <td>'.$snack_data[5].'</td>

                        <td>'.$bevs_name[5].'</td>
                        <td>'.$bevs_data[5].'</td>

                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>'.$cooked_names[6].'</td>
                        <td>'.$cooked_data[6].'</td>

                        <td>'.$snack_name[6].'</td>
                        <td>'.$snack_data[6].'</td>

                        <td>'.$bevs_name[6].'</td>
                        <td>'.$bevs_data[6].'</td>

                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>'.$cooked_names[7].'</td>
                        <td>'.$cooked_data[7].'</td>

                        <td>'.$snack_name[7].'</td>
                        <td>'.$snack_data[7].'</td>

                        <td>'.$bevs_name[7].'</td>
                        <td>'.$bevs_data[7].'</td>

                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>'.$cooked_names[8].'</td>
                        <td>'.$cooked_data[8].'</td>
                        <td></td>
                        <td></td>

                        <td>'.$bevs_name[8].'</td>
                        <td>'.$bevs_data[8].'</td>

                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>'.$cooked_names[9].'</td>
                        <td>'.$cooked_data[9].'</td>

                        <td></td>
                        <td></td>

                        <td>'.$bevs_name[9].'</td>
                        <td>'.$bevs_data[9].'</td>

                        <td></td>
                        <td></td>

                    </tr>
                </table>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


            <h2> <u> Data by Color </u> </h2>
            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th>Color</th>
                        <th>Foods</th>
                        <th>Menu</th>
                        <th>Bought</th>
                    </tr>

                    <tr> 
                        <td> Green </td>
                        <td>'. Food::where('grade', '>', 0)->where('grade', '<=', 6)->count() .' </td>
                        <td>'.  Menu::whereHas('food', function ($query) {
                            $query->where('grade', '>', 0)->where('grade', '<=', 6);
                        })->count() .' </td>
                        <td>'. Order::whereHas('food', function ($query) {
                            $query->where('grade', '>', 0)->where('grade', '<=', 6);
                        })->count() .' </td>
                    </tr>   

                    <tr>
                        <td> Amber </td>
                        <td>'. Food::where('grade', '>', 6)->where('grade', '<=', 9)->count() .' </td>
                        <td>'. Menu::whereHas('food', function ($query) {
                            $query->where('grade', '>', 6)->where('grade', '<=', 9);
                        })->count() .' </td>
                        <td>'. Order::whereHas('food', function ($query) {
                            $query->where('grade', '>', 6)->where('grade', '<=', 9);
                        })->count() .' </td>
                    </tr>

                    <tr>
                        <td> Red </td>
                        <td>'. Food::where('grade', '>', 10)->where('grade', '<=', 12)->count() .' </td>
                        <td>'. Menu::whereHas('food', function ($query) {
                            $query->where('grade', '>', 9)->where('grade', '<=', 12);
                        })->count() .' </td>
                        <td>'. Order::whereHas('food', function ($query) {
                            $query->where('grade', '>', 9)->where('grade', '<=', 12);
                        })->count() .' </td>
                    </tr>

                    <tr>
                        <td> Ungraded </td>
                        <td>'.  Food::whereNull('grade')->count().' </td>
                        <td>'. Menu::whereHas('food', function ($query) {
                            $query->whereNull('grade');
                        })->count() .' </td>
                        <td>'. Order::whereHas('food', function ($query) {
                            $query->whereNull('grade');
                        })->count() .' </td>
                    </tr>

                </table>
            </div>
            
            
            <h2> <u> Average Grade </u> </h2>
            <div>
                <table>
                    <tr>
                        <th>Food List</th>
                        <th>Menu</th>
                        <th>Bought</th>
                    </tr>
                
                    <tr>
                        <td>'. $averageFoodListGrade = round(Food::avg('grade'), 2) .'</td>
                        <td>'. $averageMenuGrade = round(Food::has('menus', '>=', 1)->avg('grade'), 2) .'</td>
                        <td>'. $averageBoughtGrade = round(Food::has('orders', '>=', 1)->avg('grade'), 2) .'</td>
                    </tr>

                </table>

            </div>

            
            <h5>Retrieved on: '. \Carbon\Carbon::now('Asia/Singapore')->toDateTimeString() .' </h5>

            
        </body>
        </html>
        
        ';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Menu and Order Composition Report');

        return redirect()->back();
    }
}
