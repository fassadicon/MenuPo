<x-admin.layout :notifs='$adminNotifs'>
    {{-- Total Fat --}}
    <div class="row">
        <div class="col-4">
            <h1><strong>Average Total Fat by Quarter</strong></h1>
            {!! $averageTotalFatChart->container() !!}
            <script src="{{ $averageTotalFatChart->cdn() }}"></script>
            {{ $averageTotalFatChart->script() }}
        </div>

        <div class="col-4">
            <h1><strong>Total Fat from Bought Canteen Foods to the Daily Recommended Total Fat</strong>
            </h1>
            {!! $avgTotFatPieChart->container() !!}
            <script src="{{ $avgTotFatPieChart->cdn() }}"></script>
            {{ $avgTotFatPieChart->script() }}
        </div>
        <div class="col-4">
            <h1><strong>Total Fat consumed by sex and age group</strong></h1>
            {!! $avgTotFatComparisonPieChart->container() !!}
            <script src="{{ $avgTotFatComparisonPieChart->cdn() }}"></script>
            {{ $avgTotFatComparisonPieChart->script() }}
        </div>

    </div>
    <div class="row">
        <div class="col-3">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $avgTotFatM6to9Chart->container() !!}
            <script src="{{ $avgTotFatM6to9Chart->cdn() }}"></script>
            {{ $avgTotFatM6to9Chart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $totFatM6to9PieChart->container() !!}
            <script src="{{ $totFatM6to9PieChart->cdn() }}"></script>
            {{ $totFatM6to9PieChart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $avgTotFatF6to9Chart->container() !!}
            <script src="{{ $avgTotFatF6to9Chart->cdn() }}"></script>
            {{ $avgTotFatF6to9Chart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $totFatF6to9PieChart->container() !!}
            <script src="{{ $totFatF6to9PieChart->cdn() }}"></script>
            {{ $totFatF6to9PieChart->script() }}
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $avgTotFatM10to12Chart->container() !!}
            <script src="{{ $avgTotFatM10to12Chart->cdn() }}"></script>
            {{ $avgTotFatM10to12Chart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $totFatM10to12PieChart->container() !!}
            <script src="{{ $totFatM10to12PieChart->cdn() }}"></script>
            {{ $totFatM10to12PieChart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Females 10 to 12</strong></h1>
            {!! $avgTotFatF10to12Chart->container() !!}
            <script src="{{ $avgTotFatF10to12Chart->cdn() }}"></script>
            {{ $avgTotFatF10to12Chart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Females Ages 10 to 12</strong></h1>
            {!! $totFatF10to12PieChart->container() !!}
            <script src="{{ $totFatF10to12PieChart->cdn() }}"></script>
            {{ $totFatF10to12PieChart->script() }}
        </div>
    </div>
</x-admin.layout>
