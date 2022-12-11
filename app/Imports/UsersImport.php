<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Guardian;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return new User([
        //     'email' => $row[0],
        //     'recoveryEmail' => $row[1],
        //     'password' => $row[2],
        //     'role' => 0
        // ]);
        $userCredentials = ([
            'email' => $row[0],
            'recoveryEmail' => $row[1],
            'password' => Hash::make(Str::random(8)),
            'role' => 0
        ]);
        $user = User::create($userCredentials);

        $guardian = Guardian::create([
            'firstName' => $row[2],
            'lastName' => $row[3],
            'middleName' => $row[4],
            'suffix' => $row[5],
            'sex' => $row[6],
            'address' => $row[7],
            'birthDate' => $row[8],
            'status' => 1,
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id'),
            'user_id' => $user->id
        ]);

        $studentID = Student::latest()->get(['id'])->value('id') + 1;
        $QRcode = QrCode::size(300)->errorCorrection('H')->format('png')->merge('storage/admin/MenuPoLogoQR.png', .3, true)->generate($studentID);
        Storage::disk('public')->put('admin/qrs/' . $studentID . '.png', $QRcode);

        // $student = new Student([
        //     'parent_id' => $guardian->id,
        //     'LRN' => $row[9],
        //     'grade' => $row[10],
        //     'section' => $row[11],
        //     'adviser' => $row[12],
        //     'firstName' => $row[13],
        //     'lastName' => $row[14],
        //     'middleName' => $row[15],
        //     'suffix' => $row[16],
        //     'sex' => $row[17],
        //     'birthDate' => $row[18],
        //     'status' => 1,
        //     'height' => $row[19],
        //     'weight' => $row[20],
        //     'BMI' => $row[21],
        //     'QR' => 'admin/qrs/' . $studentID . '.png',
        //     'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        // ]);

        return new Student([
            'parent_id' => $guardian->id,
            'LRN' => $row[9],
            'grade' => $row[10],
            'section' => $row[11],
            'adviser' => $row[12],
            'firstName' => $row[13],
            'lastName' => $row[14],
            'middleName' => $row[15],
            'suffix' => $row[16],
            'sex' => $row[17],
            'birthDate' => $row[18],
            'status' => 1,
            'height' => $row[19],
            'weight' => $row[20],
            'BMI' => $row[21],
            'QR' => 'admin/qrs/' . $studentID . '.png',
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ]);
    }

    // public function rules(): array
    // {
    //     return [
    //         // 'parent_id' =>  'required|numeric|max:10|unique:parents,id',
    //         'LRN' => 'required|numeric',
    //         'grade' => 'required|numeric|max:6',
    //         'section' => 'required|string|max:255',
    //         'adviser' => 'required|string|max:255',
    //         'firstName' => 'required|string|max:255',
    //         'lastName' => 'required|string|max:255',
    //         'middleName' => 'nullable|string|max:255',
    //         'suffix' => 'nullable|string|max:255',
    //         'sex' => 'required|max:1',
    //         'birthDate' => 'required|date',
    //         'height' => 'nullable|numeric',
    //         'weight' => 'nullable|numeric',
    //     ];
    // }
}
