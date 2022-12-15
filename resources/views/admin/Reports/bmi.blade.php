<x-admin.layout :notifs='$adminNotifs'>
    {{-- Saturated Fat --}}
    <div class="row">
        <div class="col-3">
            <h1>BMI Classification Count 1st Qtr</h1>
            {!! $bmiPolarChart->container() !!}
            <script src="{{ $bmiPolarChart->cdn() }}"></script>
            {{ $bmiPolarChart->script() }}
        </div>
        <div class="col-3">
            <h1>BMI Classification Count 2nd Qtr</h1>
            {!! $bmiCount2ndQtrPieChart->container() !!}
            <script src="{{ $bmiCount2ndQtrPieChart->cdn() }}"></script>
            {{ $bmiCount2ndQtrPieChart->script() }}
        </div>
        <div class="col-3">
            <h1>BMI Classification Count 3rd Qtr</h1>
            {!! $bmiCount3rdQtrPieChart->container() !!}
            <script src="{{ $bmiCount3rdQtrPieChart->cdn() }}"></script>
            {{ $bmiCount3rdQtrPieChart->script() }}
        </div>
        <div class="col-3">
            <h1>BMI Classification Count 4th Qtr</h1>
            {!! $bmiCount4thQtrPieChart->container() !!}
            <script src="{{ $bmiCount4thQtrPieChart->cdn() }}"></script>
            {{ $bmiCount4thQtrPieChart->script() }}
        </div>
        <div class="row">
            <div class="col-4">
                <h1>BMI Quarterly Changes by Sex</h1>
                {!! $bmiChangeFLineChart->container() !!}
                <script src="{{ $bmiChangeFLineChart->cdn() }}"></script>
                {{ $bmiChangeFLineChart->script() }}
            </div>
            <div class="col-4">
                <h1>Weight Quarterly Changes by Sex</h1>
                {!! $weightChangeFLineChart->container() !!}
                <script src="{{ $weightChangeFLineChart->cdn() }}"></script>
                {{ $weightChangeFLineChart->script() }}
            </div>
            <div class="col-2">
                <h1>Average Height of Boys</h1>
                <h1>{{ $averageMHeight }} cm</h1>
                <h1>Average Height of Girls</h1>
                <h1>{{ $averageFHeight }} cm</h1>
                <h1>Average Weight of Boys</h1>
                <h1>{{ $averageMWeight }} kg</h1>
                <h1>Average Weight of Girls</h1>
                <h1>{{ $averageFWeight }} kg</h1>
            </div>
        </div>

        <a class="text-center" href="/admin/reports/download-bmi-report">
            <div
                class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                Download in PDF
            </div>
        </a>

    </div>
</x-admin.layout>
