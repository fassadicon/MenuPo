<x-admin.layout>

    <div class="card-body">
        <div class="row">

            <div class="col-6">
                {!! $averageNutrientConsumptionChart->container() !!}

                <script src="{{ $averageNutrientConsumptionChart->cdn() }}"></script>

                {{ $averageNutrientConsumptionChart->script() }}
            </div>
            <div class="col-6">
                {!! $averageCalorieConsumptionChart->container() !!}

                <script src="{{ $averageCalorieConsumptionChart->cdn() }}"></script>

                {{ $averageCalorieConsumptionChart->script() }}
            </div>
            <div class="col-6">
                {!! $averageRecommendedNutrientConsumptionChart->container() !!}

                <script src="{{ $averageRecommendedNutrientConsumptionChart->cdn() }}"></script>

                {{ $averageRecommendedNutrientConsumptionChart->script() }}
            </div>
            <h1>Count: {{ $test }}</h1> 
            <div class="col-6">
                @foreach ($collection as $item)
                    <h1>Purchase ID: {{ $item->id }}</h1>
                    <h1>Name: {{ $item->student->firstName }}</h1>
                    <h1>Bdate: {{ $item->student->birthDate }}</h1>
                    <h1>Total Kcal: {{ $item->totalKcal }}</h1>
                    <h1>Percantage Consumed: {{ $item->totalKcal }}</h1>
                @endforeach
            </div>
            <div class="col-6">
                @foreach ($testArray as $item)
                    <h1>Purchase ID: {{ $item }}</h1>
                @endforeach
            </div>

        </div>
    </div>

</x-admin.layout>
