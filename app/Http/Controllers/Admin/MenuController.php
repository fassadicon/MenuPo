<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Food;

use App\Models\Menu;

use App\Models\Admin;
use App\Models\Foodlog;
use App\Models\Purchase;

use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables as DataTables;

class MenuController extends Controller
{
    public function cookedMeals(Request $request)
    {

        // Initialize DataTable Values
        $cookedMeals = Menu::with('food')
            // WHERE (`STATUS` = 'Temporary' and DATE(`expiring_at`) >= 'TODAY') or (`STATUS` = 'Default' and `expiring_at` IS NULL)
            ->where(function ($query) {
                $query->where('status', 1)
                    ->whereDate('displayed_at', Carbon::today()->format('Y-m-d'))
                    ->whereDate('removed_at', '>', Carbon::today()->format('Y-m-d'))
                    ->whereHas('food', function ($query) {
                        $query->where('type', 3)->where('stock', '>', 0);
                    });
            })
            ->orWhere(function ($query) {
                $query->where('status', 0)
                    ->whereNull('displayed_at')
                    ->whereNull('removed_at')
                    ->whereHas('food', function ($query) {
                        $query->where('type', 3)->where('stock', '>', 0);
                    });
            })
            // WHERE `menus`.`food_id` = `foods`.`id` and `TYPE` like '%Cooked Meal%') and
            // get distinct food id 
            ->orderBy('id', 'DESC')
            // ->groupBy('food_id')
            ->latest()
            ->get()
            ->unique('food_id');

        if ($request->ajax()) {
            return DataTables::of($cookedMeals)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Update Stock Quantity
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Update Menu Item" data-id="' . $row->id . '" data-original-title="updateMenuItemDetailsBtn" class="btn btn-info btn-sm" id="editMenuItemDetailsDTBtn"><i class="bi bi-pencil-square"></i></a>';
                    // Remove from the Menu
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" title="Remove from Menu" data-id="' . $row->id . '" data-original-title="Delete" class="removeMenuItemBtn delete btn btn-danger btn-sm"><i class="bi bi-dash-circle"></i></a>';
                    return $btn;
                })
                ->addColumn('count', function ($row) {
                    $menuID = $row->food->id;
                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($menuID) {
                            $query->where('food_id', 'like', $menuID);
                        })->count();
                    return $test;
                })
                ->addColumn('prevStock', function ($row) {
                    $foodID = $row->food->id;

                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($foodID) {
                            $query->where('food_id', 'like', $foodID);
                        })->count();

                    $currentStock = Food::where('id', $foodID)
                        ->get(['stock'])->value('stock');

                    $prevStock = $currentStock + $test;
                    return $prevStock;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();
        return view('admin.FoodManagement.menu', compact('cookedMeals', 'adminNotifs'));
    }

    public function snacks(Request $request)
    {

        // Initialize DataTable Values
        $snacks = Menu::with('food')
            // WHERE (`STATUS` = 'Temporary' and DATE(`expiring_at`) >= 'TODAY') or (`STATUS` = 'Default' and `expiring_at` IS NULL)
            ->where(function ($query) {
                $query->where('status', 1)
                    ->whereDate('displayed_at', Carbon::today()->format('Y-m-d'))
                    ->whereDate('removed_at', '>', Carbon::today()->format('Y-m-d'))
                    ->whereHas('food', function ($query) {
                        $query->where('type', 2)->where('stock', '>', 0);
                    });
            })
            ->orWhere(function ($query) {
                $query->where('status', 0)
                    ->whereNull('displayed_at')
                    ->whereNull('removed_at')
                    ->whereHas('food', function ($query) {
                        $query->where('type', 2)->where('stock', '>', 0);
                    });
            })
            // WHERE `menus`.`food_id` = `foods`.`id` and `TYPE` like '%Cooked Meal%') and
            // get distinct food id 
            ->orderBy('id', 'DESC')
            // ->groupBy('food_id')
            ->latest()
            ->get()
            ->unique('food_id');

        if ($request->ajax()) {
            return DataTables::of($snacks)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Update Stock Quantity
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="updateMenuItemDetailsBtn" class="btn btn-info btn-sm" id="editMenuItemDetailsDTBtn"><i class="bi bi-pencil-square"></i></a>';
                    // Remove from the Menu
                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="removeMenuItemBtn delete btn btn-danger btn-sm"><i class="bi bi-dash-circle"></i></a>';
                    return $btn;
                })
                ->addColumn('count', function ($row) {
                    $menuID = $row->food->id;
                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($menuID) {
                            $query->where('food_id', 'like', $menuID);
                        })->count();
                    return $test;
                })
                ->addColumn('prevStock', function ($row) {
                    $foodID = $row->food->id;

                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($foodID) {
                            $query->where('food_id', 'like', $foodID);
                        })->count();

                    $currentStock = Food::where('id', $foodID)
                        ->get(['stock'])->value('stock');

                    $prevStock = $currentStock + $test;
                    return $prevStock;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();
        return view('admin.FoodManagement.menu', compact('snacks', 'adminNotifs'));
    }

    public function beverages(Request $request)
    {

        // Initialize DataTable Values
        $beverages = Menu::with('food')
            // WHERE (`STATUS` = 'Temporary' and DATE(`expiring_at`) >= 'TODAY') or (`STATUS` = 'Default' and `expiring_at` IS NULL)
            ->where(function ($query) {
                $query->where('status', 1)
                    ->whereDate('displayed_at', Carbon::today()->format('Y-m-d'))
                    ->whereDate('removed_at', '>', Carbon::today()->format('Y-m-d'))
                    ->whereHas('food', function ($query) {
                        $query->where('type', 1)->where('stock', '>', 0);
                    });
            })
            ->orWhere(function ($query) {
                $query->where('status', 0)
                    ->whereNull('displayed_at')
                    ->whereNull('removed_at')
                    ->whereHas('food', function ($query) {
                        $query->where('type', 1)->where('stock', '>', 0);
                    });
            })
            // WHERE `menus`.`food_id` = `foods`.`id` and `TYPE` like '%Cooked Meal%') and
            // get distinct food id 
            ->orderBy('id', 'DESC')
            // ->groupBy('food_id')
            ->latest()
            ->get()
            ->unique('food_id');

        if ($request->ajax()) {
            return DataTables::of($beverages)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Update Stock Quantity
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="updateMenuItemDetailsBtn" class="btn btn-info btn-sm" id="editMenuItemDetailsDTBtn"><i class="bi bi-pencil-square"></i></a>';
                    // Remove from the Menu
                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="removeMenuItemBtn delete btn btn-danger btn-sm"><i class="bi bi-dash-circle"></i></a>';
                    return $btn;
                })
                ->addColumn('count', function ($row) {
                    $menuID = $row->food->id;
                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($menuID) {
                            $query->where('food_id', 'like', $menuID);
                        })->count();
                    return $test;
                })
                ->addColumn('prevStock', function ($row) {
                    $foodID = $row->food->id;

                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($foodID) {
                            $query->where('food_id', 'like', $foodID);
                        })->count();

                    $currentStock = Food::where('id', $foodID)
                        ->get(['stock'])->value('stock');

                    $prevStock = $currentStock + $test;
                    return $prevStock;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();
        return view('admin.FoodManagement.menu', compact('beverages', 'adminNotifs'));
    }

    public function pastas(Request $request)
    {

        // Initialize DataTable Values
        $pastas = Menu::with('food')
            // WHERE (`STATUS` = 'Temporary' and DATE(`expiring_at`) >= 'TODAY') or (`STATUS` = 'Default' and `expiring_at` IS NULL)
            ->where(function ($query) {
                $query->where('status', 1)
                    ->whereDate('displayed_at', Carbon::today()->format('Y-m-d'))
                    ->whereDate('removed_at', '>', Carbon::today()->format('Y-m-d'))
                    ->whereHas('food', function ($query) {
                        $query->where('type', 4)->where('stock', '>', 0);
                    });
            })
            ->orWhere(function ($query) {
                $query->where('status', 0)
                    ->whereNull('displayed_at')
                    ->whereNull('removed_at')
                    ->whereHas('food', function ($query) {
                        $query->where('type', 4)->where('stock', '>', 0);
                    });
            })
            // WHERE `menus`.`food_id` = `foods`.`id` and `TYPE` like '%Cooked Meal%') and
            // get distinct food id 
            ->orderBy('id', 'DESC')
            // ->groupBy('food_id')
            ->latest()
            ->get()
            ->unique('food_id');

        if ($request->ajax()) {
            return DataTables::of($pastas)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Update Stock Quantity
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="updateMenuItemDetailsBtn" class="btn btn-info btn-sm" id="editMenuItemDetailsDTBtn"><i class="bi bi-pencil-square"></i></a>';
                    // Remove from the Menu
                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="removeMenuItemBtn delete btn btn-danger btn-sm"><i class="bi bi-dash-circle"></i></a>';
                    return $btn;
                })
                ->addColumn('count', function ($row) {
                    $menuID = $row->food->id;
                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($menuID) {
                            $query->where('food_id', 'like', $menuID);
                        })->count();
                    return $test;
                })
                ->addColumn('prevStock', function ($row) {
                    $foodID = $row->food->id;

                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($foodID) {
                            $query->where('food_id', 'like', $foodID);
                        })->count();

                    $currentStock = Food::where('id', $foodID)
                        ->get(['stock'])->value('stock');

                    $prevStock = $currentStock + $test;
                    return $prevStock;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();
        return view('admin.FoodManagement.menu', compact('pastas', 'adminNotifs'));
    }

    public function others(Request $request)
    {

        // Initialize DataTable Values
        $others = Menu::with('food')
            // WHERE (`STATUS` = 'Temporary' and DATE(`expiring_at`) >= 'TODAY') or (`STATUS` = 'Default' and `expiring_at` IS NULL)
            ->where(function ($query) {
                $query->where('status', 1)
                    ->whereDate('displayed_at', Carbon::today()->format('Y-m-d'))
                    ->whereDate('removed_at', '>', Carbon::today()->format('Y-m-d'))
                    ->whereHas('food', function ($query) {
                        $query->where('type', 0)->where('stock', '>', 0);
                    });
            })
            ->orWhere(function ($query) {
                $query->where('status', 0)
                    ->whereNull('displayed_at')
                    ->whereNull('removed_at')
                    ->whereHas('food', function ($query) {
                        $query->where('type', 0)->where('stock', '>', 0);
                    });
            })
            // WHERE `menus`.`food_id` = `foods`.`id` and `TYPE` like '%Cooked Meal%') and
            // get distinct food id 
            ->orderBy('id', 'DESC')
            // ->groupBy('food_id')
            ->latest()
            ->get()
            ->unique('food_id');

        if ($request->ajax()) {
            return DataTables::of($others)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Update Stock Quantity
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="updateMenuItemDetailsBtn" class="btn btn-info btn-sm" id="editMenuItemDetailsDTBtn"><i class="bi bi-pencil-square"></i></a>';
                    // Remove from the Menu
                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="removeMenuItemBtn delete btn btn-danger btn-sm"><i class="bi bi-dash-circle"></i></a>';
                    return $btn;
                })
                ->addColumn('count', function ($row) {
                    $menuID = $row->food->id;
                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($menuID) {
                            $query->where('food_id', 'like', $menuID);
                        })->count();
                    return $test;
                })
                ->addColumn('prevStock', function ($row) {
                    $foodID = $row->food->id;

                    $test = Purchase::with('order')
                        ->whereHas('payment', function ($query) {
                            $query->where('paymentStatus', 'paid');
                        })
                        ->whereHas('order', function ($query) use ($foodID) {
                            $query->where('food_id', 'like', $foodID);
                        })->count();

                    $currentStock = Food::where('id', $foodID)
                        ->get(['stock'])->value('stock');

                    $prevStock = $currentStock + $test;
                    return $prevStock;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();
        return view('admin.FoodManagement.menu', compact('others', 'adminNotifs'));
    }

    // Add Menu Item
    public function addMenuItem(Request $request)
    {
        $foodID = Food::where('name', 'like', $request->name)->get(['id'])->value('id');
        $user_id = auth()->id();
        $created_by = Admin::where('user_id', $user_id)->get(['id'])->value('id');
        $addedStock = $request->addedStock;

        if ($addedStock != NULL && $addedStock > 0) {
            $prevStock = Food::where('id', $foodID)->get(['stock'])->value('stock');
            $newAddedStock = $prevStock + $addedStock;
            Food::where('id', $foodID)->update(['stock' => $newAddedStock]);
        }

        $menuItem = new Menu();
        $menuItem->food_id = $foodID;
        $menuItem->status = $request->menuStatus;
        $menuItem->displayed_at = $request->displayed_at;
        $menuItem->removed_at = $request->removed_at;
        $menuItem->created_by = $created_by;
        $menuItem->save();

        return response()->json($menuItem);
    }

    public function updateMenuItem(Request $request)
    {
        $foodID = Menu::where('id', $request->id)->get(['food_id'])->value('food_id');
        $menuItem = Menu::where('id', $request->id)->first();
        if ($request->status == 1) {
            if ($request->displayed_at != NULL && $request->removed_at == NULL) {
                $menuItem->displayed_at = $request->displayed_at;
            } else if ($request->displayed_at == NULL && $request->removed_at != NULL) {
                $menuItem->removed_at = $request->removed_at;
            } else if ($request->displayed_at != NULL && $request->removed_at != NULL) {
                $menuItem->displayed_at = $request->displayed_at;
                $menuItem->removed_at = $request->removed_at;
            }
        }

        $foodID = Menu::where('id', $request->id)->get(['food_id'])->value('food_id');
        $addedStock = $request->addedStock;
        $prevStock = Food::where('id', $foodID)->get(['stock'])->value('stock');
        
        if ($addedStock == '') {
            $addedStock = 0;
            $newAddedStock = $prevStock;
        }

        if ($addedStock != NULL && $addedStock > 0) {

            $newAddedStock = $prevStock + $addedStock;
            Food::where('id', $foodID)->update(['stock' => $newAddedStock]);
            activity('Menu')
                ->performedOn(Menu::where('id', $request->id)->firstOrFail())
                ->causedBy(Admin::where('user_id', auth()->user())->get(['id'])->value('id'))
                ->withProperties([
                    'attributes' => ['addedStock' => $addedStock, 'stock' => $newAddedStock], 'old' => ['prevStock' => $prevStock]
                ])
                ->log('added stock in ' . Food::where('id', $foodID)->get(['name'])->value('name'));
        }

        Foodlog::create([
            'food_id' => $foodID,
            'description' => 'added stock',
            'start' => $prevStock,
            'add' => $addedStock,
            'end' => $newAddedStock,
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ]);
        $menuItem->status = $request->status;
        $menuItem->save();
        return $menuItem;
        // return $request->displayed_at;
    }

    public function getCurrentStock($foodName)
    {
        return Food::where('name', 'like', $foodName)->get(['stock'])->value('stock');
    }


    // Show Update Form
    public function editFoodDetails($id)
    {
        $foodID = Menu::select('food_id')->where('id', $id)->value('food_id');
        $food = Food::where('id', $foodID)->first();
        return view('admin.FoodManagement.editFood', ['food' => $food]);
    }

    public function preview($id)
    {
        $foodID = Menu::select('food_id')->where('id', $id)->value('food_id');
        return Food::where('id', $foodID)->first();
    }

    public function updateMenuItemStock(Request $request)
    {
        if ($request->additionalStock != null || $request->additionalStock > 0) {
            $prevStock = Food::where('name', $request->name)->get(['stock'])->value('stock');
            $newStock = $prevStock + $request->additionalStock;
            $foodID = Food::where('name', $request->name)->get(['id'])->value('id');
            $test = Food::where('name', $request->name)->update(['stock' => $newStock]);
        } else {
            $test = "Invalid Additional Stock";
        }
        Foodlog::create([
            'food_id' => $foodID,
            'description' => 'added stock',
            'start' => $prevStock,
            'add' => $request->additionalStock,
            'end' => $newStock,
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ]);

        return $newStock;
    }

    public function updateMenuDateRange(Request $request)
    {
        $menuItem = Menu::find($request->id);
        $menuItem->displayed_at = $request->newDisplayedAt;
        $menuItem->removed_at = $request->newRemovedAt;
        $menuItem->save();
        return $menuItem;
    }

    public function getMenuItemDetails($id)
    {
        return Menu::where('id', $id)->first()->load('food');
    }

    public function removeMenuItem($id)
    {
        $menu = Menu::find($id)->delete();
        if ($menu) {
            Alert::success('Successfully Deleted!');
            return true;
        }
    }
}
