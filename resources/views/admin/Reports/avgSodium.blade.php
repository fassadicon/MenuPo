<x-admin.layout :notifs='$adminNotifs'>
    {{-- Sodium --}}
    <div class="row">
        <div class="col-4">
            <h1><strong>Average Daily Sodium by Quarter</strong></h1>
            {!! $averageSodiumChart->container() !!}
            <script src="{{ $averageSodiumChart->cdn() }}"></script>
            {{ $averageSodiumChart->script() }}
        </div>

        <div class="col-4">
            <h1><strong>Sodium from Bought Canteen Foods to the Daily Recommended Sodium Intake of Students</strong>
            </h1>
            {!! $avgSodiumPieChart->container() !!}
            <script src="{{ $avgSodiumPieChart->cdn() }}"></script>
            {{ $avgSodiumPieChart->script() }}
        </div>
        <div class="col-4">
            <h1><strong>Sodium consumed by sex and age group</strong></h1>
            {!! $avgSodiumComparisonPieChart->container() !!}
            <script src="{{ $avgSodiumComparisonPieChart->cdn() }}"></script>
            {{ $avgSodiumComparisonPieChart->script() }}
        </div>

    </div>
    <div class="row">
        <div class="col-3">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $avgSodiumM6to9Chart->container() !!}
            <script src="{{ $avgSodiumM6to9Chart->cdn() }}"></script>
            {{ $avgSodiumM6to9Chart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Male Ages 6 to 9</strong></h1>
            {!! $sodiumM6to9PieChart->container() !!}
            <script src="{{ $sodiumM6to9PieChart->cdn() }}"></script>
            {{ $sodiumM6to9PieChart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $avgSodiumF6to9Chart->container() !!}
            <script src="{{ $avgSodiumF6to9Chart->cdn() }}"></script>
            {{ $avgSodiumF6to9Chart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Females Ages 6 to 9</strong></h1>
            {!! $sodiumF6to9PieChart->container() !!}
            <script src="{{ $sodiumF6to9PieChart->cdn() }}"></script>
            {{ $sodiumF6to9PieChart->script() }}
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $avgSodiumM10to12Chart->container() !!}
            <script src="{{ $avgSodiumM10to12Chart->cdn() }}"></script>
            {{ $avgSodiumM10to12Chart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Male Ages 10 to 12</strong></h1>
            {!! $sodiumM10to12PieChart->container() !!}
            <script src="{{ $sodiumM10to12PieChart->cdn() }}"></script>
            {{ $sodiumM10to12PieChart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Females 10 to 12</strong></h1>
            {!! $avgSodiumF10to12Chart->container() !!}
            <script src="{{ $avgSodiumF10to12Chart->cdn() }}"></script>
            {{ $avgSodiumF10to12Chart->script() }}
        </div>
        <div class="col-3">
            <h1><strong>Females Ages 10 to 12</strong></h1>
            {!! $sodiumF10to12PieChart->container() !!}
            <script src="{{ $sodiumF10to12PieChart->cdn() }}"></script>
            {{ $sodiumF10to12PieChart->script() }}
        </div>
    </div>
</x-admin.layout>
