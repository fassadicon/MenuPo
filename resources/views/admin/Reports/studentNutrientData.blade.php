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
                {{-- <h1>{{$collection}}</h1> --}}
                {{-- <h1>{{round($collection->avg('totalKcal'), 2)}}</h1> --}}
                {{-- <h1>{{round($collection->avg('totalTotFat'), 2)}}</h1>
                <h1>{{round($collection->avg('totalSatFat'), 2)}}</h1>
                <h1>{{round($collection->avg('totalSugar'), 2)}}</h1>
                <h1>{{round($collection->avg('totalSodium'), 2)}}</h1> --}}
                @foreach ($collection as $item)
                    <h1>Purchase ID: {{ $item->id}}</h1>
                    <h1>Name: {{ $item->student->firstName }}</h1>
                    <h1>Bdate: {{ $item->student->birthDate }}</h1>
                    <h1>Total Kcal: {{ $item->totalKcal}}</h1>
                    <h1>Percantage Consumed: {{ 
                    $item->totalKcal
                    }}</h1>
                    
                @endforeach
                {{-- {{ $test }} --}}
            </div>

        </div>
    </div>

</x-admin.layout>
