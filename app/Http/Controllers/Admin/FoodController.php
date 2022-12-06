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
use App\Http\Requests\Admin\StoreFoodRequest;
use App\Http\Requests\Admin\UpdateFoodRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTables;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        // Initialize DataTable Values
        $foods = Food::with('admin')->where('deleted_at', null)->get();
        foreach ($foods as $food) {
            $food['created_by_name'] = Admin::where('id', $food->created_by)->first();
            $food->updated_by == null ? $food['updated_by_name'] = 'N/A' : $food['updated_by_name'] = Admin::where('id', $food->updated_by)->first();
            $food['created_at_formatted'] = Carbon::parse($food->created_at)->format('M d, Y');
            $food['updated_at_formatted'] = Carbon::parse($food->updated_at)->format('M d, Y');
        }
        if ($request->ajax()) {
            return DataTables::of($foods)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    // $btn = '<a href="{{url("admin/foods/'.$row->id.'/restore")}}" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewFoodImg"><i class="bi bi-card-image"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewFoodImg"><i class="bi bi-card-image"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewFood"><i class="bi bi-info-lg"></i></a>';
                    // $btn = $btn . ' <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-info-lg"></i></button>';

                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>';

                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="archiveBtn btn btn-warning btn-sm"><i class="bi bi-archive"></i></a>';
                    return $btn;
                })
                // ->addColumn('checkbox',
                // '<input type="checkbox" name="users_checkbox[]" class="users_checkbox" value="{{$id}}"/>')
                // ->rawColumns(['checkbox', 'action'])
                ->addColumn('updated_by', function ($row) {
                    $adminName = Admin::where('id', $row->updated_by)->get(['firstName', 'lastName']);
                    return $adminName->value('firstName') . ' ' . $adminName->value('lastName');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Return View
        return view('admin.FoodManagement.index', compact('foods'));
    }

    public function view($id)
    {
        $food = Food::where('id', $id)->first();
        $food['created_at_formatted'] = Carbon::parse($food->created_at)->format('M d, Y');
        $food['updated_at_formatted'] = Carbon::parse($food->updated_at)->format('M d, Y');
        $food['updated_by_name'] = Admin::where('id', $food->updated_by)->first();
        $food['created_by_name'] = Admin::where('id', $food->created_by)->first();
        return response()->json($food);
    }

    // Show Create Form
    public function create()
    {
        return view('admin.FoodManagement.createFood');
    }

    // Create Food Item
    public function store(StoreFoodRequest $request)
    {
        $food = $request->safe()->merge(['created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')])->toArray();
        if ($request->hasFile('image'))
            $food['image'] = $request->file('image')->store('admin/foods', 'public');
        Food::create($food);
        return redirect('/admin/foods');
    }

    // Show Update Form
    public function edit(Food $food)
    {
        return view('admin.FoodManagement.editFood', ['food' => $food]);
    }

    // Update Food Item
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $foodCredentials = $request->safe()->merge(['updated_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')])->toArray();
        if ($request->hasFile('image'))
            $foodCredentials['image'] = $request->file('image')->store('admin/foods', 'public');
        $food->update($foodCredentials);
        return redirect('/admin/foods');
    }
}
