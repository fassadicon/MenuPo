<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Adminnotif;
use App\Models\Menuplanner;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuplannerController extends Controller
{
    public function index()
    {

        $adminNotifs = Adminnotif::get();
        // $now = Carbon::now();

        // $start = $now->startOfWeek(CarbonInterface::MONDAY);

        // $end = $now->endOfWeek(CarbonInterface::SUNDAY);

        // $weekStartDate = $now->startOfWeek();
        // $weekEndDate = $now->copy()->endOfWeek();
        // $test = array();
        // $test[0] = $weekStartDate->format('Y-m-d');
        // for ($i = 1; $i < 5; $i++) {
        //     $test[$i] = $weekStartDate->addDay()->format('Y-m-d');
        // }

        // $Mondays = Menuplanner::whereDate('menuDate', $test[0])->first()->load('admin', 'admin_updated');
        // $Tuesdays = Menuplanner::whereDate('menuDate', $test[1])->first()->load('admin', 'admin_updated');
        // $Wednesdays = Menuplanner::whereDate('menuDate', $test[2])->first()->load('admin', 'admin_updated');
        // $Thursdays = Menuplanner::whereDate('menuDate', $test[3])->first()->load('admin', 'admin_updated');
        // $Fridays = Menuplanner::whereDate('menuDate', $test[4])->first()->load('admin', 'admin_updated');

        // return view(
        //     'admin.FoodManagement.menuplan',
        //     compact('Mondays', 'Tuesdays', 'adminNotifs', 'Wednesdays', 'Thursdays', 'Fridays')
        // );

        $events = array();
        $menuplanners = Menuplanner::all();
        foreach ($menuplanners as $menuplan) {
            $events[] = [
                'id' => $menuplan->id,
                'title' => $menuplan->foodName,
                'start' => $menuplan->start_date,
                'end' => $menuplan->end_date
            ];
        }


        return view(
            'admin.FoodManagement.menuplan',
            [
                'adminNotifs' => $adminNotifs,
                'events' => $events
            ]
        );
    }

    public function store(Request $request)
    {
        // $Mondays = Menuplanner::where('id', $request->ids[0])->update(['items' => $request->foodLists[0]]);
        // $Tuesdays = Menuplanner::where('id', $request->ids[1])->update(['items' => $request->foodLists[1]]);
        // $Wednesdays = Menuplanner::where('id', $request->ids[2])->update(['items' => $request->foodLists[2]]);
        // $Thursdays = Menuplanner::where('id', $request->ids[3])->update(['items' => $request->foodLists[3]]);
        // $Fridays = Menuplanner::where('id', $request->ids[4])->update(['items' => $request->foodLists[4]]);

        // return $request->ids;


        $request->validate([
            'title' => 'required|string'
        ]);


        $test = Menuplanner::create([
            'foodName' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return response()->json($test);
    }

    public function update(Request $request, $id)
    {
        $menuplan = Menuplanner::find($id);
        if (!$menuplan) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $menuplan->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
    }

    public function updateDuration(Request $request, $id)
    {
        $menuplan = Menuplanner::find($id);
        if (!$menuplan) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $menuplan->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
    }

    public function destroy($id)
    {
        $menuplan = Menuplanner::find($id);
        if (!$menuplan) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $menuplan->delete();
        return $id;
    }

    // public function export()
    // {
    //     $students = Student::all();
    //     $viewhtml = View::make('admin.Reports.printQR', ['students' => $students])->render();

    //     // instantiate and use the dompdf class
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml($viewhtml);

    //     // (Optional) Setup the paper size and orientation
    //     $dompdf->setPaper('A4', 'landscape');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the generated PDF to Browser
    //     $dompdf->stream('Student QRs');
    //     return view('admin.Reports.printQR', compact('students'));
    // }
}
