<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\Food;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Foodlog;
use App\Models\Student;
use App\Models\Purchase;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScannerController extends Controller
{
    public function index()
    {
        $adminNotifs = Adminnotif::get();
        return view('admin.OrderManagement.index', ['adminNotifs' => $adminNotifs]);
    }

    public function view($id)
    {
        $orders = Purchase::with('student', 'parent', 'orders.food')
            ->whereDate('created_at', Carbon::yesterday()->format('Y-m-d'))
            ->where('student_id', (int)$id)
            ->where('claimStatus', 0)
            ->where('type', 0)
            ->whereHas('payment', function ($query) {
                $query->where('paymentStatus', 'paid');
            })->get();

        $studentID = Student::where('id', (int)$id)->get(['id'])->value('id');
        $adminNotifs = Adminnotif::get();
        return response()->json(['purchase' => $orders, 'studentID' => $studentID, 'adminNotifs' => $adminNotifs]);
    }


    public function complete($sid)
    {
        do {
            $purchaseID = Purchase::whereDate('created_at', Carbon::yesterday()->format('Y-m-d'))
                ->where('student_id', (int)$sid)
                ->where('claimStatus', 0)
                ->where('type', 0)
                ->whereHas('payment', function ($query) {
                    $query->where('paymentStatus', 'paid');
                })->get(['id'])->value('id');

            $claimStatusUpdate = Purchase::where('id', $purchaseID)
                ->update(['claimStatus' => 1]);

            $orders = Order::with('food', 'purchase')->where('purchase_id', $purchaseID)->get();
            foreach ($orders as $order) {
                $stock = ($order->food->stock) - ($order->quantity);
                Food::where('id', $order->food->id)->update(['stock' => $stock]);
                Foodlog::create([
                    'food_id' => $order->food->id,
                    'description' => 'sold',
                    'start' => $order->food->stock,
                    'end' => $stock,
                    'sold' => $order->quantity,
                    'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
                ]);
            }
        } while ($claimStatusUpdate != null);

        return redirect('/admin/orders/scanner');
    }
}
