<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;

use App\Models\Admin;
use App\Models\Guardian;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTables;

class GuardianController extends Controller
{
    public function index(Request $request)
    {
        $guardians = Guardian::with('adminUpdated', 'admin', 'students', 'user')->get();

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
        $guardian = Guardian::where('id', $id)->first()->load('students', 'user', 'admin', 'adminUpdated');
        $admin = Admin::where('id', $guardian->updated_by)->get(['firstName', 'lastName']);
        $created_atFormatted = Carbon::parse($guardian->created_at)->format('M d, Y');
        $updated_atFormatted = Carbon::parse($guardian->updated_at)->format('M d, Y');
        $updatedByAdminName = $admin->value('firstName') . ' ' . $admin->value('lastName');
        return response()->json(['guardian' => $guardian, 'created_atFormatted' => $created_atFormatted, 'updated_atFormatted' => $updated_atFormatted, 'updatedByAdminName' => $updatedByAdminName]);
    }

    // Show Create Form
    public function create()
    {
        return view('admin.UserManagement.createGuardian');
    }

    // Create parent User
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'recoveryEmail' => 'nullable|string|email|max:255|unique:users',
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'sex' => 'required|max:1',
            'birthDate' => 'required|date',
            'image' => 'nullable|image|max:2000'
        ]);
        if ($validator->fails()) {
            return redirect('admin/admins/create')->withInput()->withErrors($validator);
        }
        $parent = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'address' => $request->address,
            'suffix' => $request->suffix,
            'sex' => $request->sex,
            'birthDate' => $request->birthDate,
            'status' => 1,
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ];
        if ($request->hasFile('image')) {
            $parent['image'] = $request->file('image')->store('admin/admins', 'public');
        }
        $password = Str::random(8);
        $userCredentials = [
            'email' => $request->email,
            'recoveryEmail' => $request->recoveryEmail,
            'password' => Hash::make($password),
            'role' => 1
        ];
        $user = User::create($userCredentials);
        $parent['user_id'] = $user->id;
        Guardian::create($parent);
        return redirect('/admin/guardians');
    }

    public function edit(Guardian $guardian)
    {
        return view('admin.UserManagement.editGuardian', ['guardian' => $guardian]);
    }

    public function update(Request $request, Guardian $guardian)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'sex' => 'required|max:1',
            'birthDate' => 'required|date',
            'image' => 'nullable|image|max:2000'
        ]);
        if ($validator->fails()) {
            return redirect('admin/admins/' . $guardian->id . '/edit')->withInput()->withErrors($validator);
        }
        $guardian->firstName = $request->firstName;
        $guardian->lastName = $request->lastName;
        $guardian->middleName = $request->middleName;
        $guardian->address = $request->address;
        $guardian->suffix = $request->suffix;
        $guardian->sex = $request->sex;
        $guardian->birthDate = $request->birthDate;
        $guardian->updated_by = Admin::where('user_id', auth()->id())->get(['id'])->value('id');
        if ($request->hasFile('image')) {
            $guardian->image = $request->file('image')->store('admin/admins', 'public');
        }
        $guardian->save();
        return redirect('/admin/guardians');
    }
}
