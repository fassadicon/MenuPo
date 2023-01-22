<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bmi;
use App\Models\Student;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenerateReportController extends Controller
{
    public function indiv(Request $request)
    {
        $findSection = $request->fullName;
        $avgKcal = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('fullName', $findSection);
        })->avg('totalKcal'), 2);
        $avgTotFat = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('fullName', $findSection);
        })->avg('totalTotFat'), 2);
        $avgSatFat = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('fullName', $findSection);
        })->avg('totalSatFat'), 2);
        $avgSugar = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('fullName', $findSection);
        })->avg('totalSugar'), 2);
        $avgSodium = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('fullName', $findSection);
        })->avg('totalSodium'), 2);


        $BMIstatus = 0;

        $Q1BMI = Bmi::whereHas('student', function ($query) use ($findSection) {
            $query->where('section', $findSection);
        })->get(['Q1BMI'])->value('Q1BMI');

        if ($Q1BMI < 18.5) {
            $BMIstatus = 'Underweight';
        } else if ($Q1BMI >= 18.5 && $Q1BMI < 25) {
            $BMIstatus = 'Normal weight';
        } else if ($Q1BMI >= 25 && $Q1BMI < 29.9) {
            $BMIstatus = 'Overweight';
        } else if ($Q1BMI >= 30) {
            $BMIstatus = 'Obese';
        }

        $caloriesConsumed = round((Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('fullName', $findSection);
        })->avg('totalKcal') * 100) / 1778, 1);
        $caloriesConsumedLeft = 100 - $caloriesConsumed;
        
        return response()->json([
            'avgKcal' => $avgKcal,
            'avgTotFat' => $avgTotFat,
            'avgSatFat' => $avgSatFat,
            'avgSugar' => $avgSugar,
            'avgSodium' => $avgSodium,
            'BMIstatus' => $BMIstatus,
            'caloriesConsumed' => $caloriesConsumed,
            'caloriesConsumedLeft' => $caloriesConsumedLeft
        ]);
    }

    public function section(Request $request)
    {
        $findSection = $request->section;
        $avgKcal = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('section', $findSection);
        })->avg('totalKcal'), 2);
        $avgTotFat = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('section', $findSection);
        })->avg('totalTotFat'), 2);
        $avgSatFat = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('section', $findSection);
        })->avg('totalSatFat'), 2);
        $avgSugar = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('section', $findSection);
        })->avg('totalSugar'), 2);
        $avgSodium = round(Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('section', $findSection);
        })->avg('totalSodium'), 2);

        // return $avgSodium;

        $underweight = 0;
        $normal = 0;
        $overweight = 0;
        $obese = 0;

        $Q1BMIs = Bmi::whereHas('student', function ($query) use ($findSection) {
            $query->where('section', $findSection);
        })->get(['Q1BMI'])->toArray();
        foreach ($Q1BMIs as $BMI) {
            if ($BMI['Q1BMI'] < 18.5) {
                $underweight++;
            } else if ($BMI['Q1BMI'] >= 18.5 && $BMI['Q1BMI'] < 25) {
                $normal++;
            } else if ($BMI['Q1BMI'] >= 25 && $BMI['Q1BMI'] < 29.9) {
                $overweight++;
            } else if ($BMI['Q1BMI'] >= 30) {
                $obese++;
            }
        }

        $caloriesConsumed = round((Purchase::whereHas('student', function ($query) use ($findSection) {
            $query->where('section', $findSection);
        })->avg('totalKcal') * 100) / 1778, 1);
        $caloriesConsumedLeft = 100 - $caloriesConsumed;


        return response()->json([
            'avgKcal' => $avgKcal,
            'avgTotFat' => $avgTotFat,
            'avgSatFat' => $avgSatFat,
            'avgSugar' => $avgSugar,
            'avgSodium' => $avgSodium,
            'underweight' => $underweight,
            'normal' => $normal,
            'overweight' => $overweight,
            'obese' => $obese,
            'caloriesConsumed' => $caloriesConsumed,
            'caloriesConsumedLeft' => $caloriesConsumedLeft
        ]);
    }

    public function grade(Request $request)
    {
        $findGrade = $request->grade;
        $avgKcal = round(Purchase::whereHas('student', function ($query) use ($findGrade) {
            $query->where('grade', $findGrade);
        })->avg('totalKcal'), 2);
        $avgTotFat = round(Purchase::whereHas('student', function ($query) use ($findGrade) {
            $query->where('grade', $findGrade);
        })->avg('totalTotFat'), 2);
        $avgSatFat = round(Purchase::whereHas('student', function ($query) use ($findGrade) {
            $query->where('grade', $findGrade);
        })->avg('totalSatFat'), 2);
        $avgSugar = round(Purchase::whereHas('student', function ($query) use ($findGrade) {
            $query->where('grade', $findGrade);
        })->avg('totalSugar'), 2);
        $avgSodium = round(Purchase::whereHas('student', function ($query) use ($findGrade) {
            $query->where('grade', $findGrade);
        })->avg('totalSodium'), 2);

        // return $avgSodium;

        $underweight = 0;
        $normal = 0;
        $overweight = 0;
        $obese = 0;

        $Q1BMIs = Bmi::whereHas('student', function ($query) use ($findGrade) {
            $query->where('grade', $findGrade);
        })->get(['Q1BMI'])->toArray();
        foreach ($Q1BMIs as $BMI) {
            if ($BMI['Q1BMI'] < 18.5) {
                $underweight++;
            } else if ($BMI['Q1BMI'] >= 18.5 && $BMI['Q1BMI'] < 25) {
                $normal++;
            } else if ($BMI['Q1BMI'] >= 25 && $BMI['Q1BMI'] < 29.9) {
                $overweight++;
            } else if ($BMI['Q1BMI'] >= 30) {
                $obese++;
            }
        }

        $caloriesConsumed = round((Purchase::whereHas('student', function ($query) use ($findGrade) {
            $query->where('grade', $findGrade);
        })->avg('totalKcal') * 100) / 1778, 1);
        $caloriesConsumedLeft = 100 - $caloriesConsumed;

        return response()->json([
            'avgKcal' => $avgKcal,
            'avgTotFat' => $avgTotFat,
            'avgSatFat' => $avgSatFat,
            'avgSugar' => $avgSugar,
            'avgSodium' => $avgSodium,
            'underweight' => $underweight,
            'normal' => $normal,
            'overweight' => $overweight,
            'obese' => $obese,
            'caloriesConsumed' => $caloriesConsumed,
            'caloriesConsumedLeft' => $caloriesConsumedLeft
        ]);
    }
}
