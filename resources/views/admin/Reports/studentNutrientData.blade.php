<x-admin.layout>

    <div class="card-body">
        <div class="row">
            
            <div class="col-6">
                {!! $averageNutrientConsumptionChart->container() !!}

                <script src="{{ $averageNutrientConsumptionChart->cdn() }}"></script>

                {{ $averageNutrientConsumptionChart->script() }}
            </div>

        </div>
    </div>

</x-admin.layout>