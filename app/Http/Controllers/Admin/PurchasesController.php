<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Purchase;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


// Use Yajra Datatable
use Yajra\DataTables\DataTables as DataTables;

class PurchasesController extends Controller
{
    public function index(Request $request) 
    {
        // Initialize Datatable Values

        $purchases = Purchase::where('claimStatus', 0)
        ->get()
        ->load('orders', 'parent', 'student', 'admin');

        
        if ($request->ajax()) {
            return DataTables::of($purchases)
                ->addIndexColumn() 
                ->addColumn('action', function ($row) {
                    
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewPurchase"><i class="bi bi-info-lg"></i></a>';

                    // $btn = $btn . ' <a href="/admin/pendings/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="fas fa-check-circle"></i></a>';
                    
                    // $btn = $btn. '<a href="/admin/pendings/update' data-id="' . $row->id . '" data-toggle="toggle" data-orginal-title="Data" class="toggle-class" type="checkbox"  '" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive" {{$purchase->paymentStatus ? 'checked' : ''}}>';
                     return $btn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        // return view
        return view('admin.OrderManagement.pendings', compact('purchases'));
    }

    public function completedOrders(Request $request) 
    {
        // Initialize Datatable Values

        $purchases = Purchase::where('claimStatus', 1)
        ->get()
        ->load('orders', 'parent', 'student', 'admin');

        
        if ($request->ajax()) {
            return DataTables::of($purchases)
                ->addIndexColumn() 
                ->addColumn('action', function ($row) {
                    
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewPurchase"><i class="bi bi-info-lg"></i></a>';

                    // $btn = $btn . ' <a href="/admin/pendings/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="fas fa-check-circle"></i></a>';
                    
                    // $btn = $btn. '<a href="/admin/pendings/update' data-id="' . $row->id . '" data-toggle="toggle" data-orginal-title="Data" class="toggle-class" type="checkbox"  '" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive" {{$purchase->paymentStatus ? 'checked' : ''}}>';
                     return $btn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        // return view
        return view('admin.OrderManagement.completed', compact('purchases'));
    }
}
