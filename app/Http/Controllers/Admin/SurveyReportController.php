<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Survey;

use App\Models\Adminnotif;

use Illuminate\Http\Request;
use App\Charts\CanteenRatingChart;

use App\Http\Controllers\Controller;
use App\Charts\ParentFoodSuggestionChart;
use Yajra\DataTables\DataTables as DataTables;

class SurveyReportController extends Controller
{
    public function index(ParentFoodSuggestionChart $suggestionChart, CanteenRatingChart $ratingChart)
    {
        $average = Survey::avg('rating');

        $surveys = Survey::selectRaw('suggestions, COUNT(*) as count')
            ->groupBy('suggestions')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $labels = array();
        foreach ($surveys as $survey) {
            array_push($labels, $survey['suggestions']);
        }
        $mostSuggested = array();
        for ($i = 0; $i < 5; $i++) {
            $mostSuggested[$i] = $labels[$i];
        }

        $adminNotifs = Adminnotif::get();
        return view('admin.Reports.survey', ['suggestionChart' => $suggestionChart->build(), 'ratingChart' => $ratingChart->build(), 'averageRating' => $average, 'mostSuggestedFoods' => $mostSuggested, 'adminNotifs' => $adminNotifs]);
    }

    public function surveyTable(Request $request)
    {
        // Initialize DataTable Values
        $surveys = Survey::all();
        foreach ($surveys as $survey) {
            $survey['created_at_formatted'] = Carbon::parse($survey->created_at)->format('M d, Y');
        }
        if ($request->ajax()) {
            return DataTables::of($surveys)
                ->make(true);
        }
        
        // Return View
        return view('admin.Reports.survey', compact('surveys'));
    }

    public function download_survey_report(){

        $average = Survey::avg('rating');

        $surveys = Survey::selectRaw('suggestions, COUNT(*) as count')
            ->groupBy('suggestions')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();

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
                width: 180px;
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

            <h2> <u> Parent Survey Report </u> </h2>

            <table class="border-2 border-solid">
                <tr> 
                    <th>Canteen Rating</th>
                    <th>Most Suggested</th>
                    <th>Count</th>
                </tr>

                <tr>
                    <td>'. $average. '</td>
                    <td>'. $surveys[0]['suggestions'] . '</td>
                    <td>'. $surveys[0]['count'] . '</td>
                </tr>
                <tr>
                    <td>                        </td>
                    <td>'. $surveys[1]['suggestions'] . '</td>
                    <td>'. $surveys[1]['count'] . '</td>
                </tr>
                <tr>
                    <td>                        </td>
                    <td>'. $surveys[2]['suggestions'] . '</td>
                    <td>'. $surveys[2]['count'] . '</td>
                </tr>
                <tr>
                    <td>                        </td>
                    <td>'. $surveys[3]['suggestions'] . '</td>
                    <td>'. $surveys[3]['count'] . '</td>
                </tr>
                <tr>
                    <td>                        </td>
                    <td>'. $surveys[4]['suggestions'] . '</td>
                    <td>'. $surveys[4]['count'] . '</td>
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
        $dompdf->stream('Parent Survey Report');

        return redirect()->back();
    }


}
