<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Adminnotif;
use App\Imports\UsersImport;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Imports\AdminsImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables as DataTables;

class ImportUsersController extends Controller
{
    public function index () {
        $adminNotifs = Adminnotif::get();
        return view('admin.UserManagement.importUsers', compact('adminNotifs'));
    }

    public function import(Request $request) {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        Alert::success('Success', 'Parent and Student Accounts Imported');
        Excel::import(new UsersImport, $request->file);
        $adminNotifs = Adminnotif::get();
        return view('admin.UserManagement.importUsers', ['adminNotifs' => $adminNotifs]);
    }

    public function viewImportedGuardians(Request $request)
    {
        $guardians = Guardian::with('students', 'user')
        ->whereDate('created_at', Carbon::today())
        ->whereBetween('created_at', [Carbon::now()->subMinute(), Carbon::now()])
        ->get();
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
                    $btn =  ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewParentDetails"><i class="bi bi-info-lg"></i></a>';
                    $btn = $btn . ' <a href="/admin/guardians/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn . ' <a href="/admin/guardians/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-warning btn-sm"><i class="bi bi-archive"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Return View
        return view('admin.UserManagement.importUsers', compact('guardians'));
    }

    public function viewImportedStudents(Request $request)
    {
        $students = Student::whereDate('created_at', Carbon::today())
        ->whereBetween('created_at', [Carbon::now()->subMinute(), Carbon::now()])
        ->get()->load('guardian');
        foreach ($students as $student) {
            $student['created_by_name'] = Admin::where('id', $student->created_by)->first();
            $student['updated_by_name'] = $student->updated_by == null ? 'N/A' : Admin::where('id', $student->updated_by)->first();
            $student['created_at_formatted'] = Carbon::parse($student->created_at)->format('M d, Y');
            $student['updated_at_formatted'] = Carbon::parse($student->updated_at)->format('M d, Y');
        }
        if ($request->ajax()) {
            return DataTables::of($students)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewQR"><i class="bi bi-qr-code"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewStudentDetails"><i class="bi bi-info-lg"></i></a>';
                    $btn = $btn . ' <a href="/admin/students/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>';
                    $btn = $btn . ' <a href="/admin/students/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-warning btn-sm"><i class="bi bi-archive"></i></a>';
                    return $btn;
                })
                // ->addColumn('checkbox',
                // '<input type="checkbox" name="users_checkbox[]" class="users_checkbox" value="{{$id}}"/>')
                // ->rawColumns(['checkbox', 'action'])
                ->rawColumns(['action'])
                ->make(true);
        }

        // Return View
        return view('admin.UserManagement.importUsers', compact('students'));
    }

    public function indexAdmin () {
        $adminNotifs = Adminnotif::get();
        return view('admin.UserManagement.importAdmins', compact('adminNotifs'));
    }

    public function importAdmin(Request $request) {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        Alert::success('Success', 'Admin Accounts Imported');
        Excel::import(new AdminsImport, $request->file);
        $adminNotifs = Adminnotif::get();
        return view('admin.UserManagement.importAdmins', ['adminNotifs' => $adminNotifs]);
    }

    public function viewImportedAdmins(Request $request) 
    {
        // Get Admin Accounts
        $admins = Admin::with('user')
        ->whereDate('created_at', Carbon::today())
        ->whereBetween('created_at', [Carbon::now()->subSeconds(10), Carbon::now()])
        ->get();
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
        return view('admin.UserManagement.importUsers', compact('admins'));
    }
}
