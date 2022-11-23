<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\User;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables as DataTables;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admins = User::with('admin')->where('role', 1)->get();

        if ($request->ajax()) {
            return DataTables::of($admins)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewFoodImg"><i class="bi bi-card-image"></i></a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewFood"><i class="bi bi-info-lg"></i></a>';

                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>';

                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-warning btn-sm"><i class="bi bi-archive"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Return View
        return view('admin.UserManagement.admin', compact('admins'));
    }

    public function view($id) {
        $admin = Admin::where('user_id', $id)->first()->load('admin', 'user');
        $adminUpdatedBy = Admin::where('id', $admin->updated_by)->get(['firstName', 'lastName']);
        $created_atFormatted = Carbon::parse($admin->created_at)->format('M d, Y');
        $updated_atFormatted = Carbon::parse($admin->updated_at)->format('M d, Y');
        $updatedByAdminName = $adminUpdatedBy->value('firstName') . ' ' . $adminUpdatedBy->value('lastName');
        return response()->json(['admin' => $admin, 'created_atFormatted' => $created_atFormatted, 'updated_atFormatted' => $updated_atFormatted, 'updatedByAdminName' => $updatedByAdminName]);
    }

    // Show Create Form
    public function create()
    {
        return view('admin.UserManagement.createAdmin');
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
        $admin = [
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
        if ($request->hasFile('image')) {
            $admin['image'] = $request->file('image')->store('admin/admins', 'public');
        }
        Admin::create($admin);

        return redirect('/admin/admins');
    }

    public function edit(Admin $admin) {
        return view('admin.UserManagement.editAdmin', ['admin' => $admin]);
    }

    public function update(Request $request, Admin $admin) {
        $formFields = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => 'nullable',
            'suffix' => 'nullable',
            'sex' => 'required',
            'birthDate' => 'required',
            'address' => 'nullable',
        ]);
        $formFields['updated_by'] = Admin::where('user_id', auth()->id())->get(['id'])->value('id');
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('admin/admins', 'public');
        }
        $admin->update($formFields);

        return redirect('/admin/admins');

    }
}
