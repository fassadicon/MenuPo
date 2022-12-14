<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Survey;
use App\Models\Adminnotif;

use Illuminate\Http\Request;
use App\Charts\CanteenRatingChart;
use App\Http\Controllers\Controller;

use App\Charts\ParentFoodSuggestionChart;
use Yajra\DataTables\DataTables as DataTables;

class SurveyReportController extends Controller
{
    public function index(ParentFoodSuggestionChart $suggestionChart, CanteenRatingChart $ratingChart)
    {
        $average = Survey::avg('rating');

        $surveys = Survey::selectRaw('suggestions, COUNT(*) as count')
            ->groupBy('suggestions')
            ->having('count', '>', 1)
            ->orderBy('count', 'desc')
            ->get()->toArray();
        $labels = array();
        foreach ($surveys as $survey) {
            array_push($labels, $survey['suggestions']);
        }
        $mostSuggested = array();
        for ($i = 0; $i < 5; $i++) {
            $mostSuggested[$i] = $labels[$i];
        }
        $adminNotifs = Adminnotif::get();
        return view('admin.Reports.survey', ['suggestionChart' => $suggestionChart->build(), 'ratingChart' => $ratingChart->build(), 'averageRating' => $average, 'mostSuggestedFoods' => $mostSuggested, 'adminNotifs' => $adminNotifs]);
    }

    public function surveyTable(Request $request)
    {
        // Initialize DataTable Values
        $surveys = Survey::all();
        foreach ($surveys as $survey) {
            $survey['created_at_formatted'] = Carbon::parse($survey->created_at)->format('M d, Y');
        }
        if ($request->ajax()) {
            return DataTables::of($surveys)
                ->make(true);
        }
        
        // Return View
        return view('admin.Reports.survey', compact('surveys'));
    }
}
