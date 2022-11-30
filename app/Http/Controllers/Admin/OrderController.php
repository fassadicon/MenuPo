<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\Menu;
use App\Models\Admin;

use App\Models\Order;
use App\Models\Purchase;

// use DataTables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTables;


class OrderController extends Controller
{
    public function index(Request $request) 
    {
        // Initialize Datatable Values
        $orders = Order::all()
        ->sortBy('purchase_id')
        ->load('food', 'purchase');

        if ($request->ajax()) {
            return DataTables::of($orders)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewOrder"><i class="bi bi-info-lg"></i></a>';

                    // $btn = $btn . ' <a href="/admin/orders/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-danger btn-sm"><i class="bi bi-archive"></i></a>';
                    
                    return $btn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        // return view
        return view('admin.OrderManagement.orders', compact('orders'));
    }

    public function view($id)
    {
        return Order::where('id', $id)->first()
        ->load('purchases', 'food');
    }

    
}
