<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\Admin;
use App\Models\Student;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreStudentRequest;
use App\Http\Requests\Admin\UpdateStudentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\DataTables as DataTables;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::get()->load('guardian');
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

                    // $btn = '<a href="{{url("admin/foods/'.$row->id.'/restore")}}" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewFoodImg"><i class="bi bi-card-image"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewQR"><i class="bi bi-qr-code"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewImage"><i class="bi bi-card-image"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewStudentDetails"><i class="bi bi-info-lg"></i></a>';
                    // $btn = $btn . ' <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-info-lg"></i></button>';

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
        return view('admin.UserManagement.student', compact('students'));
    }

    public function view($id)
    {
        $student = Student::where('id', $id)->first()->load('guardian');
        $student['created_at_formatted'] = Carbon::parse($student->created_at)->format('M d, Y');
        $student['updated_at_formatted'] = Carbon::parse($student->updated_at)->format('M d, Y');
        $student['updated_by_name'] = Admin::where('id', $student->updated_by)->first();
        $student['created_by_name'] = Admin::where('id', $student->created_by)->first();
        return response()->json($student);
    }

    // Show Create Form
    public function create()
    {
        return view('admin.UserManagement.createStudent');
    }

    public function store(StoreStudentRequest $request)
    {
        $student = $request->safe()->merge([
            'status' => 1,
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ])->except(['parent']);
        $student['BMI'] = round($request->weight / pow($request->height / 100, 2), 2);
        if ($request->hasFile('image'))
            $student['image'] = $request->file('image')->store('admin/students', 'public');
        $parentName = $request->parent;
        $student['parent_id'] = substr($parentName, strpos($parentName, ":") + 1);
        $studentID = Student::latest()->get(['id'])->value('id') + 1;
        $test = QrCode::size(300)->errorCorrection('H')->format('png')->merge('storage/admin/MenuPoLogoQR.png', .3, true)
            ->generate($studentID);
        $student['QR'] = 'admin/qrs/' . $studentID . '.png';
        Storage::disk('public')->put($student['QR'], $test);
        Student::create($student);
        return redirect('admin/students');
    }

    public function edit(Student $student)
    {
        return view('admin.UserManagement.editStudent', ['student' => $student]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $studentCredentials = $request->safe()->merge([
            'status' => 1,
            'updated_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ])->except(['parent']);
        $studentCredentials['BMI'] = round($request->weight / pow($request->height / 100, 2), 2);
        if ($request->hasFile('image'))
            $studentCredentials['image'] = $request->file('image')->store('admin/students', 'public');
        $parentName = $request->parent;
        $studentCredentials['parent_id'] = substr($parentName, strpos($parentName, ":") + 1);
        $student->update($studentCredentials);
        return redirect('/admin/students');
    }

    public function delete($id)
    {
        $student = Student::where('id', $id)->first();

        $student->delete();

        return redirect()->back();
    }

    public function trash (Request $request)
    {
        $students = Student::onlyTrashed()
        ->get()
        ->load('guardian');
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

                    // $btn = '<a href="{{url("admin/foods/'.$row->id.'/restore")}}" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewFoodImg"><i class="bi bi-card-image"></i></a>';
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewQR"><i class="bi bi-qr-code"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewImage"><i class="bi bi-card-image"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewStudentDetails"><i class="bi bi-info-lg"></i></a>';
                    // $btn = $btn . ' <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-info-lg"></i></button>';

                    // $btn = $btn . ' <a href="/admin/students/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>';

                    $btn = $btn . ' <a href="/admin/students/' . $row->id . '/restore" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Restore" class="restoreStudent btn btn-success btn-sm"><i class="bi bi-arrow-clockwise"></i></a>';
                    return $btn;
                })
                // ->addColumn('checkbox',
                // '<input type="checkbox" name="users_checkbox[]" class="users_checkbox" value="{{$id}}"/>')
                // ->rawColumns(['checkbox', 'action'])
                ->rawColumns(['action'])
                ->make(true);
        }

        // Return View
        return view('admin.UserManagement.studentTrash', compact('students'));
    }

    public function restore($id)
    {
        $student = Student::where('id', $id)->restore();

        return redirect()->back();
    }
}
