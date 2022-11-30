<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HealthController extends Controller
{
    public function index(Student $anak){
        
        $ids = explode(',' , $anak->restriction);

        $restrict = array();

        $notifications = DB::select('SELECT * FROM notifications WHERE parent_id = ?', [1]);

        $purchase = DB::select('SELECT * FROM purchases WHERE parent_id = ? && student_id = ?', [1, $anak->id]);
        
        $student = DB::select('SELECT * FROM students WHERE parent_id = ?', [1]);
        
        // For average food grade
        $sample = Order::whereHas('purchase', function($q){
            $q->where('parent_id', '=', 1);
        })->with('food')->get();
        $average = 0;
        $ite = 0;
    
        foreach($sample as $sam){
            $average += $sam->food->grade;
            $ite += 1;
        }

        $average_grade = $average/$ite;
        $average_grade = number_format((float)$average_grade, 2, '.', '');

        foreach($ids as $id){
            $item = DB::select('select * from foods where id = ?', [$id]);
            array_push($restrict, $item);
        }

        $purchase_info = array();

        foreach($purchase as $purch){
            $item2 = DB::select('SELECT * FROM orders WHERE purchase_id = ?', [$purch->id]);
            array_push($purchase_info, $item2);
        }
        //dd($restrict);

        return view('user.health', [
            'students' => $student,
            'restricts' => $restrict,
            'notifications' => $notifications,
            'purchases' => $purchase,
            'anaks' => $anak,
            'purchase_info' => $purchase_info,
            'average_grade' => $average_grade
        ]);
    }

    public function removeRestrict(Request $request){
        
        $ids = $request->input('anak-id');
        $ids  = explode(',', $ids);

        $anak_id = $ids[0];
        $food_id = $ids[1].',';

        $restrict = Student::find($anak_id);

        $new = str_replace($food_id, '', $restrict->restriction);


        DB::update('UPDATE students SET restriction = ? WHERE id = ?', [$new, $anak_id]);
        
        return response()->json(['status' => 'Success']);
    }
}
