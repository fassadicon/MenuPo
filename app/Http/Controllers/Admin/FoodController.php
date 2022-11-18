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

class FoodController extends Controller
{
    public function index(Request $request)
    {
        // Initialize DataTable Values
        $foods = Food::latest()->get()->load('admin');

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
        // $foodID = Menu::select('food_id')->where('id', $id)->value('food_id');
        // return Food::where('id', $foodID)->first()->load('admin');
        $food = Food::where('id', $id)->first()->load('admin');
        $admin = Admin::where('id', $food->updated_by)->get(['firstName', 'lastName']);
        $created_atFormatted = Carbon::parse($food->created_at)->format('M d, Y');
        $updated_atFormatted = Carbon::parse($food->updated_at)->format('M d, Y');
        $updatedByAdminName = $admin->value('firstName') . ' ' . $admin->value('lastName');
        return response()->json(['food' => $food, 'created_atFormatted' => $created_atFormatted, 'updated_atFormatted' => $updated_atFormatted, 'updatedByAdminName' => $updatedByAdminName]);
        // return Food::where('id', $id)->first()->load('admin');
    }

    // public function foods(Request $request) {
    //     $info = [
    //         "draw" => $request->draw,
    //         "data" => [],
    //         "total" =>0,
    //     ];
    // }
    // Show Create Form
    public function create()
    {
        return view('admin.FoodManagement.createFood');
    }

    // Create Food Item
    public function store(Request $request)
    {
        $formFields = $request->validate([
            //  'name' => ['required', Rule::unique('foods', 'name')],

            'name' => 'required',
            // viewVariableName => ['required OR etc.', Rule::unique(tableName, columnName), format e.g. 'email']
            // 'email' => ['required', 'email']
            'description' => 'nullable',
            'type' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'servingSize' => 'nullable',
            'calcKcal' => 'nullable',
            'calcTotFat' => 'nullable',
            'calcSatFat' => 'nullable',
            'calcSugar' => 'nullable',
            'calcSodium' => 'nullable',
            'grade' => 'nullable',
        ]);

        // 'image' => ''
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('admin/foods', 'public');
        }

        $formFields['created_by'] = auth()->id();

        Food::create($formFields);

        // Session::flash('message', 'messageBody');
        // return redirect('/admin/foods')->with('message', 'Food created successfully!');
        return redirect('/admin/foods');
    }

    // Show Update Form
    public function edit(Food $food)
    {
        return view('admin.FoodManagement.editFood', ['food' => $food]);
    }

    // Update Food Item
    public function update(Request $request, Food $food)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'type' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'servingSize' => 'nullable',
            'calcKcal' => 'nullable',
            'calcTotFat' => 'nullable',
            'calcSatFat' => 'nullable',
            'calcSugar' => 'nullable',
            'calcSodium' => 'nullable',
            'grade' => 'nullable',
            'philfct_id' => 'nullable',
        ]);

        $formFields['updated_by'] = Admin::where('user_id', auth()->id())->get(['id'])->value('id');
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('admin/foods', 'public');
        }
        $food->update($formFields);

        // Session::flash('message', 'messageBody');
        // return redirect('/admin/foods');
        return redirect('/admin/foods');
        // return back()->with('message', 'Listing updated successfully!');
    }
}
