<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\Bmi;
use App\Models\Admin;

use App\Models\Student;
use App\Models\Guardian;
use App\Models\Adminnotif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\DataTables as DataTables;
use App\Http\Requests\Admin\StoreStudentRequest;
use App\Http\Requests\Admin\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::get()->load('guardian', 'bmi');
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
        $adminNotifs = Adminnotif::get();
        // Return View
        return view('admin.UserManagement.student', compact('students', 'adminNotifs'));
    }

    public function view($id)
    {
        $student = Student::where('id', $id)->first()->load('guardian', 'bmi');
        $student['created_at_formatted'] = Carbon::parse($student->created_at)->format('M d, Y');
        $student['updated_at_formatted'] = Carbon::parse($student->updated_at)->format('M d, Y');
        $student['updated_by_name'] = Admin::where('id', $student->updated_by)->first();
        $student['created_by_name'] = Admin::where('id', $student->created_by)->first();
        return response()->json($student);
    }

    // Show Create Form
    public function create()
    {
        $adminNotifs = Adminnotif::get();
        return view('admin.UserManagement.createStudent', compact('adminNotifs'));
    }

    public function store(StoreStudentRequest $request)
    {
        $BMI = Bmi::create([
            'Q1Height' => $request->height,
            'Q1Weight' => $request->weight,
            'Q1BMI' => round($request->weight / pow($request->height / 100, 2), 2)
        ]);
        $student = $request->safe()->merge([
            'status' => 1,
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ])->except(['parent', 'weight', 'height']);
        $student['bmi_id'] = $BMI->id;
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
        Alert::success('Success', 'Account of ' . $request->firstName . ' ' . $request->lastName . ' Created Successfully');
        return redirect('admin/students');
    }

    public function edit(Student $student)
    {
        $adminNotifs = Adminnotif::get();
        return view('admin.UserManagement.editStudent', ['student' => $student, 'adminNotifs' => $adminNotifs]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        Bmi::where('id', $student->bmi_id)->update([
            'Q1Height' => $request->height,
            'Q1Weight' => $request->weight,
            'Q1BMI' => round($request->weight / pow($request->height / 100, 2), 2)
        ]);
        $studentCredentials = $request->safe()->merge([
            'status' => 1,
            'updated_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ])->except(['parent', 'weight', 'height']);
        if ($request->hasFile('image'))
            $studentCredentials['image'] = $request->file('image')->store('admin/students', 'public');
        $prevParentID = Student::where('id', (int)$student->id)->get(['parent_id'])->value('parent_id');
        $prevParent = Guardian::where('id', $prevParentID)->first();
        $prevParentName = $prevParent->firstName . ' ' . $prevParent->middleName . ' ' . $prevParent->lastName;
        $prevParentName == $request->parent ? $studentCredentials['parent_id'] = $prevParent->id : $studentCredentials['parent_id'] = substr($request->parent, strpos($request->parent, ":") + 1);
        $student->update($studentCredentials);
        Alert::success('Success', 'Account of ' . $student->firstName . ' ' . $student->lastName . ' Updated Successfully');
        return redirect('/admin/students');
    }

    public function delete($id)
    {
        $student = Student::where('id', $id)->first();
        $student->update(['status' => 0]);
        Alert::success('Success', $student->firstName . ' ' . $student->lastName . ' Archived');
        $student->delete();

        return redirect()->back();
    }

    public function trash(Request $request)
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
                    // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Image" class="imgBtn btn btn-primary btn-sm viewQR"><i class="bi bi-qr-code"></i></a>';
                    // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewImage"><i class="bi bi-card-image"></i></a>';
                    // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Data" class="data btn btn-info btn-sm viewStudentDetails"><i class="bi bi-info-lg"></i></a>';
                    // $btn = $btn . ' <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-info-lg"></i></button>';

                    // $btn = $btn . ' <a href="/admin/students/' . $row->id . '/edit" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a>';

                    $btn = ' <a href="/admin/students/' . $row->id . '/restore" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Restore" class="restoreStudent btn btn-success btn-sm"><i class="bi bi-arrow-clockwise"></i></a>';
                    return $btn;
                })
                // ->addColumn('checkbox',
                // '<input type="checkbox" name="users_checkbox[]" class="users_checkbox" value="{{$id}}"/>')
                // ->rawColumns(['checkbox', 'action'])
                ->rawColumns(['action'])
                ->make(true);
        }
        $adminNotifs = Adminnotif::get();
        // Return View
        return view('admin.UserManagement.studentTrash', compact('students', 'adminNotifs'));
    }

    public function restore($id)
    {
        $student = Student::where('id', $id)->restore();
        $student = Admin::where('id', $id)->first();
        $student->update(['status' => 1]);
        Alert::success('Success', $student->firstName . ' ' . $student->lastName . ' Restored');
        return redirect()->back();
    }
}
