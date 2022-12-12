<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Purchase;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class averageRecommendedNutrientConsumptionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function getPercentKcal(
        $age1,
        $age2,
        $sex,
        $date1,
        $date2,
        $dailyRecoKcal
    ) {
        $records = Purchase::whereHas('student', function ($query) use ($age1, $age2, $sex) {
            $query->where('sex',  $sex)->whereBetween('birthdate', [Carbon::now()->subYear($age2), Carbon::now()->subYear($age1)]);
        })->whereBetween('created_at', [$date1, $date2])->get();

        if ($records->count() == 0) {
            return 0;
        }

        $count = $records->count();
        $totalRecords = 0;
        $percentagesKcal = array();
        foreach ($records as $record) {
            $totalRecords += $record->totalKcal;
            $percentageConsumed = 100 - (($record->totalKcal / $dailyRecoKcal) * 100);
            array_push($percentagesKcal, $percentageConsumed);
        }
        return $totalRecords / $count;
    }

    public function initializeKcal(
        $date1,
        $date2,
    ) {
        $kcalM6to9 = $this->getPercentKcal(6, 9, 'M', $date1,  $date2, 1600);
        $kcalF6to9 = $this->getPercentKcal(6, 9, 'F', $date1,  $date2, 1470);
        $kcalM10to12 = $this->getPercentKcal(10, 12, 'M', $date1,  $date2, 2060);
        $kcalF10to12 = $this->getPercentKcal(10, 12, 'F', $date1,  $date2, 1980);
        $kcalM13to15 = $this->getPercentKcal(13, 15, 'M', $date1,  $date2, 2700);
        $kcalF13to15 = $this->getPercentKcal(13, 15, 'F', $date1,  $date2, 2170);

        $quarterAveKcal = ($kcalM6to9 + $kcalF6to9 + $kcalM10to12 + $kcalF10to12 +  $kcalM13to15 +  $kcalF13to15) / 6;

        return round($quarterAveKcal, 2);
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $quarterOneAveKcal = $this->initializeKcal('2022-11-17', '2022-11-19');
        $quarterTwoAveKcal = $this->initializeKcal('2022-11-20', '2022-11-22');
        $quarterThreeAveKcal = $this->initializeKcal('2022-11-23', '2022-11-25');
        $quarterFourAveKcal = $this->initializeKcal(Carbon::yesterday()->format('Y-m-d'), Carbon::today()->format('Y-m-d'));

        return $this->chart->barChart()
            ->setTitle('Average Percentage of Daily Recommended Nutrient Consumed from Bought Foods')
            ->addData('Calorie Consumed %', [
                $quarterOneAveKcal,
                $quarterTwoAveKcal,
                $quarterThreeAveKcal,
                $quarterFourAveKcal
            ])
            ->setXAxis(['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'])
            ->setToolBar(true);
    }
}
