<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Purchase;
use App\Models\Adminnotif;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


// Use Yajra Datatable
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTables;

class PurchasesController extends Controller
{
    public function index(Request $request)
    {
        // Initialize Datatable Values
        // $todayDate = Carbon::now();

        $purchases = Purchase::where('created_at', Carbon::yesterday())
            ->where('claimStatus', 0)
            ->wherehas('payment', function ($query) {
                $query->where('paymentStatus', 'paid');
            })
            ->where('type', 0)
            ->get()
            ->load('orders', 'orders.food', 'parent', 'student', 'admin');


        if ($request->ajax()) {
            return DataTables::of($purchases)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    // $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewPending"><i class="bi bi-info-lg"></i></a>';

                    // // $btn = $btn . ' <a href="/admin/orders/pendings/' . $row->id . '/confirm" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Confirm" class="confirmBtn btn btn-success btn-sm"><i class="bi bi-check-circle"></i></a>';

                    // // $btn = $btn . ' <a href="/admin/pendings/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="fas fa-check-circle"></i></a>';

                    // // $btn = $btn. '<a href="/admin/pendings/update' data-id="' . $row->id . '" data-toggle="toggle" data-orginal-title="Data" class="toggle-class" type="checkbox"  '" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive" {{$purchase->paymentStatus ? 'checked' : ''}}>';
                    //  return $btn;
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
        return view('admin.OrderManagement.pendings', compact('purchases', 'adminNotifs'));
    }

    public function viewPending($id)
    {
        return Purchase::where('id', $id)->first()
            ->load('orders', 'parent', 'student', 'admin');
    }

    public function confirm($id)
    {
        Purchase::where('id', $id)
            ->update(['paymentStatus' => 1]);

        return redirect('/admin/orders/paymentConfirmationTable');
    }

    public function completedOrders(Request $request)
    {
        // Initialize Datatable Values

        $purchases = Purchase::where('claimStatus', 1)
            ->latest('updated_at')
            ->get()
            ->load('orders', 'orders.food', 'parent', 'student', 'admin', 'payment');

        foreach ($purchases as $purchase) {
            $purchase['served_by_name'] = Admin::where('id', $purchase->served_by)->first();
            $purchase['created_at_formatted'] = Carbon::parse($purchase->created_at)->format('M d, Y');
            $purchase['updated_at_formatted'] = Carbon::parse($purchase->updated_at)->format('M d, Y');
        }

        if ($request->ajax()) {
            return DataTables::of($purchases)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewCompleted"><i class="bi bi-info-lg"></i></a>';

                    $btn = $btn . ' <a href="/admin/orders/completed/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="archiveBtn btn btn-warning btn-sm"><i class="bi bi-archive"></i></a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();

        return view('admin.OrderManagement.completed', compact('purchases', 'adminNotifs'));
    }



    public function viewCompleted($id)
    {
        $purchase = Purchase::where('id', $id)->first()
            ->load('orders', 'parent', 'student', 'admin');
        $purchase['served_by_name'] = Admin::where('id', $purchase->served_by)->first();
        $purchase['created_at_formatted'] = Carbon::parse($purchase->created_at)->format('M d, Y');
        $purchase['updated_at_formatted'] = Carbon::parse($purchase->updated_at)->format('M d, Y');
        return $purchase;
    }



    public function delete($id)
    {
        $purchase = Purchase::where('id', $id)->first();
        $purchase->delete();
        return redirect()->back();
    }

    public function trash(Request $request)
    {
        $purchases = Purchase::onlyTrashed()->get()
            ->load('orders', 'orders.food', 'parent', 'student', 'admin', 'payment');
        foreach ($purchases as $purchase) {
            $purchase['served_by_name'] = Admin::where('id', $purchase->served_by)->first();
            $purchase['created_at_formatted'] = Carbon::parse($purchase->created_at)->format('M d, Y');
            $purchase['updated_at_formatted'] = Carbon::parse($purchase->updated_at)->format('M d, Y');
        }

        if ($request->ajax()) {
            return DataTables::of($purchases)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    //  $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewTrash"><i class="bi bi-info-lg"></i></a>';

                    $btn = ' <a href="/admin/orders/completed/' . $row->id . '/restore" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Restore" class="restoreBtn btn btn-success btn-sm"><i class="bi bi-arrow-clockwise"></i></a>';

                    // $btn = $btn. '<a href="/admin/pendings/update' data-id="' . $row->id . '" data-toggle="toggle" data-orginal-title="Data" class="toggle-class" type="checkbox"  '" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive" {{$purchase->paymentStatus ? 'checked' : ''}}>';
                    return $btn;
                })


                ->rawColumns(['action'])
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();
        // return view
        return view('admin.OrderManagement.archivedPurchases', compact('purchases', 'adminNotifs'));
    }

    public function restore($id)
    {
        $purchase = Purchase::where('id', $id)->restore();

        return redirect()->back();
    }

    // public function viewTrash($id)
    // {
    //     return Purchase::onlyTrashed('id', $id)->first()
    //     ->load('orders', 'parent', 'student', 'admin');
    // }


}
