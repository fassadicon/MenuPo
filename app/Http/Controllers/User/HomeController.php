<?php

namespace App\Http\Controllers\User;

use autoload;
use Carbon\Carbon;
use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\Survey;
use GuzzleHttp\Client;
use App\Models\Student;
use FontLib\Autoloader;
use App\Mail\SampleMail;
use App\Models\Guardian;
use App\Models\Purchase;
use App\Models\Adminnotif;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\UserCharts\FatChart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Charts\UserCharts\SugarChart;
use PhpParser\Node\Expr\Cast\Object_;
use App\Charts\UserCharts\ParentChart;
use App\Charts\UserCharts\SatFatChart;
use App\Charts\UserCharts\SodiumChart;
use App\Charts\UserCharts\CalorieChart;
use App\Charts\UserCharts\HealthCharts;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function index(){

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
        
        //For checking and changing the payment status.
        $purchases =  Purchase::where('parent_id', $parent[0]->id)->with('payment')->get();

        foreach($purchases as $purchase){
            if($purchase->payment->paymentID != null && $purchase->payment->paymentStatus == 'unpaid'){
                
                $paymentID = $purchase->payment->paymentID;

                $ch = curl_init();
                $certificate_location = "C:\xampp\php\extras\ssl\cacert.pem";
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $certificate_location);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $certificate_location);
                
                curl_setopt_array($ch, [
                CURLOPT_URL => "https://api.paymongo.com/v1/links/$paymentID",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "accept: application/json",
                    "authorization: Basic c2tfdGVzdF9Ec2dNUldYWHZ1VHdCYVpzdjc3blJVUVc6"
                    ],
                ]);
                
                $response = curl_exec($ch);

                $data = json_decode($response, true);

                $payment_status = $data['data']['attributes']['status'];
                if($payment_status == 'unpaid'){
                    //
                }else{
                    DB::update('UPDATE payments SET paymentStatus = ? WHERE paymentID = ?', ['paid', $paymentID]);
                }

                
            }
        }

        $image = DB::select('SELECT * FROM posts');
        return view('user.home', [
            'students' => $student,
            'notifications' => $notifications,
            'isSurveyAvail' => $isSurveyAvail,
            'image' => $image
        ]);
    }

    public function sample(){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        $adminNotifs = Adminnotif::get();
        $stud_id = 2;

        $ch = curl_init();
        $certificate_location = "C:\xampp\php\extras\ssl\cacert.pem";
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $certificate_location);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $certificate_location);

        curl_setopt_array($ch, [
        CURLOPT_URL => "https://api.paymongo.com/v1/links",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"data\":{\"attributes\":{\"amount\":20000,\"description\":\"sample\",\"remarks\":\"sample\"}}}",
        CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "authorization: Basic c2tfdGVzdF9Ec2dNUldYWHZ1VHdCYVpzdjc3blJVUVc6",
            "content-type: application/json"
        ],
        ]);

        $response = curl_exec($ch);
        $err = curl_error($ch);

        curl_close($ch);

        // if ($err) {
        // echo "cURL Error #:" . $err;
        // } else {
        // echo $response;
        // }      

        $data = json_decode($response, true);
        
        $checkout_link = $data['data']['attributes']['checkout_url'];
        $payment_id = $data['data']['id'];
        $reference_num = $data['data']['attributes']['reference_number'];
        $payment_status = $data['data']['attributes']['status'];
        
        return redirect($checkout_link);


        // return view('user.sample', [
        //     'students' => $student,
        //     'notifications' => $notifications,
        //     'anak' => Student::findOrFail(1),
        //     'adminNotifs' => $adminNotifs,
        //     'calChart' => $calChart->build($stud_id),
        //     'fatChart' => $fatChart->build($stud_id),
        //     'satFatChart' => $satFatChart->build($stud_id),
        //     'sodiumChart' => $sodiumChart->build($stud_id),
        //     'sugarChart' => $sugarChart->build($stud_id)
        // ]);
    }

    public function deleteAllNotifs(Request $request){

        $parent = Guardian::where('user_id', auth()->id())->get();

        //DB::table('notifications')->delete('parent_id', 1);
        Notification::getQuery()->where('parent_id', $parent[0]->id)->delete();

        return response()->json(['status' => 'Success']);
    }

    public function sample_testing(Request $request){

        // 
        
        return response()->json(['status' => 'Success']);
    }

}
