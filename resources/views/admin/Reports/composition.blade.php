<x-admin.layout :notifs='$adminNotifs'>
<section class="survey-card">
    <div class="header-page">
    <p><i class="fas fa-chart-pie fa-xl"></i>Menu and Order Composition</p>
    </div>
    <hr class="mx-4 my-4">
    
    <div class="card-body">
        {{-- Row Start --}}
        <div class="row-top row">
            {{-- Bar Charts --}}
            <div class="col-3">
                <div class="card-survey card_red">
                {!! $boughtCookedMealsChart->container() !!}

                <script src="{{ $boughtCookedMealsChart->cdn() }}"></script>

                {{ $boughtCookedMealsChart->script() }}
                </div>
            </div>
            <div class="col-3">
                <div class="card-survey card_red">
                {!! $boughtSnacksChart->container() !!}

                <script src="{{ $boughtSnacksChart->cdn() }}"></script>

                {{ $boughtSnacksChart->script() }}
                </div>
            </div>
            <div class="col-3">
                <div class="card-survey card_red">
                {!! $boughtBeveragesChart->container() !!}

                <script src="{{ $boughtBeveragesChart->cdn() }}"></script>

                {{ $boughtBeveragesChart->script() }}
                </div>
            </div>
            <div class="col-3">
                <div class="card-survey card_red">
                {!! $boughtOthersChart->container() !!}

                <script src="{{ $boughtOthersChart->cdn() }}"></script>

                {{ $boughtOthersChart->script() }}
                </div>
            </div>
        </div>
        {{-- Row Start --}}
        <div class="row-bottom row">
            {{-- Pie Charts --}}
            <div class="col-3">
                <div class="card-survey card_red">
                {!! $foodsColorChart->container() !!}

                <script src="{{ $foodsColorChart->cdn() }}"></script>

                {{ $foodsColorChart->script() }}
                </div>
            </div>
            <div class="col-3">
                <div class="card-survey card_red">
                {!! $menuColorChart->container() !!}

                <script src="{{ $menuColorChart->cdn() }}"></script>

                {{ $menuColorChart->script() }}
                </div>
            </div>
            <div class="col-3">
                <div class="card-survey card_red">
                {!! $boughtColorChart->container() !!}

                <script src="{{ $boughtColorChart->cdn() }}"></script>

                {{ $boughtColorChart->script() }}
                </div>
            </div>
            {{-- <div class="col-3">
                @foreach ($labels as $label)
                    <li>{{ $label }}</li>
                @endforeach
            </div> --}}
            {{-- Grading 3 ROW --}}
            <div class="col-3">
                <div class="row">
                    <div class="col-1">
                        <div class="card-survey card_red">
                        <h1>Average Food Grade of Food Items</h1>
                        <h1>{{round($averageFoodListGrade, 2)}}</h1>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        <div class="card-survey card_red">
                        <h1>Average Food Grade of Menu Items</h1>
                        <h1>{{round($averageMenuGrade, 2)}}</h1>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1">
                        <div class="card-survey card_red">
                        <h1>Average Food Grade of Bought Items</h1>
                        <h1>{{round($averageBoughtGrade, 2)}}</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr class="mx-4 my-4">
        <br>
    </div>
    <a class="w-full text-center mr-4" href="/admin/reports/download-composition-report">
        <div
            class="block  text-secondary text-smfont-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
            Download in PDF
        </div>
    </a>

</x-admin.layout>
