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

                    $btn = $btn . ' <a href="/admin/orders/placed/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="deleteOrder btn btn-danger btn-sm"><i class="bi bi-archive"></i></a>';
                    
                    
                    
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

    public function delete($id) 
    {
        $order = Order::where('id', $id)->first();

        $order->delete();
        

        return redirect()->back()->with('success', 'Order Deleted Successfully');
    }

    public function trash(Request $request)
    {
        // Initialize Datatable Values
        $orders = Order::onlyTrashed()->get()
        ->sortBy('purchase_id')
        ->load('food', 'purchase');

        if ($request->ajax()) {
            return DataTables::of($orders)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewOrder"><i class="bi bi-info-lg"></i></a>';

                    $btn = $btn . ' <a href="/admin/orders/placed/' . $row->id . '/restore" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Restore" class="restoreOrder btn btn-success btn-sm"><i class="bi bi-arrow-clockwise"></i></a>';
                    
                    return $btn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }

        // return view
        return view('admin.OrderManagement.archivedOrders', compact('orders'));
    }

    public function restore($id)
    {
        $order = Order::where('id', $id)->restore();

        return redirect()->back();
    }

    public function viewTrash($id)
    {
        return Order::where('id', $id)->first()
        ->load('purchases', 'food');
    }

    
}
