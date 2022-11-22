<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\Admin;
use App\Models\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\DataTables as DataTables;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::get()->load('guardian', 'admin');

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

                    $btn = $btn . ' <a href="/admin/foods/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-warning btn-sm"><i class="bi bi-archive"></i></a>';
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

    public function view($id) {
        $student = Student::where('id', $id)->first()->load('admin', 'guardian');
        $admin = Admin::where('id', $student->updated_by)->get(['firstName', 'lastName']);
        $created_atFormatted = Carbon::parse($student->created_at)->format('M d, Y');
        $updated_atFormatted = Carbon::parse($student->updated_at)->format('M d, Y');
        $updatedByAdminName = $admin->value('firstName') . ' ' . $admin->value('lastName');
        return response()->json(['student' => $student, 'created_atFormatted' => $created_atFormatted, 'updated_atFormatted' => $updated_atFormatted, 'updatedByAdminName' => $updatedByAdminName]);
    }

    // Show Create Form
    public function create()
    {
        return view('admin.UserManagement.createStudent');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $student = [
            'LRN' => $request->LRN,
            'grade' => $request->grade,
            'section' => $request->section,
            'adviser' => $request->adviser,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'suffix' => $request->suffix,
            'sex' => $request->sex,
            'birthDate' => $request->birthDate,
            'status' => 1,
            'height' => $request->height,
            'weight' => $request->weight,
            'BMI' => $request->BMI,
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ];
        $parentName = $request->parent;
        $student['parent_id'] = substr($parentName, strpos($parentName, ":") + 1);
        if ($request->hasFile('image')) {
            $student['image'] = $request->file('image')->store('admin/students', 'public');
        }
        $studentID = Student::latest()->get(['id'])->value('id') + 1;
        $test = QrCode::size(300)->errorCorrection('H')
            ->format('png')
            ->merge('storage/admin/MenuPoLogoQR.png', .3, true)
            ->generate($studentID);
        $student['QR'] = 'admin/qrs/' . $studentID . '.png';
        Storage::disk('public')->put($student['QR'], $test);
        Student::create($student);
        return redirect('admin/students');
    }

    public function edit(Student $student) {
        return view('admin.UserManagement.editStudent', ['student' => $student]);
    }

    public function update(Request $request, Student $student) {
        $formFields = $request->validate([
            'LRN' => 'required',
            'grade' => 'required',
            'section' => 'required',
            'adviser' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'middleName' => 'nullable',
            'suffix' => 'nullable',
            'sex' => 'required',
            'birthDate' => 'required',
            'middleName' => 'required',
            'height' => 'nullable',
            'weight' => 'nullable',
            'BMI' => 'nullable'
        ]);
        $parentName = $request->parent;
        if (preg_match('~[0-9]+~', $parentName)) {
            $formFields['parent_id'] = substr($parentName, strpos($parentName, ":") + 1);
        }
        $formFields['updated_by'] = Admin::where('user_id', auth()->id())->get(['id'])->value('id');
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('admin/foods', 'public');
        }
        $student->update($formFields);

        return redirect('/admin/students');

    }
}
