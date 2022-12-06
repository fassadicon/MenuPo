<x-admin.layout>

    <div class="card-body">
        <div class="row">
            <div class="col-6">
                {{-- {!! $chart->container() !!}

                <script src="{{ $chart->cdn() }}"></script>

                {{ $chart->script() }} --}}
            </div>
            <div class="col-6">
                {!! $ratingChart->container() !!}

                <script src="{{ $ratingChart->cdn() }}"></script>

                {{ $ratingChart->script() }}
            </div>
            <div class="col-3">
                <h1>Rating Average Card</h1>
                <h1 class="h1" id="ratingCard"></h1>
            </div>
            <div class="col-3">
                <h1>Most Suggested Food</h1>
                <h1 id="mostSuggestedFoodsCard"></h1>
            </div>
            <div class="row">
                <div class="col-4">

                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <h1>Most Suggested Food by Parents</h1>
        <div class="row">
            <div class="col-12">
                <canvas id="suggestions"></canvas>
            </div>
        </div>
    </div>





    <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/chart.min.js') }}"></script>
</x-admin.layout>

<script>
    $(document).ready(function() {
        $.get("{{ url('admin/reports/survey/canteenRating') }}", function(data) {
            $('#ratingCard').text(data.average);
        })
    });

    $(document).ready(function() {
        $.get("{{ url('admin/reports/survey/suggestions') }}", function(data) {
            $('#mostSuggestedFoodsCard').text(data.mostSuggested);
        })
    });

    function generateColors(length) {
        let colors = [];
        for (let i = 0; i < length; i++) {
            colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
        }
        return colors;
    }

    (function($) {
        var suggestions = {
            init: function() {
                this.ajaxCall();
            },
            ajaxCall: function() {
                var request = $.ajax({
                    method: "GET",
                    url: "{{ route('reports.survey.rating') }}",
                });
                request.done(function(response) {
                    suggestions.createChart(response);
                });
            },
            createChart: function(response) {
                var ctx = document.getElementById("ratingChart");
                var myPieChart = new Chart(ctx, {
                    type: "pie",
                    data: {
                        datasets: [{
                            label: 'Most Suggested Food Items',
                            data: response.data,
                            backgroundColor: generateColors(response.data.length),
                            hoverBackgroundColor: generateColors(response.data.length),
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            // borderWidth: 5
                        }],
                        labels: response.labels
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            // xPadding: 15,
                            // yPadding: 15,
                            displayColors: false,
                            caretPadding: 10,
                        },
                        plugins: {
                            legend: {
                                display: true,
                            },
                            title: {
                                display: true,
                                text: "Parents' Rating of Canteen Menu"
                            }
                        },
                        // cutoutPercentage: 80,
                    },
                });
            },
        };
        suggestions.init();
    })(jQuery);
    (function($) {
        var suggestions = {
            init: function() {
                this.ajaxCall();
            },
            ajaxCall: function() {
                var request = $.ajax({
                    method: "GET",
                    url: "{{ route('reports.survey.suggestions') }}",
                });
                request.done(function(response) {
                    suggestions.createChart(response);
                    console.log(response);
                });
            },
            createChart: function(response) {
                var ctx = document.getElementById("suggestions");
                var myPieChart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        datasets: [{
                            data: response.data,
                            backgroundColor: generateColors(response.data.length),
                            hoverBackgroundColor: generateColors(response.data.length),
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            // borderWidth: 5
                        }],
                        labels: response.labels
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            // xPadding: 15,
                            // yPadding: 15,
                            displayColors: false,
                            // caretPadding: 10,
                        },
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                        // cutoutPercentage: 80,
                    },
                });
            },
        };
        suggestions.init();
    })(jQuery);
</script>
