<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\Order;
use App\Models\Survey;
use App\Models\Payment;
use App\Models\Guardian;
use App\Models\Purchase;
use App\Models\Adminnotif;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Gloudemans\Shoppingcart\Facades\Cart;



class PaymentController extends Controller
{
    public $totKcal, $totfat, $totsatfat, $totsugar, $totsodium;
    
    public function index(Request $request){
        
        $items = Cart::content();
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

        $totalPrice = Cart::priceTotal();
        $totalPricePayment = $totalPrice * 100;

        
        //For total calories
        foreach($items as $item){
            $food = Food::findOrFail($item->id);
            $this->totKcal += $food->calcKcal;
            $this->totfat += $food->calcTotFat;
            $this->totsatfat += $food->calcSatFat;
            $this->totsugar += $food->calcSugar;
            $this->totsodium += $food->calcSodium;
            $qty = $food->stock;
            DB::update('UPDATE foods SET stock = ? WHERE id = ?', [$qty-$item->qty, $food->id]);
        }
        // Paymongo Payment API
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
        CURLOPT_POSTFIELDS => "{\"data\":{\"attributes\":{\"amount\":$totalPricePayment,\"description\":\"Payment for Menu-Po:NSDAPS's Canteen\",\"remarks\":\"sample\"}}}",
        CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "authorization: Basic c2tfdGVzdF9Ec2dNUldYWHZ1VHdCYVpzdjc3blJVUVc6",
            "content-type: application/json"
            ],
        ]);

        $response = curl_exec($ch);
        $err = curl_error($ch);

        curl_close($ch);

        $data = json_decode($response, true);

        $checkout_link = $data['data']['attributes']['checkout_url'];
        $payment_id = $data['data']['id'];
        $reference_num = $data['data']['attributes']['reference_number'];
        $payment_status = $data['data']['attributes']['status'];

        $payment = new Payment;
        $payment->method = "Gcash";
        $payment->paymentID = $payment_id;
        $payment->referenceNo = $reference_num;
        $payment->paymentStatus = $payment_status;
        $payment->save();
        
        $purchase = new Purchase;
        $purchase->parent_id = $parent[0]->id;
        $purchase->student_id = $request->get('anak_id');
        $purchase->totalAmount = $totalPrice;
        $purchase->totalKcal = $this->totKcal;
        $purchase->totalTotFat = $this->totfat;
        $purchase->totalSatFat = $this->totsatfat;
        $purchase->totalSugar = $this->totsugar;
        $purchase->totalSodium = $this->totsodium;
        $purchase->payment_id = $payment->id;
        $purchase->served_by = 1;
        $purchase->save();

        foreach($items as $item){
            $food = Food::findOrFail($item->id);
            $order = new Order;
            $order->purchase_id = $purchase->id;
            $order->food_id = $food->id;
            $order->quantity = $item->qty;
            $order->amount = $item->price * $item->qty;
            $order->kcal = $food->calcKcal;
            $order->totfat = $food->calcTotFat;
            $order->satFat = $food->calcSatFat;
            $order->sugar = $food->calcSugar;
            $order->sodium = $food->calcSodium;
            $order->save();
        }

        //Creating notif
        $notification = new Notification;
        $notification->parent_id = $parent[0]->id;
        $notification->title = 'Order submitted successfully.';
        $notification->description = 'The order is received by the admin. Please wait for the confirmation of the payment.';
        $notification->type = 1;
        $notification->status = 1;
        $notification->save();

        //Creating admin notif
        $adminNotif = new Adminnotif;
        $adminNotif->type = 2;
        $adminNotif->title = 'Order submitted successfully.';
        $adminNotif->description = 'The order is received by the admin. Please wait for the confirmation of the payment.';
        $adminNotif->status = 1;
        $adminNotif->save();

        // Destroying the cart session
        Cart::destroy();

        Alert::success('Success!', 'Ordered successfully!');

        return view('user.receipt', [
            'items' => $items,
            'paymentLink' => $checkout_link,
            'notifications' => $notifications,
            'students' => $student,
            'isSurveyAvail' => $isSurveyAvail,
        ]);
    }

    // public function receipt(){

    //     $items = Cart::content();

    //     $parent = Guardian::where('user_id', auth()->id())->get();

    //     $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
    //     $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
    //     $survey = Survey::where('parent_id', $parent[0]->id)
    //         ->where('created_at', 'like', \Carbon\Carbon::now('Asia/Singapore')->toDateString().'%')->get();
    //     if(!empty($survey)){
    //         $isSurveyAvail = 1;
    //     }

    //     // Destroying the cart session
    //     Cart::destroy();

    //     return view('user.receipt', [
    //         'items' => $items,
    //         'notifications' => $notifications,
    //         'students' => $student,
    //         'isSurveyAvail' => $isSurveyAvail,
    //     ]);
    // }

    public function receipt_new(Purchase $purchase){

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);
        
        // $now = Carbon::now();
        // $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        // $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

        // $survey = Survey::where('parent_id', $parent[0]->id)
        //     ->whereBetween('created_at', [$weekStartDate, $weekEndDate])->get();

        // if(!empty($survey)){
        //     $isSurveyAvail = 1;
        // }

        $items = DB::select('SELECT * FROM orders WHERE purchase_id = ?', [$purchase->id]);
        $item_array = array();
        foreach($items as $item){
            $food = Food::findorfail($item->id);
            array_push($item_array, $food);
        }
    
        return view('user.receipt2', [
            'items' => $items,
            'item_array' => $item_array,
            'notifications' => $notifications,
            'students' => $student,
            'isSurveyAvail' => 0
        ]);
    }

    
}
