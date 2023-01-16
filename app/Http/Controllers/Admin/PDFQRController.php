<?php

namespace App\Http\Controllers\Admin;

use Dompdf\Dompdf;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PDFQRController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $viewhtml = View::make('admin.Reports.printQR', ['students' => $students])->render();

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($viewhtml);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Student QRs');
        return view('admin.Reports.printQR', compact('students'));
    }
}
