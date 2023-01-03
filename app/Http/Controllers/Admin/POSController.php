<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use App\Models\Menu;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Foodlog;
use App\Models\Payment;
use App\Models\Student;
use App\Models\Purchase;
use App\Models\Adminnotif;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Gloudemans\Shoppingcart\Facades\Cart;

class POSController extends Controller
{
    public $totKcal, $totfat, $totsatfat, $totsugar, $totsodium;

    public function index($id){
        
        $student = Student::findorfail($id);
        $foods =  Menu::with('food')->get();
        $adminNotifs = Adminnotif::get();

        foreach($foods as $fud){
            if($fud->food->stock < 40){
                Alert::warning('Warning', 'Some items has less than 10 in stock.');
                break;
            }
        }

        return view('admin.OrderManagement.pos', [
            'foods' => $foods,
            'studentID' => $id,
            'student'=> $student,
            'adminNotifs' => $adminNotifs
        ]);
    }

    public function pospayment($sid){
        
        $items = Cart::content();

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

        $payment = new Payment;
        $payment->method = "Walk-in";
        $payment->referenceNo = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
        $payment->save();
        
        $purchase = new Purchase;
        $purchase->parent_id = Student::where('id', $sid)->get(['parent_id'])->value('parent_id');
        $purchase->student_id = $sid;
        $purchase->totalAmount = Cart::priceTotal();
        $purchase->totalKcal = $this->totKcal;
        $purchase->totalTotFat = $this->totfat;
        $purchase->totalSatFat = $this->totsatfat;
        $purchase->totalSugar = $this->totsugar;
        $purchase->totalSodium = $this->totsodium;
        $purchase->payment_id = $payment->id;
        $purchase->claimStatus = 1;
        $purchase->served_by = Admin::where('user_id', auth()->id())->get(['id'])->value('id');
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

            $prevStock = $food->stock;
            $newStock = $prevStock - $item->qty;

            Foodlog::create([
                'food_id' => $food->id,
                'description' => 'sold',
                'start' => $prevStock,
                'end' => $newStock,
                'sold' => $item->qty,
                'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
            ]);

            Food::where('id', $item->id)->update([
                'stock' => $newStock,
                'updated_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
            ]);

           
        }

        //Creating notif
        $notification = new Notification;
        $notification->parent_id = Student::where('id', $sid)->get(['parent_id'])->value('parent_id');
        $notification->title = 'Order submitted successfully.';
        $notification->description = 'The order is received by the admin. Please wait for the confirmation of the payment.';
        $notification->status = 1;
        $notification->save();

        Alert::success('Success!', 'Ordered successfully!');
        
        Cart::destroy();

        return redirect('/admin/orders/scanner');
    }

    public function addtocart(Request $request){

        $food_id = $request->input('food-id');

        $item = Food::findOrFail($food_id);
        $rice = Food::findOrFail(2);

        if($item->type == 3){
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
    
            Cart::add(
                $rice->id,
                $rice->name,
                1,
                $rice->price,
                0,
                ['image' => $rice->image,
                'type' => $rice->type
                ]
            );
        }
        else{
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
        }

        return response()->json(['status' => 'Success']);
    }

    public function add(Request $request){

        $food_id = $request->input('food-id');

        $item = Food::findOrFail($food_id);
        $rice = Food::findOrFail(2);

        if($item->type == 3){
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
    
            Cart::add(
                $rice->id,
                $rice->name,
                1,
                $rice->price,
                0,
                ['image' => $rice->image,
                'type' => $rice->type
                ]
            );
        }
        else{
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
        }

        return response()->json(['status' => 'Success']);
    }

    public function minus(Request $request){

        $food_id = $request->input('food-id');

        $item = Food::findOrFail($food_id);
        $rice = Food::findOrFail(2);
        $content = Cart::content();
        $rice_rowId = 0;

        foreach($content as $val){
            if($rice->id == $val->id){
                $rice_rowId = $val->rowId;
                $rice_qty = $val->qty;
            }
        }
        
        foreach($content as $val){
            if($item->id == $val->id && $item->type == 3){
                Cart::update($val->rowId, $val->qty-1);
                Cart::update($rice_rowId, $rice_qty-1);
            }
            elseif($item->id == $val->id && $item->type != 3){
                Cart::remove($val->rowId);
            }
        }

        return response()->json(['status' => 'Success']);
    }

    public function delete(Request $request){

        $food_id = $request->input('food-id');

        $item = Food::findOrFail($food_id);
        $content = Cart::content();
        $rice = Food::findOrFail(2);
        $rice_rowId = 0;
        $rice_qty = 0;

        foreach($content as $val){
            if($rice->id == $val->id){
                $rice_rowId = $val->rowId;
                $rice_qty = $val->qty;
            }
        }
        
        foreach($content as $val){
            if($item->id == $val->id && $item->type == 3){
                Cart::remove($val->rowId);
                Cart::update($rice_rowId, $rice_qty-$val->qty);
            }
            elseif($item->id == $val->id && $item->type != 3){
                Cart::remove($val->rowId);
            }
        }

        return response()->json(['status' => 'Success']);
        
    }
}
