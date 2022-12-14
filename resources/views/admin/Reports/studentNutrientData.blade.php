<x-admin.layout :notifs='$adminNotifs'>

    <div class="card-body">
        {{-- Kcal --}}
        <div class="row">
            <div class="col-3">
                {!! $averageCalorieConsumptionChart->container() !!}

                <script src="{{ $averageCalorieConsumptionChart->cdn() }}"></script>

                {{ $averageCalorieConsumptionChart->script() }}
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-4">
                        {!! $avgCalorieM6to9Chart->container() !!}

                        <script src="{{ $avgCalorieM6to9Chart->cdn() }}"></script>
        
                        {{ $avgCalorieM6to9Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgCalorieM10to12Chart->container() !!}

                        <script src="{{ $avgCalorieM10to12Chart->cdn() }}"></script>
        
                        {{ $avgCalorieM10to12Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgCalorieM13to15Chart->container() !!}

                        <script src="{{ $avgCalorieM13to15Chart->cdn() }}"></script>
        
                        {{ $avgCalorieM13to15Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgCalorieF6to9Chart->container() !!}

                        <script src="{{ $avgCalorieF6to9Chart->cdn() }}"></script>
        
                        {{ $avgCalorieF6to9Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgCalorieF10to12Chart->container() !!}

                        <script src="{{ $avgCalorieF10to12Chart->cdn() }}"></script>
        
                        {{ $avgCalorieF10to12Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgCalorieF13to15Chart->container() !!}

                        <script src="{{ $avgCalorieF13to15Chart->cdn() }}"></script>
        
                        {{ $avgCalorieF13to15Chart->script() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- Total Fat --}}
        <div class="row">
            <div class="col-3">
                {!! $averageTotalFatChart->container() !!}

                <script src="{{ $averageTotalFatChart->cdn() }}"></script>

                {{ $averageTotalFatChart->script() }}
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-4">
                        {!! $avgTotFatM6to9Chart->container() !!}

                        <script src="{{ $avgTotFatM6to9Chart->cdn() }}"></script>
        
                        {{ $avgTotFatM6to9Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatM10to12Chart->container() !!}

                        <script src="{{ $avgTotFatM10to12Chart->cdn() }}"></script>
        
                        {{ $avgTotFatM10to12Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatM13to15Chart->container() !!}

                        <script src="{{ $avgTotFatM13to15Chart->cdn() }}"></script>
        
                        {{ $avgTotFatM13to15Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatF6to9Chart->container() !!}

                        <script src="{{ $avgTotFatF6to9Chart->cdn() }}"></script>
        
                        {{ $avgTotFatF6to9Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatF10to12Chart->container() !!}

                        <script src="{{ $avgTotFatF10to12Chart->cdn() }}"></script>
        
                        {{ $avgTotFatF10to12Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatF13to15Chart->container() !!}

                        <script src="{{ $avgTotFatF13to15Chart->cdn() }}"></script>
        
                        {{ $avgTotFatF13to15Chart->script() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- Saturated Fat --}}
        <div class="row">
            <div class="col-3">
                {!! $averageTotalFatChart->container() !!}

                <script src="{{ $averageTotalFatChart->cdn() }}"></script>

                {{ $averageTotalFatChart->script() }}
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-4">
                        {!! $avgTotFatM6to9Chart->container() !!}

                        <script src="{{ $avgTotFatM6to9Chart->cdn() }}"></script>
        
                        {{ $avgTotFatM6to9Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatM10to12Chart->container() !!}

                        <script src="{{ $avgTotFatM10to12Chart->cdn() }}"></script>
        
                        {{ $avgTotFatM10to12Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatM13to15Chart->container() !!}

                        <script src="{{ $avgTotFatM13to15Chart->cdn() }}"></script>
        
                        {{ $avgTotFatM13to15Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatF6to9Chart->container() !!}

                        <script src="{{ $avgTotFatF6to9Chart->cdn() }}"></script>
        
                        {{ $avgTotFatF6to9Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatF10to12Chart->container() !!}

                        <script src="{{ $avgTotFatF10to12Chart->cdn() }}"></script>
        
                        {{ $avgTotFatF10to12Chart->script() }}
                    </div>
                    <div class="col-4">
                        {!! $avgTotFatF13to15Chart->container() !!}

                        <script src="{{ $avgTotFatF13to15Chart->cdn() }}"></script>
        
                        {{ $avgTotFatF13to15Chart->script() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

          
            <div class="col-3">
                {!! $averageSaturatedFatChart->container() !!}

                <script src="{{ $averageSaturatedFatChart->cdn() }}"></script>

                {{ $averageSaturatedFatChart->script() }}
            </div>
            <div class="col-3">
                {!! $averageSugarChart->container() !!}

                <script src="{{ $averageSugarChart->cdn() }}"></script>

                {{ $averageSugarChart->script() }}
            </div>
            <div class="col-3">
                {!! $averageSodiumChart->container() !!}

                <script src="{{ $averageSodiumChart->cdn() }}"></script>

                {{ $averageSodiumChart->script() }}
            </div>

        </div>
    </div>

</x-admin.layout>
