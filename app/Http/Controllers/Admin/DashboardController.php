<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Purchase;
use App\Models\Adminnotif;
use App\Models\Menuplanner;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        $adminNotifs = Adminnotif::get();

        $ordersCompletedToday = Purchase::whereDate('updated_at', Carbon::today())->count();

        $pendingPreOrdersToday = Purchase::whereDate('created_at', Carbon::yesterday())
            ->where('claimStatus', 0)
            ->where('type', 0)
            ->whereHas('payment', function ($query) {
                $query->where('paymentStatus', 'unpaid');
            })->count();

        $foodItemsInMenuToday = Menu::where(function ($query) {
            $query->where('status', 1)
                ->whereDate('displayed_at', Carbon::today()->format('Y-m-d'))
                ->whereDate('removed_at', '>', Carbon::today()->format('Y-m-d'))
                ->whereHas('food', function ($query) {
                    $query->where('stock', '>', 0)->whereBetween('type', [3, 4]);
                });
        })
            ->orWhere(function ($query) {
                $query->where('status', 0)
                    ->whereNull('displayed_at')
                    ->whereNull('removed_at')
                    ->whereHas('food', function ($query) {
                        $query->where('stock', '>', 0)->whereBetween('type', [3, 4]);
                    });
            })
            ->count();

        $salesToday = Purchase::whereDate('updated_at', Carbon::today())->sum('totalAmount');
        return view('admin.dashboard', compact('adminNotifs', 'ordersCompletedToday', 'pendingPreOrdersToday', 'foodItemsInMenuToday', 'salesToday'));
    }
}
