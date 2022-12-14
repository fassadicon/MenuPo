<x-user.layout :studs="$students" :notifs="$notifications">

    <div class="w-full h-auto md:mx-auto">
        <br><br><br>
        <br>

        <div class="md:flex h-auto w-full">
        
            <div class="md:w-3/6 bg-zinc-50 rounded-lg p-4 mx-2">
                {!! $calChart->container() !!}
            </div>

            <div class="w-full">
                <div class="md:flex mb-2">
                    <div class="w-full md:w-1/2 bg-zinc-50 rounded-lg p-4 mx-2">
                        {!! $fatChart->container() !!}
                    </div>

                    <div class="w-full md:w-1/2 bg-zinc-50 rounded-lg p-4 mx-2">
                        {!! $satFatChart->container() !!}
                    </div>
                </div>
                
                <div class="w-full md:flex">
                    <div class="w-full md:w-1/2 bg-zinc-50 rounded-lg p-4 mx-2">
                        {!! $sugarChart->container() !!}
                    </div>
            
                    <div class="w-full md:w-1/2 bg-zinc-50 rounded-lg p-4 mx-2">
                        {!! $sodiumChart->container() !!}
                    </div>
                </div>
            </div>
    
    </div>

    <a class="w-full text-center mr-4" href="/user/health-report-download/{{$anak->id}}">
        <div
            class="block  text-secondary text-smfont-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
            Download in PDF
        </div>
    </a>
    
    {{-- Calorie Chart --}}
    <script src="{{ $calChart->cdn() }}"></script>
    
    {{ $calChart->script() }}
    
    {{-- Fat Chart Chart --}}
    <script src="{{ $fatChart->cdn() }}"></script>
    
    {{ $fatChart->script() }}
    
    {{-- SatFat Chart Chart --}}
    <script src="{{ $satFatChart->cdn() }}"></script>
    
    {{ $satFatChart->script() }}
    
    {{-- Sugar Chart Chart --}}
    <script src="{{ $sugarChart->cdn() }}"></script>
    
    {{ $sugarChart->script() }}
    
    {{-- Sodium Chart Chart --}}
    <script src="{{ $sodiumChart->cdn() }}"></script>
    
    {{ $sodiumChart->script() }}
    
    
    </x-user.layout>