<?php

namespace App\Http\Controllers;

use Imagick;
use DataTables;
use Carbon\Carbon;
use App\Models\Food;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\Student;

// use Yajra\DataTables\DataTables as DataTables;
use App\Models\Guardian;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\SearchPane;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TestController extends Controller
{
    public function index()
    {
        $students = Student::all();
        foreach ($students as $student) {
            // GENERATE QR
            $test = QrCode::size(300)->errorCorrection('H')->format('png')->merge('storage/admin/MenuPoLogoQR.png', .3, true)->generate($student->id);
            $QRPath = 'admin/qrs/' . $student->id . '.png';
            Storage::disk('public')->put($QRPath, $test);

            // GENERATE TEXT IMAGE
            $text = ' ' . $student->firstName . ' ' . $student->middleName . ' ' . $student->lastName . ' ';
            $string = $text;
            $font = 5;
            $width  = 310;
            $height = 330;
            $im = @imagecreate($width, $height);
            $background_color = imagecolorallocate($im, 255, 255, 255); // white background
            $text_color = imagecolorallocate($im, 0, 0, 0); //black text
            imagestring($im, $font, 0, 0, $string, $text_color);
            ob_start();
            imagepng($im);
            $imstr = base64_encode(ob_get_clean());
            $saveImage = base64_decode($imstr);
            imagedestroy($im);
            Storage::disk('public')->put('admin/names/' . $student->id . '.png', $saveImage);

            // MERGED NAME AND QR
            // $image2 = public_path('storage/admin/qrs/' . $student->id . '.png');
            // $image1 = public_path('storage/admin/names/' . $student->id . '.png');
            $image2 = storage_path('app/public/admin/qrs/' . $student->id . '.png');
            $image1 = storage_path('app/public/admin/names/' . $student->id . '.png');
            $image1 = imagecreatefromstring(file_get_contents($image1));
            $image2 = imagecreatefromstring(file_get_contents($image2));
            imagecopymerge($image1, $image2, 5, 20, 0, 0, 300, 300, 100);
            ob_start();
            imagepng($image1);
            $imstr = base64_encode(ob_get_clean());
            $saveImage = base64_decode($imstr);
            imagedestroy($im);
            Storage::disk('public')->put('admin/merges/' . $student->id . $student->lastName . '.png', $saveImage);
        }




        // // MERGED IMAGE

        // $image2 = public_path('storage/admin/qrs/1.png');
        // $image1 = public_path('storage/admin/names/qwe.png');

        // // list($width, $height) = getimagesize($image2);

        // $image1 = imagecreatefromstring(file_get_contents($image1));
        // $image2 = imagecreatefromstring(file_get_contents($image2));

        // // imagealphablending($image2, false);
        // // imagesavealpha($image2, true);

        // imagecopymerge($image1, $image2, 5, 20, 0, 0, 300, 300, 100);
        // // header('Content-Type:image/png');
        // ob_start();
        // imagepng($image1);
        // $imstr = base64_encode(ob_get_clean());
        // $saveImage = base64_decode($imstr);
        // imagedestroy($im);
        // Storage::disk('public')->put('admin/merges/' . 'SADICON' . '.png', $saveImage);

        return view('admin.test');
        // return view('admin.test', array('data' => $imstr));
    }
}
