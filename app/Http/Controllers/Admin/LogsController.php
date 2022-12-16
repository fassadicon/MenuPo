<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Bmi;
use App\Models\Food;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables as DataTables;

class LogsController extends Controller
{


    public function adminLogs(Request $request)
    {
        $logs = Activity::where('log_name', 'Admin')->get();
        // dd($logs[0]->properties['old']['firstName']);
        foreach ($logs as $log) {
            $log['model_id'] = $log->subject_id . ' - ' . Admin::where('id', $log->subject_id)->get(['firstName'])->value('firstName');
            $admin = Admin::where('user_id',  $log->causer->id)->first();
            $log['action_by'] = $admin->firstName . ' ' . $admin->lastName;
        }
        if ($request->ajax()) {
            return DataTables::of($logs)
                ->addIndexColumn()
                ->make(true);
        }


        $adminNotifs = Adminnotif::get();
        return view('admin.Logs.admin', compact('logs', 'adminNotifs'));
    }
    
    public function guardianLogs(Request $request)
    {
        $logs = Activity::where('log_name', 'Guardian')->get();
        foreach ($logs as $log) {
            $log['model_id'] = $log->subject_id . ' - ' . Guardian::where('id', $log->subject_id)->get(['firstName'])->value('firstName');
            $admin = Admin::where('user_id',  $log->causer->id)->first();
            $log['action_by'] = $admin->firstName . ' ' . $admin->lastName;
        }
        if ($request->ajax()) {
            return DataTables::of($logs)
                ->addIndexColumn()
                ->make(true);
        }

        $adminNotifs = Adminnotif::get();
        return view('admin.Logs.guardian', compact('logs', 'adminNotifs'));
    }

    public function studentLogs(Request $request)
    {
        $logs = Activity::where('log_name', 'Student')->get();
        foreach ($logs as $log) {
            $log['model_id'] = $log->subject_id . ' - ' . Student::where('id', $log->subject_id)->get(['firstName'])->value('firstName');
            $admin = Admin::where('user_id',  $log->causer->id)->first();
            $log['action_by'] = $admin->firstName . ' ' . $admin->lastName;
        }
        if ($request->ajax()) {
            return DataTables::of($logs)
                ->addIndexColumn()
                ->make(true);
        }

        $adminNotifs = Adminnotif::get();
        return view('admin.Logs.student', compact('logs', 'adminNotifs'));
    }

    public function foodLogs(Request $request)
    {
        $logs = Activity::where('log_name', 'Food')->get();
        foreach ($logs as $log) {
            $log['model_id'] = $log->subject_id . ' - ' . Food::where('id', $log->subject_id)->get(['name'])->value('name');
            $admin = Admin::where('user_id',  $log->causer->id)->first();
            $log['action_by'] = $admin->firstName . ' ' . $admin->lastName;
        }
        if ($request->ajax()) {
            return DataTables::of($logs)
                ->addIndexColumn()
                ->make(true);
        }

        $adminNotifs = Adminnotif::get();
        return view('admin.Logs.food', compact('logs', 'adminNotifs'));
    }

    public function BMILogs(Request $request)
    {
        $logs = Activity::where('log_name', 'BMI')->get();
        foreach ($logs as $log) {
            $log['model_id'] = $log->subject_id . ' - ' . Student::where('bmi_id', $log->subject_id)->get(['firstName'])->value('firstName');
            $admin = Admin::where('user_id',  $log->causer->id)->first();
            $log['action_by'] = $admin->firstName . ' ' . $admin->lastName;
        }
        if ($request->ajax()) {
            return DataTables::of($logs)
                ->addIndexColumn()
                ->make(true);
        }

        $adminNotifs = Adminnotif::get();
        return view('admin.Logs.bmi', compact('logs', 'adminNotifs'));
    }


    // public function foodItemsTable(Request $request) 
    // {
    //     $logs = Activity::where('log_name', 'Admin')->get();
    //     foreach($logs as $log) {
    //         $admin = Admin::where('user_id',  $log->causer->id)->first();
    //         $log['action_by'] = $admin->firstName . ' ' . $admin->lastName;
    //     }
    //     if ($request->ajax()) {
    //         return DataTables::of($logs)
    //             ->addIndexColumn() 
    //             ->make(true);
    //     }

    //     $adminNotifs = Adminnotif::get();
    //     return view('admin.OrderManagement.pendings', compact('logs', 'adminNotifs'));
    // }
}
