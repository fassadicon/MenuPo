<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Food;
use App\Models\Order;
use App\Models\Survey;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Purchase;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\UserCharts\FatChart;
use App\Http\Controllers\Controller;
use App\Charts\UserCharts\SugarChart;
use App\Charts\UserCharts\SatFatChart;
use App\Charts\UserCharts\SodiumChart;
use App\Charts\UserCharts\CalorieChart;
use App\Models\Bmi;
use RealRashid\SweetAlert\Facades\Alert;

class HealthController extends Controller
{
    public function index(Student $anak){

        

        $ids = explode(',' , $anak->restriction);

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

        $survey = Survey::where('parent_id', $parent[0]->id)
            ->whereBetween('created_at', [$weekStartDate, $weekEndDate])->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }

        $bmi = Bmi::where('id', $anak->bmi_id)->get();
        $purchase = DB::select('SELECT * FROM purchases WHERE parent_id = ? && student_id = ?', [$parent[0]->id, $anak->id]);

        // For average food grade
        $sample = Order::whereHas('purchase', (fn($q)=>
            $q->where('parent_id', $parent[0]->id)
                ->where('student_id', $anak->id)
        ))->with('food')->get();

        $average = 0;
        $ite = 0;
    
        foreach($sample as $sam){
            $average += $sam->food->grade;
            $ite += 1;
        }


        $average_grade = $average/$ite;
        $average_grade = number_format((float)$average_grade, 2, '.', '');

        //Restrict
        $restrict = array();
        foreach($ids as $id){
            $item = DB::select('select * from foods where id = ?', [$id]);
            array_push($restrict, $item);
        }

        return view('user.health', [
            'students' => $student,
            'bmi' => $bmi[0],
            'restricts' => $restrict,
            'parent' => $parent[0],
            'notifications' => $notifications,
            'purchases' => $purchase,
            'isSurveyAvail' => $isSurveyAvail,
            'anaks' => $anak,
            'average_grade' => $average_grade
        ]);
    }

    public function removeRestrict(Request $request){
        
        $ids = $request->input('anak-id');
        $ids  = explode(',', $ids);

        $anak_id = $ids[0];
        $food_id = $ids[1].',';

        $restrict = Student::find($anak_id);

        $new = str_replace($food_id, '', $restrict->restriction);


        DB::update('UPDATE students SET restriction = ? WHERE id = ?', [$new, $anak_id]);
        
        return response()->json(['status' => 'Success']);
    }

    public function edit(Student $anak){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

        $survey = Survey::where('parent_id', $parent[0]->id)
            ->whereBetween('created_at', [$weekStartDate, $weekEndDate])->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }

        return view('user.edit-studAcc', [
            'notifications' => $notifications,
            'anak' => $anak,
            'isSurveyAvail' => $isSurveyAvail,
            'students' => $student
        ]);
    }

    public function saveUpdate(Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => 'required',
            'gender' => 'required',
            'birthday' => 'required'
        ]);

        DB::update('UPDATE students SET firstName = ? , middleName = ? , lastName = ? , suffix = ? , sex = ? , birthDate = ? WHERE id = ?', [
            $request->input('firstName'),
            $request->input('lastName'),
            $request->input('middleName'),
            $request->input('suffix'),
            $request->input('gender'),
            $request->input('birthday'),
            $request->input('id')

        ]);

        Alert::success('Success!', 'Student details successfully changed.');

        return redirect()->route('health.index', $request->input('id'));
        
    }

    public function report_index($student_id, SatFatChart $satFatChart, SugarChart $sugarChart, SodiumChart $sodiumChart, CalorieChart $calChart, FatChart $fatChart){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $anak = Student::findorfail($student_id);

        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

        $survey = Survey::where('parent_id', $parent[0]->id)
            ->whereBetween('created_at', [$weekStartDate, $weekEndDate])->get();
        if(!empty($survey)){
            $isSurveyAvail = 1;
        }

        return view('user.health-report', [
            'students' => $student,
            'notifications' => $notifications,
            'anak' => $anak,
            'isSurveyAvail' => $isSurveyAvail,
            'calChart' => $calChart->build($student_id),
            'fatChart' => $fatChart->build($student_id),
            'satFatChart' => $satFatChart->build($student_id),
            'sodiumChart' => $sodiumChart->build($student_id),
            'sugarChart' => $sugarChart->build($student_id)
        ]);
    }

    public function download_report(Student $student){

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

            <h4>Name: '.$student->firstName. ' ' . $student->lastName . '</h4>
            <h4>Section: '.$student->grade . "-" .  $student->section.'</h4>

            <h2> <u> Student Nutritional Data Report </u> </h2>

            <table class="border-2 border-solid">
                <tr> 
                    <th>           </th>
                    <th>1st Quarter</th>
                    <th>2nd Quarter</th>
                    <th>3rd Quarter</th>
                    <th>4th Quarter</th>
                </tr>
                <tr>
                    <td>Calories</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-07-01 00:00:00', '2022-10-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalKcal'), 2) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-11-01 00:00:00', '2023-02-28 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalKcal'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-03-01 00:00:00', '2023-06-30 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalKcal'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01 00:00:00', '2023-08-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalKcal'), 2) .'</td>
                </tr>
                <tr>
                    <td>Fat</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-07-01 00:00:00', '2022-10-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalTotFat'), 2) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-11-01 00:00:00', '2023-02-28 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalTotFat'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-03-01 00:00:00', '2023-06-30 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalTotFat'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01 00:00:00', '2023-08-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalTotFat'), 2) .'</td>
                </tr>
                <tr>
                    <td>Saturated Fat</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-07-01 00:00:00', '2022-10-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSatFat'), 2) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-11-01 00:00:00', '2023-02-28 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSatFat'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-03-01 00:00:00', '2023-06-30 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSatFat'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01 00:00:00', '2023-08-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSatFat'), 2) .'</td>
                </tr>
                <tr>
                    <td>Sugar</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-07-01 00:00:00', '2022-10-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSugar'), 2) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-11-01 00:00:00', '2023-02-28 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSugar'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-03-01 00:00:00', '2023-06-30 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSugar'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01 00:00:00', '2023-08-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSugar'), 2) .'</td>
                </tr>
                <tr>
                    <td>Sodium</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-07-01 00:00:00', '2022-10-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSodium'), 2) .'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2022-11-01 00:00:00', '2023-02-28 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSodium'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-03-01 00:00:00', '2023-06-30 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSodium'), 2).'</td>
                    <td>'. round(Purchase::whereBetween('created_at', ['2023-07-01 00:00:00', '2023-08-31 00:00:00'])
                    ->where('student_id', $student->id)
                    ->sum('totalSodium'), 2) .'</td>
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
        $dompdf->stream('SNDR'.'-'.$student->lastName.', ' .$student->firstName . ' ' .  \Carbon\Carbon::now('Asia/Singapore')->toDateTimeString());

        return redirect()->back();
    }
}
