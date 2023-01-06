<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\AssignOp\Div;
use Yajra\DataTables\DataTables as DataTables;

class ConfirmPaymentTableController extends Controller
{
    public function index(Request $request)
    {
        // Initialize Datatable Values
        // $todayDate = Carbon::now();

        $purchases = Purchase::where('created_at', Carbon::yesterday())
            ->where('claimStatus', 0)
            ->where('type', 0)
            ->whereHas('payment', function($query) {
                $query->where('paymentStatus', 'unpaid');
            })
            ->get()
            ->load('orders', 'orders.food', 'parent', 'student', 'admin', 'payment');
        foreach ($purchases as $purchase) {
            $purchase['created_at_formatted'] = Carbon::parse($purchase->created_at)->format('M d, Y');
            $purchase['updated_at_formatted'] = Carbon::parse($purchase->updated_at)->format('M d, Y');
        }


        if ($request->ajax()) {
            return DataTables::of($purchases)
                ->addIndexColumn()
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();
        // return view
        return view('admin.OrderManagement.paymentConfirmationTable', compact('purchases', 'adminNotifs'));
    }
}
