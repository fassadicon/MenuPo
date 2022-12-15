<x-admin.layout :notifs='$adminNotifs'>
<section class="survey-card">
        <div class="header-page">
            <p><i class="fab fa-nutritionix fa-xl"></i>Total Fat Intake Report</p>
            </div>
            <hr class="mx-4 my-4">
    {{-- Total Fat --}}
    <div class="row-top row">
        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Average Total Fat by Quarter</strong></h1>
            {!! $averageTotalFatChart->container() !!}
            <script src="{{ $averageTotalFatChart->cdn() }}"></script>
            {{ $averageTotalFatChart->script() }}
            </div>
        </div>

        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Total Fat from Bought Canteen Foods to the Daily Recommended Total Fat</strong>
            </h1>
            {!! $avgTotFatPieChart->container() !!}
            <script src="{{ $avgTotFatPieChart->cdn() }}"></script>
            {{ $avgTotFatPieChart->script() }}
            </div>
        </div>
        <div class="col-4">
            <div class="card-survey card_red">
            <h1><strong>Total Fat consumed by sex and age group</strong></h1>
            {!! $avgTotFatComparisonPieChart->container() !!}
            <script src="{{ $avgTotFatComparisonPieChart->cdn() }}"></script>
            {{ $avgTotFatComparisonPieChart->script() }}
            </div>
        </div>

    </div>
    <div class="row-mid row">
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $avgTotFatM6to9Chart->container() !!}
            <script src="{{ $avgTotFatM6to9Chart->cdn() }}"></script>
            {{ $avgTotFatM6to9Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $totFatM6to9PieChart->container() !!}
            <script src="{{ $totFatM6to9PieChart->cdn() }}"></script>
            {{ $totFatM6to9PieChart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $avgTotFatF6to9Chart->container() !!}
            <script src="{{ $avgTotFatF6to9Chart->cdn() }}"></script>
            {{ $avgTotFatF6to9Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $totFatF6to9PieChart->container() !!}
            <script src="{{ $totFatF6to9PieChart->cdn() }}"></script>
            {{ $totFatF6to9PieChart->script() }}
            </div>
        </div>
    </div>
    <div class="row-bottom row">
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $avgTotFatM10to12Chart->container() !!}
            <script src="{{ $avgTotFatM10to12Chart->cdn() }}"></script>
            {{ $avgTotFatM10to12Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $totFatM10to12PieChart->container() !!}
            <script src="{{ $totFatM10to12PieChart->cdn() }}"></script>
            {{ $totFatM10to12PieChart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females 10 to 12</strong></h1>
            {!! $avgTotFatF10to12Chart->container() !!}
            <script src="{{ $avgTotFatF10to12Chart->cdn() }}"></script>
            {{ $avgTotFatF10to12Chart->script() }}
            </div>
        </div>
        <div class="col-3">
            <div class="card-survey card_red">
            <h1><strong>Females Ages 10 to 12</strong></h1>
            {!! $totFatF10to12PieChart->container() !!}
            <script src="{{ $totFatF10to12PieChart->cdn() }}"></script>
            {{ $totFatF10to12PieChart->script() }}
            </div>
        </div>
    </div>

    <a class="text-center" href="/admin/reports/download-totalFat-report">
        <div
            class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
            Download in PDF
        </div>
    </a>

    <hr class="mx-4 my-4">
    <br>


</section>
</x-admin.layout>
