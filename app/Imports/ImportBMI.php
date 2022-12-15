<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Bmi;
use App\Models\Admin;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBMI implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        for ($i = 0; $i < 13; $i++) {
            if ($row[$i] == null) {
                $row[$i] = 0;
            }
        }

        if ($row[2] == 0 || $row[1] == 0) {
            $Q1BMI = 0;
        } else {
            $Q1BMI = round($row[2] / pow($row[1] / 100, 2), 2);
        }
        
        if ($row[5] == 0 || $row[4] == 0) {
            $Q2BMI = 0;
        } else {
            $Q2BMI = round($row[5] / pow($row[4] / 100, 2), 2);
        }
       
        if ($row[8] == 0 || $row[7] == 0) {
            $Q3BMI = 0;
        } else {
            $Q3BMI = round($row[8] / pow($row[7] / 100, 2), 2);
        }

        if ($row[11] == 0 || $row[10] == 0) {
            $Q4BMI = 0;
        } else {
            $Q4BMI = round($row[11] / pow($row[10] / 100, 2), 2);
        }

        $bmiUpdate = Bmi::whereHas('student', function ($query) use ($row) {
            $query->where('id', $row[0]);
        })->first();

        $bmiUpdate->update([
            'Q1Height' => $row[1],
            'Q1Weight' => $row[2],
            'Q1BMI' => $Q1BMI,
            'Q2Height' => $row[4],
            'Q2Weight' => $row[5],
            'Q2BMI' =>  $Q2BMI,
            'Q3Height' => $row[7],
            'Q3Weight' => $row[8],
            'Q3BMI' => $Q3BMI,
            'Q4Height' => $row[10],
            'Q4Weight' => $row[11],
            'Q4BMI' => $Q4BMI,
        ]);

        Student::where('id', $row[0])->update([
            'updated_by' => Admin::where('user_id', auth()->id())->get(['id'])->value('id'),
            'updated_at' => Carbon::now()
        ]);

        return $bmiUpdate;
    }
}
