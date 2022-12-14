<x-admin.layout :notifs='$adminNotifs'>
<section class="survey-card">
    <div class="header-page">
    <p><i class="fab fa-nutritionix fa-xl"></i>Calorie Intake Report</p>
    </div>
    <hr class="mx-4 my-4">

    {{-- Kcal --}}
    <div class="row-top row">
        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Average Daily Kcal by Quarter</strong></h1>
            {!! $averageCalorieConsumptionChart->container() !!}
            <script src="{{ $averageCalorieConsumptionChart->cdn() }}"></script>
            {{ $averageCalorieConsumptionChart->script() }}
            </div>
        </div>

        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Kcal from Bought Canteen Foods to the Daily Recommended Kcal Intake of Students</strong>
            </h1>
            {!! $testPieChart->container() !!}
            <script src="{{ $testPieChart->cdn() }}"></script>
            {{ $testPieChart->script() }}
            </div>
        </div>
        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Kcal consumed by sex and age group</strong></h1>
            {!! $testRadialCjart->container() !!}
            <script src="{{ $testRadialCjart->cdn() }}"></script>
            {{ $testRadialCjart->script() }}
            </div>
        </div>

    </div>
    <div class="row-mid row">
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $avgCalorieM6to9Chart->container() !!}
            <script src="{{ $avgCalorieM6to9Chart->cdn() }}"></script>
            {{ $avgCalorieM6to9Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $kcalM6to9PieChart->container() !!}
            <script src="{{ $kcalM6to9PieChart->cdn() }}"></script>
            {{ $kcalM6to9PieChart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $avgCalorieF6to9Chart->container() !!}
            <script src="{{ $avgCalorieF6to9Chart->cdn() }}"></script>
            {{ $avgCalorieF6to9Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $kcalF6to9PieChart->container() !!}
            <script src="{{ $kcalF6to9PieChart->cdn() }}"></script>
            {{ $kcalF6to9PieChart->script() }}
            </div>
        </div>
    </div>
    <div class="row-bottom row">
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $avgCalorieM10to12Chart->container() !!}
            <script src="{{ $avgCalorieM10to12Chart->cdn() }}"></script>
            {{ $avgCalorieM10to12Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $kcalM10to12PieChart->container() !!}
            <script src="{{ $kcalM10to12PieChart->cdn() }}"></script>
            {{ $kcalM10to12PieChart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females 10 to 12</strong></h1>
            {!! $avgCalorieF10to12Chart->container() !!}
            <script src="{{ $avgCalorieF10to12Chart->cdn() }}"></script>
            {{ $avgCalorieF10to12Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 10 to 12</strong></h1>
            {!! $kcalF10to12PieChart->container() !!}
            <script src="{{ $kcalF10to12PieChart->cdn() }}"></script>
            {{ $kcalF10to12PieChart->script() }}
            </div>
        </div>
    </div>
    <hr class="mx-4 my-4">
    <br>

</section>
</x-admin.layout>
