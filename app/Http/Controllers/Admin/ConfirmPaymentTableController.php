<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Purchase;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTables;

class ConfirmPaymentTableController extends Controller
{
    public function index(Request $request) 
    {
        // Initialize Datatable Values
        // $todayDate = Carbon::now();

        $purchases = Purchase::where('created_at', Carbon::yesterday())
        ->where('paymentStatus', 0)
        // ->whereHas('payment', function($query) {
        //     $query->whereNotNull('method')->whereNotNull('referenceNo');
        // })
        ->where('claimStatus', 0)
        ->where('type', 0)
        ->get()
        ->load('orders', 'orders.food', 'parent', 'student', 'admin', 'payment');
        foreach ($purchases as $purchase) {
            $purchase['created_at_formatted'] = Carbon::parse($purchase->created_at)->format('M d, Y');
            $purchase['updated_at_formatted'] = Carbon::parse($purchase->updated_at)->format('M d, Y');
        }

        
        if ($request->ajax()) {
            return DataTables::of($purchases)
                ->addIndexColumn() 
                ->addColumn('action', function ($row) {
                    
                    // $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewPending"><i class="bi bi-info-lg"></i></a>';

                    $btn = ' <a href="/admin/orders/pendings/' . $row->id . '/confirm" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Confirm" class="confirmBtn btn btn-success btn-sm"><i class="bi bi-check-circle"></i></a>';

                     return $btn;
                })

                // ->addColumn('status', function ($row){
                //     if($row->paymentStatus = 1){
                //         $statusBtn = '<div class="form-check form-switch">
                //         <input class="form-check-input" type="checkbox" checked>
                //         </div>';
                //     } else if ($row->paymentStatus = 0) {
                //         $statusBtn = '<div class="form-check form-switch">
                //         <input class="form-check-input" type="checkbox">
                //         </div>';
                //     }
                //     return $statusBtn;
                // })


                ->rawColumns(['action'])
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();
        // return view
        return view('admin.OrderManagement.paymentConfirmationTable', compact('purchases', 'adminNotifs'));
    }
}
