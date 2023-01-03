<?php

namespace App\Imports;

use App\Models\Bmi;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;

use App\Models\Guardian;

use Illuminate\Support\Str;

use App\Mail\ParentCredentialsMail;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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
        $passwordMake = Str::random(8);
        $userCredentials = ([
            'email' => $row[0],
            'recoveryEmail' => $row[1],
            'password' => Hash::make($passwordMake),
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

        Mail::to('bautistaervin7@gmail.com')->send(new ParentCredentialsMail($row[0], $passwordMake));

        $studentID = Student::latest()->get(['id'])->value('id') + 1;
        $QRcode = QrCode::size(300)->errorCorrection('H')->format('png')->merge('storage/admin/MenuPoLogoQR.png', .3, true)->generate($studentID);
        $QRPath = 'admin/qrs/' . $studentID . '.png';
        Storage::disk('public')->put($QRPath, $QRcode);

        // GENERATE TEXT NAME IMAGE
        $text = ' ' . $row[13] . ' ' . $row[15] . ' ' . $row[14] . ' ';
        $string = $text;
        $font = 5;
        $width  = 310;
        $height = 330;
        $im = @imagecreate($width, $height);
        $background_color = imagecolorallocate($im, 255, 255, 255); // white background
        $text_color = imagecolorallocate($im, 0, 0, 0);
        imagestring($im, $font, 0, 0, $string, $text_color);
        ob_start();
        imagepng($im);
        $imstr = base64_encode(ob_get_clean());
        $saveImage = base64_decode($imstr);
        imagedestroy($im);
        Storage::disk('public')->put('admin/names/' . $studentID . '.png', $saveImage);

        // MERGED NAME AND QR
        // $image2 = public_path('storage/admin/qrs/' . $studentID . '.png');
        // $image1 = public_path('storage/admin/names/' . $studentID . '.png');
        $image2 = storage_path('admin/qrs/' . $studentID . '.png');
        $image1 = storage_path('admin/names/' . $studentID . '.png');
        $image1 = imagecreatefromstring(file_get_contents($image1));
        $image2 = imagecreatefromstring(file_get_contents($image2));
        imagecopymerge($image1, $image2, 5, 20, 0, 0, 300, 300, 100);
        ob_start();
        imagepng($image1);
        $imstr = base64_encode(ob_get_clean());
        $saveImage = base64_decode($imstr);
        imagedestroy($im);
        Storage::disk('public')->put('admin/merges/' . $studentID . $row[14] . '.png', $saveImage);

        $BMI = Bmi::create([
            'Q1Height' => $row[19],
            'Q1Weight' => $row[20],
            'Q1BMI' => round($row[20] / pow($row[19] / 100, 2), 2)
        ]);

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
            'bmi_id' => $BMI->id,
            'QR' => 'admin/merges/' . $studentID . $row[14] . '.png',
            'created_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id')
        ]);
    }
}
