<x-admin.layout>

    <div class="card-body">
        <div class="row">
            
            <div class="col-6">
                {!! $ratingChart->container() !!}

                <script src="{{ $ratingChart->cdn() }}"></script>

                {{ $ratingChart->script() }}
            </div>
            <div class="col-3">
                <h1>Rating Average Card</h1>
                <h1 class="h1" id="ratingCard">{{ $averageRating}}</h1>
            </div>
            <div class="col-3">
                <h1>Most Suggested Food</h1>
                <h1 id="mostSuggestedFoodsCard">
                    @foreach ($mostSuggestedFoods as $mostSuggestedFood)
                        <li>{{$mostSuggestedFood}}</li>
                    @endforeach
                </h1>
            </div>
            <div class="col-12">
                {!! $suggestionChart->container() !!}

                <script src="{{ $suggestionChart->cdn() }}"></script>

                {{ $suggestionChart->script() }}
            </div>
        </div>
    </div>

</x-admin.layout>