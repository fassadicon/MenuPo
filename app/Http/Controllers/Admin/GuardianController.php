<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;

use App\Models\Guardian;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTables;

class GuardianController extends Controller
{
    public function index(Request $request)
    {
        $guardians = User::with(['guardian', 'guardian.students', 'guardian.admin'])->where('role', 0)->get();

        if ($request->ajax()) {
            return DataTables::of($guardians)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    // $btn = '<a href="{{url("admin/foods/'.$row->id.'/restore")}}" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewFoodImg"><i class="bi bi-card-image"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewFoodImg"><i class="bi bi-card-image"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewFood"><i class="bi bi-info-lg"></i></a>';
                    // $btn = $btn . ' <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-info-lg"></i></button>';

                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>';

                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-warning btn-sm"><i class="bi bi-archive"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Return View
        return view('admin.UserManagement.parent', compact('guardians'));
    }

    // Show Create Form
    public function create()
    {
        return view('admin.UserManagement.createGuardian');
    }

    // Create parent User
    public function store(Request $request)
    {
        // Create User
        $user = [
            'email' => $request->email,
            'recoveryEmail' => $request->recoveryEmail,
            'password' => $request->password
        ];
        User::create($user);
        // Get Latest User Row to Match the Latest Parent Row
        $user_id = User::latest()->get(['id'])->value('id');
        // Created by
        $adminUser = auth()->id();
        $created_by = Admin::where('user_id', $adminUser)->get(['id'])->value('id');
        // Create Parent
        $parent = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'address' => $request->address,
            'suffix' => $request->suffix,
            'sex' => $request->sex,
            'birthDate' => $request->birthDate,
            'status' => 1,
            'user_id' => $user_id,
            'created_by' => $created_by
        ];
        Guardian::create($parent);

        return redirect('/admin/guardians');
    }
}
