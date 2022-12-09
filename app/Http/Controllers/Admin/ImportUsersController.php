<?php

namespace App\Http\Controllers\Admin;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ImportUsersController extends Controller
{
    public function index () {
        return view('admin.UserManagement.importUsers');
    }

    public function import(Request $request) {
        Excel::import(new UsersImport, $request->file);
        return redirect('admin/guardians');
    }
}
