<x-admin.layout :notifs='$adminNotifs'>
<section class="survey-card">
    <div class="header-page">
        <p><i class="fab fa-nutritionix fa-xl"></i>Saturated Fat Intake Report</p>
        </div>
        <hr class="mx-4 my-4">
    {{-- Saturated Fat --}}
    <div class="row-top row">
        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Average Daily Saturated Fat by Quarter</strong></h1>
            {!! $averageSaturatedFatChart->container() !!}
            <script src="{{ $averageSaturatedFatChart->cdn() }}"></script>
            {{ $averageSaturatedFatChart->script() }}
            </div>
        </div>

        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Sat Fat from Bought Canteen Foods to the Daily Recommended Kcal Intake of Students</strong>
            </h1>
            {!! $avgSatFatPieChart->container() !!}
            <script src="{{ $avgSatFatPieChart->cdn() }}"></script>
            {{ $avgSatFatPieChart->script() }}
            </div>
        </div>
        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Sat Fat consumed by sex and age group</strong></h1>
            {!! $avgSatFatComparisonPieChart->container() !!}
            <script src="{{ $avgSatFatComparisonPieChart->cdn() }}"></script>
            {{ $avgSatFatComparisonPieChart->script() }}
            </div>
        </div>

    </div>
    <div class="row-mid row">
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $avgSatFatM6to9Chart->container() !!}
            <script src="{{ $avgSatFatM6to9Chart->cdn() }}"></script>
            {{ $avgSatFatM6to9Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $satFatM6to9PieChart->container() !!}
            <script src="{{ $satFatM6to9PieChart->cdn() }}"></script>
            {{ $satFatM6to9PieChart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $avgSatFatF6to9Chart->container() !!}
            <script src="{{ $avgSatFatF6to9Chart->cdn() }}"></script>
            {{ $avgSatFatF6to9Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $satFatF6to9PieChart->container() !!}
            <script src="{{ $satFatF6to9PieChart->cdn() }}"></script>
            {{ $satFatF6to9PieChart->script() }}
            </div>
        </div>
    </div>
    <div class="row-bottom row">
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $avgSatFatM10to12Chart->container() !!}
            <script src="{{ $avgSatFatM10to12Chart->cdn() }}"></script>
            {{ $avgSatFatM10to12Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $satFatM10to12PieChart->container() !!}
            <script src="{{ $satFatM10to12PieChart->cdn() }}"></script>
            {{ $satFatM10to12PieChart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females 10 to 12</strong></h1>
            {!! $avgSatFatF10to12Chart->container() !!}
            <script src="{{ $avgSatFatF10to12Chart->cdn() }}"></script>
            {{ $avgSatFatF10to12Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 10 to 12</strong></h1>
            {!! $satFatF10to12PieChart->container() !!}
            <script src="{{ $satFatF10to12PieChart->cdn() }}"></script>
            {{ $satFatF10to12PieChart->script() }}
            </div>
        </div>
    </div>
    <a class="text-center" href="/admin/reports/download-satFat-report">
        <div
            class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
            Download in PDF
        </div>
    </a>

    <hr class="mx-4 my-4">
    <br>


</section>
</x-admin.layout>
