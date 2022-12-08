<?php

namespace App\Http\Controllers\User;

use App\Models\Food;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Guardian;
use App\Models\Purchase;
use App\Models\AdminNotif;
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
        $payment->method = "Gcash";
        $payment->referenceNo = 123456789;
        $payment->save();
        
        $purchase = new Purchase;
        $purchase->parent_id = $parent[0]->id;
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
        $notification->parent_id = 1;
        $notification->title = 'Order submitted successfully.';
        $notification->description = 'The order is received by the admin. Please wait for the confirmation of the payment.';
        $notification->status = 1;
        $notification->save();

        //Creating admin notif
        $adminNotif = new Adminnotif;
        $adminNotif->type = 2;
        $adminNotif->title = 'Order submitted successfully.';
        $adminNotif->description = 'The order is received by the admin. Please wait for the confirmation of the payment.';
        $adminNotif->status = 1;
        $adminNotif->save();

        Alert::success('Success!', 'Ordered successfully!');

        return view('user.payment', [
            'notifications' => $notifications,
            'students' => $student
        ]);
    }

    public function receipt(){

        $items = Cart::content();

        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);

        // Destroying the cart session
        Cart::destroy();

        return view('user.receipt', [
            'items' => $items,
            'notifications' => $notifications,
            'students' => $student
        ]);
    }

    public function receipt_new(Purchase $purchase){

        $items = DB::select('SELECT * FROM orders WHERE purchase_id = ?', [$purchase->id]);
        $parent = Guardian::where('user_id', auth()->id())->get();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [$parent[0]->id]);
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [$parent[0]->id]);

        return view('user.receipt2', [
            'items' => $items,
            'notifications' => $notifications,
            'students' => $student
        ]);
    }

    
}
