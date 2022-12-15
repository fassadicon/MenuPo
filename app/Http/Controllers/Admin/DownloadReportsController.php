<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Bmi;
use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadReportsController extends Controller
{
    public function download_calorie_report(){

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
            h2{
                text-align: center;
            }
            th{
                width: 100px;
            }
            tr{
                text-align: center;
            }
            td{
                height: 40px;
            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
              }
        </style>
        <body>
           
            <div>
                <h5>Retrieved on: '. \Carbon\Carbon::now('Asia/Singapore')->toDateTimeString() .' </h5>
                <h2> <u> Calorie Intake Report </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="4">Average Daily Kcal by Quarter</th>
                        <th colspan="2">Kcal bought from canteen</th>
                        <th colspan="4">Kcal consumed by Sex and Age Group</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>

                        <th>Male(6-9)</th>
                        <th>Female(6-9)</th>
                        <th>Male(10-12)</th>
                        <th>Female(10-12)</th>
                        
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                        ->avg('totalKcal')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                        ->avg('totalKcal')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                        ->avg('totalKcal')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                        ->avg('totalKcal')) .'</td>

                        <td>'. round((Purchase::avg('totalKcal') * 100) / 1778, 1) .'</td>
                        <td>'. 100 - round((Purchase::avg('totalKcal') * 100) / 1778, 1).'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalKcal') * 100) / 1600, 1) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalKcal') * 100) / 1470, 1) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalKcal') * 100) / 2060, 1) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalKcal') * 100) / 1980, 1) .'</td>

                    </tr>

                </table>
            </div>

            <div>
                <h2> <u> Calorie Intake for Male </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalKcal')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalKcal')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalKcal')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalKcal')) .'</td>

                       <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalKcal') * 100) / 1600).'</td>
                       <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalKcal') * 100) / 1600) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalKcal'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalKcal'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalKcal'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalKcal'), 2) .'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalKcal') * 100) / 2060) .'</td>
                        <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalKcal') * 100) / 2060) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <h2> <u> Calorie Intake for Female </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalKcal')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalKcal')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalKcal')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalKcal')) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalKcal') * 100) / 1470) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalKcal') * 100) / 1470) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalKcal'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalKcal'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalKcal'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalKcal'), 2) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalKcal') * 100) / 1980) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalKcal') * 100) / 1980) .'</td>
                    </tr>
                </table>
            </div>

            

            
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
        $dompdf->stream('Calorie Intake Report');

        return redirect()->back();
    }

    public function download_totalFat_report(){

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
            h2{
                text-align: center;
            }
            th{
                width: 100px;
            }
            tr{
                text-align: center;
            }
            td{
                height: 40px;
            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
              }
        </style>
        <body>
           
            <div>
                <h5>Retrieved on: '. \Carbon\Carbon::now('Asia/Singapore')->toDateTimeString() .' </h5>
                <h2> <u> Total Fat Intake Report </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="4">Average Daily Total Fat by Quarter</th>
                        <th colspan="2">Total Fat bought from canteen</th>
                        <th colspan="4">Total Fat consumed by Sex and Age Group</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>

                        <th>Male(6-9)</th>
                        <th>Female(6-9)</th>
                        <th>Male(10-12)</th>
                        <th>Female(10-12)</th>
                        
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                        ->avg('totalTotFat')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                        ->avg('totalTotFat')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                        ->avg('totalTotFat')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                        ->avg('totalTotFat')) .'</td>

                        <td>'. round((Purchase::avg('totalTotFat') * 100) / 30, 1) .'</td>
                        <td>'. 100 - round((Purchase::avg('totalTotFat') * 100) / 30, 1).'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalTotFat') * 100) / 30, 1) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalTotFat') * 100) / 30, 1) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalTotFat') * 100) / 30, 1) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalTotFat') * 100) / 30, 1) .'</td>

                    </tr>

                </table>
            </div>

            <div>
                <h2> <u> Total Fat Intake for Male </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalTotFat')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalTotFat')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalTotFat')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalTotFat')) .'</td>

                       <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalTotFat') * 100) / 30).'</td>
                       <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalTotFat') * 100) / 30) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalTotFat'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalTotFat'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalTotFat'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalTotFat'), 2) .'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalTotFat') * 100) / 30) .'</td>
                        <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalTotFat') * 100) / 30) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <h2> <u> Total Fat Intake for Female </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalTotFat')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalTotFat')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalTotFat')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalTotFat')) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalTotFat') * 100) / 30) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalTotFat') * 100) / 30) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalTotFat'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalTotFat'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalTotFat'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalTotFat'), 2) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalTotFat') * 100) / 30) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalTotFat') * 100) / 30) .'</td>
                    </tr>
                </table>
            </div>

            

            
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
        $dompdf->stream('Total Fat Intake Report');

        return redirect()->back();
    }

    public function download_satFat_report(){

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
            h2{
                text-align: center;
            }
            th{
                width: 100px;
            }
            tr{
                text-align: center;
            }
            td{
                height: 40px;
            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
              }
        </style>
        <body>
           
            <div>
                <h5>Retrieved on: '. \Carbon\Carbon::now('Asia/Singapore')->toDateTimeString() .' </h5>
                <h2> <u> Saturated Fat Intake Report </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="4">Average Daily Saturated Fat by Quarter</th>
                        <th colspan="2">Saturated Fat bought from canteen</th>
                        <th colspan="4">Saturated Fat consumed by Sex and Age Group</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>

                        <th>Male(6-9)</th>
                        <th>Female(6-9)</th>
                        <th>Male(10-12)</th>
                        <th>Female(10-12)</th>
                        
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                        ->avg('totalSatFat')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                        ->avg('totalSatFat')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                        ->avg('totalSatFat')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                        ->avg('totalSatFat')) .'</td>

                        <td>'. round((Purchase::avg('totalSatFat') * 100) / 23, 1) .'</td>
                        <td>'. 100 - round((Purchase::avg('totalSatFat') * 100) / 23, 1).'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalSatFat') * 100) / 21, 1) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalSatFat') * 100) / 19, 1) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSatFat') * 100) / 27, 1) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSatFat') * 100) / 26, 1) .'</td>

                    </tr>

                </table>
            </div>

            <div>
                <h2> <u> Saturated Fat Intake for Male </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSatFat')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSatFat')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSatFat')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSatFat')) .'</td>

                       <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSatFat') * 100) / 21).'</td>
                       <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSatFat') * 100) / 21) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSatFat'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSatFat'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSatFat'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSatFat'), 2) .'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSatFat') * 100) / 27) .'</td>
                        <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSatFat') * 100) / 27) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <h2> <u> Saturated Fat Intake for Female </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSatFat')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSatFat')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSatFat')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSatFat')) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSatFat') * 100) / 19) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSatFat') * 100) / 19) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSatFat'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSatFat'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSatFat'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSatFat'), 2) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalSatFat') * 100) / 26) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalSatFat') * 100) / 26) .'</td>
                    </tr>
                </table>
            </div>

            

            
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
        $dompdf->stream('Saturated Fat Intake Report');

        return redirect()->back();
    }

    public function download_sugar_report(){

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
            h2{
                text-align: center;
            }
            th{
                width: 100px;
            }
            tr{
                text-align: center;
            }
            td{
                height: 40px;
            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
              }
        </style>
        <body>
           
            <div>
                <h5>Retrieved on: '. \Carbon\Carbon::now('Asia/Singapore')->toDateTimeString() .' </h5>
                <h2> <u> Sugar Intake Report </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="4">Average Daily Sugar by Quarter</th>
                        <th colspan="2">Sugar bought from canteen</th>
                        <th colspan="4">Sugar consumed by Sex and Age Group</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>

                        <th>Male(6-9)</th>
                        <th>Female(6-9)</th>
                        <th>Male(10-12)</th>
                        <th>Female(10-12)</th>
                        
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                        ->avg('totalSugar')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                        ->avg('totalSugar')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                        ->avg('totalSugar')) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                        ->avg('totalSugar')) .'</td>

                        <td>'. round((Purchase::avg('totalSugar') * 100) / 23, 1) .'</td>
                        <td>'. 100 - round((Purchase::avg('totalSugar') * 100) / 23, 1).'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalSatFat') * 100) / 21) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalSatFat') * 100) / 19) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSatFat') * 100) / 27) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSatFat') * 100) / 26).'</td>

                    </tr>

                </table>
            </div>

            <div>
                <h2> <u> Sugar Intake for Male </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSugar')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSugar')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSugar')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSugar')) .'</td>

                       <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSugar') * 100) / 21).'</td>
                       <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSugar') * 100) / 21) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSugar'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSugar'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSugar'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSugar'), 2) .'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSugar') * 100) / 27) .'</td>
                        <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSugar') * 100) / 27) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <h2> <u> Sugar Intake for Female </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSugar')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSugar')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSugar')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSugar')) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSugar') * 100) / 19) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSugar') * 100) / 19) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSugar'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSugar'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSugar'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSugar'), 2) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalSugar') * 100) / 26) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalSugar') * 100) / 26) .'</td>
                    </tr>
                </table>
            </div>

            

            
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
        $dompdf->stream('Sugar Intake Report');

        return redirect()->back();
    }

    public function download_sodium_report(){

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
            h2{
                text-align: center;
            }
            th{
                width: 100px;
            }
            tr{
                text-align: center;
            }
            td{
                height: 40px;
            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
              }
        </style>
        <body>
           
            <div>
                <h5>Retrieved on: '. \Carbon\Carbon::now('Asia/Singapore')->toDateTimeString() .' </h5>
                <h2> <u> Sodium Intake Report </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="4">Average Daily Sodium by Quarter</th>
                        <th colspan="2">Sodium bought from canteen</th>
                        <th colspan="4">Sodium consumed by Sex and Age Group</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>

                        <th>Male(6-9)</th>
                        <th>Female(6-9)</th>
                        <th>Male(10-12)</th>
                        <th>Female(10-12)</th>
                        
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                        ->avg('totalSodium') /1000) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                        ->avg('totalSodium') /1000) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                        ->avg('totalSodium') /1000) .'</td>
                        <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                        ->avg('totalSodium') /1000) .'</td>

                        <td>'. round((Purchase::avg('totalSodium') * 100) / 2000, 1) .'</td>
                        <td>'. 100 - round((Purchase::avg('totalSodium') * 100) / 2000, 1).'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalSodium') * 100) / 2000) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->avg('totalSodium') * 100) / 2000) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSodium') * 100) / 2000) .'</td>
                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSodium') * 100) / 2000).'</td>

                    </tr>

                </table>
            </div>

            <div>
                <h2> <u> Sodium Intake for Male </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSodium')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSodium')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSodium')) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSodium')) .'</td>

                       <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSodium') * 100) / 2000).'</td>
                       <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSodium') * 100) / 2000) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Male (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSodium'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSodium'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSodium'), 2) .'</td>
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSodium'), 2) .'</td>

                        <td>'. round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSodium') * 100) / 2000) .'</td>
                        <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'M')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->avg('totalSodium') * 100) / 2000) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <h2> <u> Sodium Intake for Female </u> </h2>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (6-9)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSodium')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSodium')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSodium')) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSodium')) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSodium') * 100) / 2000) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(9), Carbon::now()->subYear(6)]);
                    })->avg('totalSodium') * 100) / 2000) .'</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="border-2 border-solid">
                    <tr> 
                        <th colspan="6">Female (10-12)</th>
                    </tr>
                    <tr> 
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>

                        <th>Consumed</th>
                        <th>Left</th>
                    </tr>

                    <tr> 
                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-08-01', '2022-11-31'])
                            ->avg('totalSodium'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2022-12-01', '2023-03-31'])
                            ->avg('totalSodium'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-04-01', '2023-06-31'])
                            ->avg('totalSodium'), 2) .'</td>

                        <td>'. round(Purchase::whereHas('student', function ($query) {
                            $query->where('sex', 'F')->whereBetween('birthdate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                        })->whereBetween('created_at', ['2023-07-01', '2023-07-31'])
                            ->avg('totalSodium'), 2) .'</td>

                    <td>'. round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalSodium') * 100) / 2000) .'</td>

                    <td>'. 100 - round((Purchase::whereHas('student', function ($query) {
                        $query->where('sex', 'F')->whereBetween('birthDate', [Carbon::now()->subYear(12), Carbon::now()->subYear(10)]);
                    })->avg('totalSodium') * 100) / 2000) .'</td>
                    </tr>
                </table>
            </div>

            

            
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
        $dompdf->stream('Sodium Intake Report');

        return redirect()->back();
    }

    public function download_bmi_report(){


        $Q1_underweight = 0;
        $Q1_normal = 0;
        $Q1_overweight = 0;
        $Q1_obese = 0;

        $Q1_BMIs = Bmi::get(['Q1BMI'])->toArray();
        foreach ($Q1_BMIs as $BMI) {
            if ($BMI['Q1BMI'] < 18.5) {
                $Q1_underweight++;
            } else if ($BMI['Q1BMI'] >= 18.5 && $BMI['Q1BMI'] < 25) {
                $Q1_normal++;
            } else if ($BMI['Q1BMI'] >= 25 && $BMI['Q1BMI'] < 29.9) {
                $Q1_overweight++;
            } else if ($BMI['Q1BMI'] >= 30) {
                $Q1_obese++;
            }
        }
        ////////////////////////////////////

        $Q2_underweight = 0;
        $Q2_normal = 0;
        $Q2_overweight = 0;
        $Q2_obese = 0;

        $Q2_BMIs = Bmi::get(['Q2BMI'])->toArray();
        foreach ($Q2_BMIs as $BMI) {
            if ($BMI['Q2BMI'] < 18.5) {
                $Q2_underweight++;
            } else if ($BMI['Q2BMI'] >= 18.5 && $BMI['Q2BMI'] < 25) {
                $Q2_normal++;
            } else if ($BMI['Q2BMI'] >= 25 && $BMI['Q2BMI'] < 29.9) {
                $Q2_overweight++;
            } else if ($BMI['Q2BMI'] >= 30) {
                $Q2_obese++;
            }
        }
        ////////////////////////////////////////////////

        $Q3_underweight = 0;
        $Q3_normal = 0;
        $Q3_overweight = 0;
        $Q3_obese = 0;

        $Q3_BMIs = Bmi::get(['Q3BMI'])->toArray();
        foreach ($Q3_BMIs as $BMI) {
            if ($BMI['Q3BMI'] < 18.5) {
                $Q3_underweight++;
            } else if ($BMI['Q3BMI'] >= 18.5 && $BMI['Q3BMI'] < 25) {
                $Q3_normal++;
            } else if ($BMI['Q3BMI'] >= 25 && $BMI['Q3BMI'] < 29.9) {
                $Q3_overweight++;
            } else if ($BMI['Q3BMI'] >= 30) {
                $Q3_obese++;
            }
        }
        /////////////////////////////////////////////////
        $Q4_underweight = 0;
        $Q4_normal = 0;
        $Q4_overweight = 0;
        $Q4_obese = 0;

        $Q4_BMIs = Bmi::get(['Q4BMI'])->toArray();
        foreach ($Q4_BMIs as $BMI) {
            if ($BMI['Q4BMI'] < 18.5) {
                $Q4_underweight++;
            } else if ($BMI['Q4BMI'] >= 18.5 && $BMI['Q4BMI'] < 25) {
                $Q4_normal++;
            } else if ($BMI['Q4BMI'] >= 25 && $BMI['Q4BMI'] < 29.9) {
                $Q4_overweight++;
            } else if ($BMI['Q4BMI'] >= 30) {
                $Q4_obese++;
            }
        }

        // For Average Height & Weight
        $avgMQ1Height = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'M');
        })->avg('Q1Height'));
        $avgMQ2Height = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'M');
        })->avg('Q2Height'));
        $avgMQ3Height = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'M');
        })->avg('Q3Height'));
        $avgMQ4Height = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'M');
        })->avg('Q4Height'));
        $averageMHeight = ($avgMQ1Height + $avgMQ2Height + $avgMQ3Height + $avgMQ4Height)/4;
    
        $avgFQ1Height = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'F');
        })->avg('Q1Height'));
        $avgFQ2Height = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'F');
        })->avg('Q2Height'));
        $avgFQ3Height = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'F');
        })->avg('Q3Height'));
        $avgFQ4Height = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'F');
        })->avg('Q4Height'));
        $averageFHeight = ($avgFQ1Height + $avgFQ2Height + $avgFQ3Height + $avgFQ4Height)/4;
    
        $avgMQ1Weight = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'M');
        })->avg('Q1Weight'));
        $avgMQ2Weight = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'M');
        })->avg('Q2Weight'));
        $avgMQ3Weight = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'M');
        })->avg('Q3Weight'));
        $avgMQ4Weight = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'M');
        })->avg('Q4Weight'));
        $averageMWeight = ($avgMQ1Weight + $avgMQ2Weight + $avgMQ3Weight + $avgMQ4Weight)/4;
    
        $avgFQ1Weight = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'F');
        })->avg('Q1Weight'));
        $avgFQ2Weight = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'F');
        })->avg('Q2Weight'));
        $avgFQ3Weight = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'F');
        })->avg('Q3Weight'));
        $avgFQ4Weight = round(Bmi::whereHas('student', function($query){
            $query->where('sex', 'F');
        })->avg('Q4Weight'));
        $averageFWeight = ($avgFQ1Weight + $avgFQ2Weight + $avgFQ3Weight + $avgFQ4Weight)/4;
        // End of Average Height & Weight

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
                height: 40px;
            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
              }
        </style>
        <body>

            <h2> <u> BMI Data Report </u> </h2>

            <table class="border-2 border-solid">
                <tr> 
                    <th colspan="4">1st Quarter</th>
                    <th colspan="4">2nd Quarter</th>
                </tr>
                <tr> 
                    <th>Underweight</th>
                    <th>Normal</th>
                    <th>Overweight</th>
                    <th>Obese</th>

                    <th>Underweight</th>
                    <th>Normal</th>
                    <th>Overweight</th>
                    <th>Obese</th>
                </tr>


                <tr>
                    <td>'. $Q1_underweight .'</td>
                    <td>'. $Q1_normal .'</td>
                    <td>'. $Q1_overweight .'</td>
                    <td>'. $Q1_obese .'</td>

                    <td>'. $Q2_underweight .'</td>
                    <td>'. $Q2_normal .'</td>
                    <td>'. $Q2_overweight .'</td>
                    <td>'. $Q2_obese .'</td>
                </tr>

            </table>

            <table class="border-2 border-solid">
                <tr> 
                    <th colspan="4">3rd Quarter</th>
                    <th colspan="4">4th Quarter</th>
                </tr>
                <tr> 
                    <th>Underweight</th>
                    <th>Normal</th>
                    <th>Overweight</th>
                    <th>Obese</th>

                    <th>Underweight</th>
                    <th>Normal</th>
                    <th>Overweight</th>
                    <th>Obese</th>
                </tr>


                <tr>
                    <td>'. $Q3_underweight .'</td>
                    <td>'. $Q3_normal .'</td>
                    <td>'. $Q3_overweight .'</td>
                    <td>'. $Q3_obese .'</td>

                    <td>'. $Q4_underweight .'</td>
                    <td>'. $Q4_normal .'</td>
                    <td>'. $Q4_overweight .'</td>
                    <td>'. $Q4_obese .'</td>
                </tr>

            </table>

            <br>
            <br>

            <table class="border-2 border-solid">
                <tr> 
                    <th colspan="2">MALE</th>
                    <th colspan="2">FEMALE</th>
                </tr>
                <tr> 
                    <th>Average Height</th>
                    <th>Average Weight</th>
                    <th>Average Height</th>
                    <th>Average Weight</th>
                </tr>
                <tr>
                    <td>'. $averageMHeight .'</td>
                    <td>'. $averageMWeight .'</td>
                    <td>'. $averageFHeight.'</td>
                    <td>'. $averageFWeight .'</td>
                </tr>
            </table>
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
        $dompdf->stream('BMI Data Report');

        return redirect()->back();
















    }

    public function download_sales_report(){
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
            h2{
                text-align: center;
            }
            th{
                width: 75px;
            }
            tr{
                text-align: center;
            }
            td{
                height: 40px;
            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
              }
            .total{
                font-weight: bold;
            }
        </style>
        <body>

            <h2> <u>Canteen Sales Report </u> </h2>

            <table class="border-2 border-solid">
                <tr> 
                    <th>        </th>
                    <th>July</th>
                    <th>August</th>
                    <th>September</th>
                    <th>October</th>
                    <th>November</th>
                    <th>December</th>
                    <th>January</th>
                    <th>February</th>
                    <th>March</th>
                    <th>April</th>
                    <th>May</th>
                    <th>June</th>
                </tr>

                <tr>
                    <td>Cooked Meals </td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 3);
                    })->sum('amount') .'</td>
                   
                </tr>

                <tr>
                    <td> Pasta & Porridge </td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 4);
                    })->sum('amount') .'</td>
                </tr>

                <tr>
                    <td> Snacks </td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 2);
                    })->sum('amount') .'</td>
                </tr>

                <tr>
                    <td> Beverages </td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 1);
                    })->sum('amount') .'</td>
                </tr>

                <tr>
                    <td> Others </td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-07-01', '2022-07-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-08-01', '2022-08-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-09-01', '2022-09-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-10-01', '2022-10-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-11-01', '2022-11-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2022-12-01', '2022-12-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-01-01', '2023-01-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-02-01', '2023-02-28']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-03-01', '2023-03-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-04-01', '2023-04-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-05-01', '2023-05-31']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                    <td>'. Order::whereHas('purchase', function ($query) {
                        $query->whereBetween('created_at', ['2023-06-01', '2023-06-30']);
                    })->whereHas('food', function ($query) {
                        $query->where('type', 0);
                    })->sum('amount') .'</td>
                </tr>

                <tr class="total"> 
                    <td>Total</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-07-01', '2022-07-31'])->sum('totalAmount')) .'</td>
                    <td>'.  round(Purchase::whereBetween('created_at', ['2022-08-01', '2022-08-31'])->sum('totalAmount')) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-09-01', '2022-09-30'])->sum('totalAmount')) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-10-01', '2022-10-31'])->sum('totalAmount')) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-11-01', '2022-11-30'])->sum('totalAmount')) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-12-01', '2022-12-31'])->sum('totalAmount')) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-01-01', '2023-01-31'])->sum('totalAmount')) .'</td>
                    <td>'.  round(Purchase::whereBetween('created_at', ['2023-02-01', '2023-02-28'])->sum('totalAmount')) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-03-01', '2023-03-31'])->sum('totalAmount')) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-04-01', '2023-04-30'])->sum('totalAmount')) .'</td>
                    <td>'.  round(Purchase::whereBetween('created_at', ['2023-05-01', '2023-05-31'])->sum('totalAmount')) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-06-01', '2023-06-30'])->sum('totalAmount')) .'</td>
                </tr>
        
            </table>
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
        $dompdf->stream('Canteen Sales Report');

        return redirect()->back();
    }
}
