<x-admin.layout :notifs='$adminNotifs'>

    <div class="card-body">
        <div class="row">
            <div class="col-3">
                {!! $boughtCookedMealsChart->container() !!}

                <script src="{{ $boughtCookedMealsChart->cdn() }}"></script>

                {{ $boughtCookedMealsChart->script() }}
            </div>
            <div class="col-3">
                {!! $boughtSnacksChart->container() !!}

                <script src="{{ $boughtSnacksChart->cdn() }}"></script>

                {{ $boughtSnacksChart->script() }}
            </div>
            <div class="col-3">
                {!! $boughtBeveragesChart->container() !!}

                <script src="{{ $boughtBeveragesChart->cdn() }}"></script>

                {{ $boughtBeveragesChart->script() }}
            </div>
            <div class="col-3">
                {!! $boughtOthersChart->container() !!}

                <script src="{{ $boughtOthersChart->cdn() }}"></script>

                {{ $boughtOthersChart->script() }}
            </div>
            <div class="col-3">
                {!! $foodsColorChart->container() !!}

                <script src="{{ $foodsColorChart->cdn() }}"></script>

                {{ $foodsColorChart->script() }}
            </div>
            <div class="col-3">
                {!! $menuColorChart->container() !!}

                <script src="{{ $menuColorChart->cdn() }}"></script>

                {{ $menuColorChart->script() }}
            </div>
            <div class="col-3">
                {!! $boughtColorChart->container() !!}

                <script src="{{ $boughtColorChart->cdn() }}"></script>

                {{ $boughtColorChart->script() }}
            </div>
            {{-- <div class="col-3">
                @foreach ($labels as $label)
                    <li>{{ $label }}</li>
                @endforeach
            </div> --}}
            <div class="col-1">
                <h1>Average Food Grade of Food Items</h1>
                <h1>{{round($averageFoodListGrade, 2)}}</h1>
            </div>
            <div class="col-1">
                <h1>Average Food Grade of Menu Items</h1>
                <h1>{{round($averageMenuGrade, 2)}}</h1>
            </div>
            <div class="col-1">
                <h1>Average Food Grade of Bought Items</h1>
                <h1>{{round($averageBoughtGrade, 2)}}</h1>
            </div>


        </div>
    </div>
    <a class="w-full text-center mr-4" href="/admin/reports/download-composition-report">
        <div
            class="block  text-secondary text-smfont-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
            Download in PDF
        </div>
    </a>

</x-admin.layout>
