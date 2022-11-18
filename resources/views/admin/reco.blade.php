@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Frans' Fucking Testing Chamber</h1>
                {{-- <div class="card">
                    <h1>Greens</h1>
                    @foreach ($greens as $green)
                        <h2>Name: {{ $green->name }} Grade: {{ $green->grade }}
                        </h2>
                    @endforeach
                    <br>
                    <h1>Ambers</h1>
                    @foreach ($ambers as $amber)
                        <h2>Name: {{ $amber->name }} Grade: {{ $amber->grade }}
                        </h2>
                    @endforeach
                    <h1>Reds</h1>
                    @foreach ($reds as $red)
                        <h2>Name: {{ $red->name }} Grade: {{ $red->grade }}
                        </h2>
                    @endforeach
                    <h1>Grays</h1>
                    @foreach ($grays as $gray)
                        <h2>Name: {{ $gray->name }} Grade: {{ $gray->grade }}
                        </h2>
                    @endforeach
                </div> --}}
                <div class="card">
                  <h1>Green</h1>
                  <h3 id="green1"></h3>
                  <h3 id="green2"></h3>
                  <h3 id="green3"></h3>
                  <h1>Amber</h1>
                  <h3 id="amber1"></h3>
                  <h3 id="amber2"></h3>
                </div>
                <a class="btn btn-info" id="shuffle">Shuffle</a>
            </div>
        </div>
    </div>
    @include('partials.admin._DataTableScripts')
    <script>
        $('#shuffle').on('click', function() {
            $.ajax({
                type: "GET",
                url: "{{ url('/menu/suggestion') }}",
                success: function(data) {
                    console.log(data.ambers)
                    $.each(data.ambers, function(i, value) {
                        console.log(value.name + "\t" + value.grade);
                    });
                    $.each(data.greens, function(i, value) {
                        console.log(value.name + "\t" + value.grade);
                    });
                }
            });
        });
    </script>
@endsection
