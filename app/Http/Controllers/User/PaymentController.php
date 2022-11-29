<?php

namespace App\Http\Controllers\User;

use App\Models\Food;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Purchase;
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
        $notifications = DB::select('SELECT * FROM notifications WHERE status = ? && user_id = ? ORDER BY created_at DESC', [1, 1]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);
        
        //For total calories
        foreach($items as $item){
            $food = Food::findOrFail($item->id);
            $this->totKcal += $food->calcKcal;
            $this->totfat += $food->calcTotFat;
            $this->totsatfat += $food->calcSatFat;
            $this->totsugar += $food->calcSugar;
            $this->totsodium += $food->calcSodium;
           
        }

        $payment = new Payment;
        $payment->parent_id = 1;
        $payment->student_id = $request->get('anak_id');
        $payment->method = "Gcash";
        $payment->referenceNo = 123456789;
        $payment->save();
        
        $purchase = new Purchase;
        $purchase->parent_id = 1;
        $purchase->student_id = $request->get('anak_id');
        $purchase->totalAmount = Cart::priceTotal();
        $purchase->totalKcal = $this->totKcal;
        $purchase->totalTotFat = $this->totfat;
        $purchase->totalSatFat = $this->totsatfat;
        $purchase->totalSugar = $this->totsugar;
        $purchase->totalSodium = $this->totsodium;
        $purchase->payment_id = $payment->id;
        $purchase->paymentStatus = 0;
        $purchase->served_by = 1;
        $purchase->save();

        foreach($items as $item){
            $food = Food::findOrFail($item->id);
            $order = new Order;
            $order->purchase_id = $purchase->id;
            $order->parent_id = 1;
            $order->stud_id = $request->get('anak_id');
            $order->food_id = $food->id;
            $order->quantity = $item->qty;
            $order->amount = $item->price * $item->qty;
            $order->kcal = $food->calcKcal;
            $order->totfat = $food->calcTotFat;
            $order->satFat = $food->calcSatFat;
            $order->sugar = $food->calcSugar;
            $order->sodium = $food->calcSodium;
            $order->grade = $food->grade;
            $order->save();
        }

        //Creating notif
        // $notification = new Notification;
        // $notification->user_id = auth()->user()->id;
        // $notification->description = 'Order submitted successfully.';
        // $notification->status = 1;
        // $notification->save();

        Alert::success('Success!', 'Ordered successfully!');

        return view('user.payment', [
            'notifs' => $notifications,
            'students' => $student
        ]);
    }

    public function receipt(){

        $items = Cart::content();

        $notifications = DB::select('SELECT * FROM notifications WHERE status = ? && user_id = ? ORDER BY created_at DESC', [1, 1]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);

        // Destroying the cart session
        Cart::destroy();

        return view('user.receipt', [
            'items' => $items,
            'notifs' => $notifications,
            'students' => $student
        ]);
    }

    public function receipt_new(Purchase $purchase){

        $items = DB::select('SELECT * FROM orders WHERE purchase_id = ?', [$purchase->id]);
        $notifications = DB::select('SELECT * FROM notifications WHERE status = ? && user_id = ? ORDER BY created_at DESC', [1, 1]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);

        return view('user.receipt2', [
            'items' => $items,
            'notifs' => $notifications,
            'students' => $student
        ]);
    }

    public function pospayment(){
        
        $items = Cart::content();
        
        //For total calories
        foreach($items as $item){
            $food = Food::findOrFail($item->id);
            $this->totKcal += $food->calcKcal;
            $this->totfat += $food->calcTotFat;
            $this->totsatfat += $food->calcSatFat;
            $this->totsugar += $food->calcSugar;
            $this->totsodium += $food->calcSodium;
           
        }
        
        $purchase = new Purchase;
        $purchase->user_id = auth()->user()->id;
        $purchase->student_id = 1;
        $purchase->totprice = Cart::priceTotal();
        $purchase->totkcal = $this->totKcal;
        $purchase->totfat = $this->totfat;
        $purchase->totsatfat = $this->totsatfat;
        $purchase->totsugar = $this->totsugar;
        $purchase->totsodium = $this->totsodium;
        $purchase->payment_status = 0;
        $purchase->save();

        foreach($items as $item){
            $food = Food::findOrFail($item->id);
            $order = new Order;
            $order->purchase_id = $purchase->id;
            $order->user_id = auth()->user()->id;
            $order->stud_id = 1;
            $order->food_id = $food->id;
            $order->quantity = $item->qty;
            $order->price = $item->price * $item->qty;
            $order->calories = $food->calcKcal;
            $order->fat = $food->calcTotFat;
            $order->sat_fat = $food->calcSatFat;
            $order->sugar = $food->calcSugar;
            //$order->sodium = $food->calcSodium;
            $order->grade = $food->grade;
            $order->payment_status = 0;
            $order->save();
        }

        //Creating notif
        // $notification = new Notification;
        // $notification->user_id = auth()->user()->id;
        // $notification->description = 'Order submitted successfully.';
        // $notification->status = 1;
        // $notification->save();

        Alert::success('Success!', 'Ordered successfully!');
        
        Cart::destroy();

        return redirect('/pos');
    }
}
