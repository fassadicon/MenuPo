<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;

use App\Models\Admin;
use App\Models\Guardian;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreParentRequest;
use App\Http\Requests\Admin\UpdateParentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTables;

class GuardianController extends Controller
{
    public function index(Request $request)
    {
        $guardians = Guardian::with('students', 'user')->get();
        foreach ($guardians as $guardian) {
            $guardian['created_by_name'] = Admin::where('id', $guardian->created_by)->first();
            $guardian['updated_by_name'] = $guardian->updated_by == null ? 'N/A' : Admin::where('id', $guardian->updated_by)->first();
            $guardian['created_at_formatted'] = Carbon::parse($guardian->created_at)->format('M d, Y');
            $guardian['updated_at_formatted'] = Carbon::parse($guardian->updated_at)->format('M d, Y');
        }
        if ($request->ajax()) {
            return DataTables::of($guardians)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    // $btn = '<a href="{{url("admin/foods/'.$row->id.'/restore")}}" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewFoodImg"><i class="bi bi-card-image"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewImage"><i class="bi bi-card-image"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewParentDetails"><i class="bi bi-info-lg"></i></a>';
                    // $btn = $btn . ' <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-info-lg"></i></button>';

                    $btn = $btn . ' <a href="/admin/guardians/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>';

                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-warning btn-sm"><i class="bi bi-archive"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Return View
        return view('admin.UserManagement.parent', compact('guardians'));
    }

    public function view($id)
    {
        $guardian = Guardian::where('id', $id)->first()->load('students', 'user');
        $guardian['created_at_formatted'] = Carbon::parse($guardian->created_at)->format('M d, Y');
        $guardian['updated_at_formatted'] = Carbon::parse($guardian->updated_at)->format('M d, Y');
        $guardian['updated_by_name'] = Admin::where('id', $guardian->updated_by)->first();
        $guardian['created_by_name'] = Admin::where('id', $guardian->created_by)->first();
        return response()->json($guardian);
    }

    // Show Create Form
    public function create()
    {
        return view('admin.UserManagement.createGuardian');
    }

    // Create parent User
    public function store(StoreParentRequest $request)
    {
        $guardian = $request->safe()->except([
            'email', 
            'recoveryEmail'
        ]);
        $guardian['status'] = 1;
        $guardian['created_by'] = Admin::where('user_id', auth()->id())->get(['id'])->value('id');
        if ($request->hasFile('image')) {
            $guardian['image'] = $request->file('image')->store('admin/parents', 'public');
        }
        $userCredentials = $request->safe()->only([
            'email', 
            'recoveryEmail'
        ]);
        $userCredentials['password'] = Hash::make(Str::random(8));
        $userCredentials['role'] = 1;
        $user = User::create($userCredentials);
        $guardian['user_id'] = $user->id;
        Guardian::create($guardian);
        return redirect('/admin/guardians');
    }

    public function edit(Guardian $guardian)
    {
        return view('admin.UserManagement.editGuardian', ['guardian' => $guardian]);
    }

    public function update(UpdateParentRequest $request, Guardian $guardian)
    {
        $parentCredentials = $request->safe()->except([
            'email', 
            'recoveryEmail'
        ]);
        $parentCredentials['updated_by'] = Admin::where('user_id', auth()->id())->get(['id'])->value('id');
        if ($request->hasFile('image')) {
            $parentCredentials['image'] = $request->file('image')->store('admin/parents', 'public');
        }
        $userCredentials = $request->safe()->only([
            'email', 
            'recoveryEmail'
        ]);
        $user = User::where('id', $guardian->user_id);
        $user->update($userCredentials);
        $guardian->update($parentCredentials);
        return redirect('/admin/guardians');
    }
}
