<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;

use App\Models\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CreatAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTables;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Get Admin Accounts
        $admins = Admin::with('user')->get();
        foreach ($admins as $admin) {
            $admin['created_by_name'] = Admin::where('id', $admin->created_by)->first();
            $admin->updated_by == null ? $admin['updated_by_name'] = 'N/A' : $admin['updated_by_name'] = Admin::where('id', $admin->updated_by)->first();
            $admin['created_at_formatted'] = Carbon::parse($admin->created_at)->format('M d, Y');
            $admin['updated_at_formatted'] = Carbon::parse($admin->updated_at)->format('M d, Y');
        }
        // Return Data Tables
        if ($request->ajax()) {
            return DataTables::of($admins)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // View Image Button
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewImage"><i class="bi bi-card-image"></i></a>';
                    // View Detailed Information Button
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewAdminDetails"><i class="bi bi-info-lg"></i></a>';
                    // Edit Information Button
                    $btn = $btn . ' <a href="/admin/admins/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>';
                    // Archive Account Button
                    $btn = $btn . ' <a href="/admin/admins/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-warning btn-sm"><i class="bi bi-archive"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.UserManagement.admin', compact('admins'));
    }

    public function view($id)
    {
        $admin = Admin::where('id', $id)->first()->load('user');
        $admin['created_at_formatted'] = Carbon::parse($admin->created_at)->format('M d, Y');
        $admin['updated_at_formatted'] = Carbon::parse($admin->updated_at)->format('M d, Y');
        $admin['updated_by_name'] = Admin::where('id', $admin->updated_by)->first();
        $admin['created_by_name'] = Admin::where('id', $admin->created_by)->first();
        return response()->json($admin);
    }

    // Show Create Form
    public function create()
    {
        return view('admin.UserManagement.createAdmin');
    }

    // Create Admin User
    public function store(CreatAdminRequest $request)
    {
        $admin = $request->safe()->except([
            'email',
            'recoveryEmail'
        ]);
        $admin['status'] = 1;
        $admin['created_by'] = Admin::where('user_id', auth()->id())->get(['id'])->value('id');
        if ($request->hasFile('image')) {
            $admin['image'] = $request->file('image')->store('admin/admins', 'public');
        }
        $userCredentials = $request->safe()->only([
            'email',
            'recoveryEmail'
        ]);
        $userCredentials['password'] = Hash::make(Str::random(8));
        $userCredentials['role'] = 1;
        $user = User::create($userCredentials);
        $admin['user_id'] = $user->id;
        Admin::create($admin);
        return redirect('/admin/admins');
    }

    public function edit(Admin $admin)
    {
        return view('admin.UserManagement.editAdmin', ['admin' => $admin]);
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $adminCredentials = $request->safe()->except([
            'email',
            'recoveryEmail'
        ]);
        $adminCredentials['updated_by'] = Admin::where('user_id', auth()->id())->get(['id'])->value('id');
        if ($request->hasFile('image')) {
            $adminCredentials['image'] = $request->file('image')->store('admin/admins', 'public');
        }
        $userCredentials = $request->safe()->only([
            'email',
            'recoveryEmail'
        ]);
        $user = User::where('id', $admin->user_id);
        $user->update($userCredentials);
        $admin->update($adminCredentials);
        return redirect('/admin/admins');
    }
}
