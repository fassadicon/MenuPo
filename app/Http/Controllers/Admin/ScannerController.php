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
            ->where('student_id', (int)$id)
            ->where('claimStatus', 0)
            ->whereDate('created_at', '=', Carbon::yesterday()->format('Y-m-d'))
            ->get();

        $studentID = Student::where('id', (int)$id)->get(['id'])->value('id');
        $adminNotifs = Adminnotif::get();
        return response()->json(['purchase' => $orders, 'studentID' => $studentID, 'adminNotifs' => $adminNotifs]);
        // if ($orders->isEmpty()) {
        //     return $studentID; // Status code here
        // } else {
        //     return $orders;
        // }
    }


    public function complete($sid)
    {
        do {
            $claimStatusUpdate = Purchase::where('student_id', (int)$sid)
                ->whereDate('created_at', Carbon::yesterday())
                ->update(['claimStatus' => 1]);
        } while ($claimStatusUpdate != null);
        // Changes the claimStatus to 1 (Claimed)
        // Purchase::where('student_id', (int)$sid)
        // ->whereDate('created_at', Carbon::yesterday()->format('Y-m-d'))
        // ->update(['claimStatus' => 1]);
        // Subtracts the quantity of food items ordered to their stock
        $orders = Order::with('food', 'purchase')
            ->whereHas('purchase', function ($query) use ($sid) {
                $query->where('student_id', (int)$sid)
                    ->whereDate('created_at', Carbon::yesterday())
                    ->where('claimStatus', 1);
            })->get();
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

        return redirect('/admin/orders/scanner');
    }
}
