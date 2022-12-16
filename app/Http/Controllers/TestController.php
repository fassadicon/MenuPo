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
       for ($i = 36; $i < 101; $i++) {
        $test = QrCode::size(300)->errorCorrection('H')->format('png')->merge('storage/admin/MenuPoLogoQR.png', .3, true)
        ->generate($i);
        $fileName = 'admin/qrs/' . $i . '.png';
        Storage::disk('public')->put($fileName, $test);
       }
        
        return view('admin.test');
    }

    // if (totalPoints <= 0) {
    //     color = 'gray';
    // } else if (totalPoints <= 6) {
    //     color = 'green';
    // } else if (totalPoints <= 9) {
    //     color = 'amber';
    // } else if (totalPoints <= 12) {
    //     color = 'red';
    // } else {
    //     color = null;
    // }

    public function getData()
    {
        $labels = ['Green', 'Amber', 'Red'];
        $greens = Food::where('grade', '>', 0)->where('grade', '<=', 6);
        $greensCount = $greens->count();
        $ambers = Food::where('grade', '>', 6)->where('grade', '<=', 9);
        $ambersCount = $ambers->count();
        $reds = Food::where('grade', '>', 9)->where('grade', '<=', 12);
        $redsCount = $reds->count();
        $data = [];
        $data[0] = $greensCount;
        $data[1] = $ambersCount;
        $data[2] = $redsCount;

        return response()->json(['labels' => $labels, 'data' => $data]);
    }

    public function dt(Request $request)
    {
        // Initialize DataTable Values
        $purchases = Purchase::with('student', 'parent', 'orders.food')->select('purchases.*');
        // Purchase::where('student_id', (int)$id)->first()->load('student', 'parent', 'orders.food');
        if ($request->ajax()) {
            return DataTables::eloquent($purchases)
                ->addIndexColumn()
                // ->addColumn('Parent', function ($purchase) {
                //     return $purchase->parent->name;
                // })
                ->addColumn('students', '{{$student_id}}')
                ->skipTotalRecords()
                ->toJson();
        }

        // Return View
        return view('admin.FoodManagement.dt', compact('purchases'));
    }

    public function suggest(Request $request)
    {
        $greens = Food::where('grade', '<=', 6.00)
            ->inRandomOrder()->limit(3)->get();
        $ambers = Food::where('grade', '<=', 9.00)
            ->where('grade', '>', 6.00)
            ->inRandomOrder()->limit(2)->get();
        $reds = Food::where('grade', '<=', 12.00)
            ->where('grade', '>', 9.00)
            ->inRandomOrder()->limit(2)->get();
        $grays = Food::where('grade', NULL)
            ->inRandomOrder()->limit(1)->get();

        return view('admin.reco', compact('ambers', 'greens', 'reds', 'grays'));
    }

    public function try(Request $request)
    {
        $greens = Food::where('grade', '<=', 6.00)
            ->inRandomOrder()->limit(3)->get();
        $ambers = Food::where('grade', '<=', 9.00)
            ->where('grade', '>', 6.00)
            ->inRandomOrder()->limit(2)->get();
        $reds = Food::where('grade', '<=', 12.00)
            ->where('grade', '>', 9.00)
            ->inRandomOrder()->limit(2)->get();
        $grays = Food::where('grade', NULL)
            ->inRandomOrder()->limit(1)->get();

        // return response('/reco', compact('ambers', 'greens', 'reds', 'grays'));
        return response()->json(['ambers' => $ambers, 'greens' => $greens, 'reds' => $reds, 'grays' => $grays]);
    }
}
