<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\Food;
use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScannerController extends Controller
{
    public function index()
    {
        return view('admin.OrderManagement.index');
    }

    public function view($id)
    {
        $orders = Purchase::with('student', 'parent', 'orders.food')
        ->where('student_id', (int)$id)
        ->where('claimStatus', 0)
        ->whereDate('created_at', '=', Carbon::yesterday()->format('Y-m-d'))
        ->get();

        if ($orders->isEmpty()) {
            return response()->json(['error' => 'You have no order/s for today'], 404); // Status code here
        } else {
            return $orders;
        }
    }


    public function complete($sid, $pid)
    {
        // Changes the claimStatus to 1 (Claimed)
        Purchase::where('student_id', (int)$sid)
        ->whereDate('created_at', Carbon::yesterday()->format('Y-m-d'))
        ->update(['claimStatus' => 1]);
        // Subtracts the quantity of food items ordered to their stock
        $orders = Order::with('food')->where('purchase_id', (int)$pid)->get();
        foreach($orders as $order) {
            $stock = ($order->food->stock) - ($order->quantity);
            Food::where('id', $order->food->id)->update(['stock' => $stock]);
        }
        

        return redirect('/admin/orders/scanner');
    }
}
