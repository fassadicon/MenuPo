<x-admin.layout :notifs='$adminNotifs'>
<section class="survey-card">
    <div class="header-page">
        <p><i class="fab fa-nutritionix fa-xl"></i>Added Sugar Intake Report</p>
        </div>
        <hr class="mx-4 my-4">
    {{-- Added Sugar --}}
    <div class="row-top row">
        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Average Daily Added Sugars by Quarter</strong></h1>
            {!! $averageSugarChart->container() !!}
            <script src="{{ $averageSugarChart->cdn() }}"></script>
            {{ $averageSugarChart->script() }}
            </div>
        </div>

        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Added Sugars from Bought Canteen Foods to the Daily Recommended Kcal Intake of Students</strong>
            </h1>
            {!! $avgSugarPieChart->container() !!}
            <script src="{{ $avgSugarPieChart->cdn() }}"></script>
            {{ $avgSugarPieChart->script() }}
             </div>
        </div>
        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Added Sugars consumed by sex and age group</strong></h1>
            {!! $avgSugarComparisonPieChart->container() !!}
            <script src="{{ $avgSugarComparisonPieChart->cdn() }}"></script>
            {{ $avgSugarComparisonPieChart->script() }}
            </div>
        </div>

    </div>
    <div class="row-mid row">
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $avgSugarM6to9Chart->container() !!}
            <script src="{{ $avgSugarM6to9Chart->cdn() }}"></script>
            {{ $avgSugarM6to9Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $sugarM6to9PieChart->container() !!}
            <script src="{{ $sugarM6to9PieChart->cdn() }}"></script>
            {{ $sugarM6to9PieChart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $avgSugarF6to9Chart->container() !!}
            <script src="{{ $avgSugarF6to9Chart->cdn() }}"></script>
            {{ $avgSugarF6to9Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $sugarF6to9PieChart->container() !!}
            <script src="{{ $sugarF6to9PieChart->cdn() }}"></script>
            {{ $sugarF6to9PieChart->script() }}
            </div>
        </div>
    </div>
    <div class="row-bottom row">
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $avgSugarM10to12Chart->container() !!}
            <script src="{{ $avgSugarM10to12Chart->cdn() }}"></script>
            {{ $avgSugarM10to12Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $sugarM10to12PieChart->container() !!}
            <script src="{{ $sugarM10to12PieChart->cdn() }}"></script>
            {{ $sugarM10to12PieChart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females 10 to 12</strong></h1>
            {!! $avgSugarF10to12Chart->container() !!}
            <script src="{{ $avgSugarF10to12Chart->cdn() }}"></script>
            {{ $avgSugarF10to12Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 10 to 12</strong></h1>
            {!! $sugarF10to12PieChart->container() !!}
            <script src="{{ $sugarF10to12PieChart->cdn() }}"></script>
            {{ $sugarF10to12PieChart->script() }}
            </div>
        </div>
    </div>

    <hr class="mx-4 my-4">
    <br>


</section>
</x-admin.layout>
