@extends('layouts.app')

@section('content')
    <div class="card">
        {{-- @foreach ($foods as $food) --}}
           {{$foods}}
        {{-- @endforeach --}}
    </div>
    <!-- Page level plugins -->
    <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/chart.min.js') }}"></script>

    {{-- <script src="{{ asset('admin/assets/js/testChart.js') }}"></script> --}}
    <script>
        // (function($) {
        //     function generateColors(length) {
        //         var colors = [];
        //         for (let i = 0; i < length; i++) {
        //             colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
        //         }
        //         return colors;
        //     }

        //     var charts = {
        //         init: function() {
        //             // -- Set new default font family and font color to mimic Bootstrap's default styling
        //             // Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        //             // Chart.defaults.global.defaultFontColor = "#292b2c";

        //             // charts.createCompletedJobsChart();
        //             this.ajaxGetPostMonthlyData();
        //         },

        //         ajaxGetPostMonthlyData: function() {
        //             var urlPath =
        //                 "{{ route('test.chart') }}";
        //             var request = $.ajax({
        //                 method: "GET",
        //                 url: urlPath,
        //             });

        //             request.done(function(response) {
        //                 console.log('ajaxGetPostMonthlyData');
        //                 // dataLength = response.data.length;
        //                 // console.log(dataLength);
        //                 charts.createCompletedJobsChart(response);
        //             });
        //         },

        //         /**
        //          * Created the Completed Jobs Chart
        //          */
        //         createCompletedJobsChart: function(response) {
        //             console.log('createCompletedJobsChart');
        //             console.log(response);
        //             var ctx = document.getElementById("testChart");
        //             var myPieChart = new Chart(ctx, {
        //                 type: "pie",
        //                 data: {
        //                     labels: response.labels,
        //                     datasets: [{
        //                         label: "Count of Food Items by Grade Color",
        //                         data: response.data,
        //                         backgroundColor: generateColors(response.data.length),
        //                         hoverBackgroundColor: generateColors(response.data.length),
        //                         hoverBorderColor: "rgba(234, 236, 244, 1)",
        //                     }, ],
        //                 },
        //                 options: {
        //                     maintainAspectRatio: false,
        //                     tooltips: {
        //                         backgroundColor: "rgb(255,255,255)",
        //                         bodyFontColor: "#858796",
        //                         borderColor: "#dddfeb",
        //                         borderWidth: 1,
        //                         xPadding: 15,
        //                         yPadding: 15,
        //                         displayColors: false,
        //                         caretPadding: 10,
        //                     },
        //                     legend: {
        //                         display: false,
        //                     },
        //                     cutoutPercentage: 80,
        //                 },
        //             });
        //             // var ctx = document.getElementById("myAreaChart");
        //             // var myLineChart = new Chart(ctx, {
        //             // 	type: 'line',
        //             // 	data: {
        //             // 		labels: response.months, // The response got from the ajax request containing all month names in the database
        //             // 		datasets: [{
        //             // 			label: "Sessions",
        //             // 			lineTension: 0.3,
        //             // 			backgroundColor: "rgba(2,117,216,0.2)",
        //             // 			borderColor: "rgba(2,117,216,1)",
        //             // 			pointRadius: 5,
        //             // 			pointBackgroundColor: "rgba(2,117,216,1)",
        //             // 			pointBorderColor: "rgba(255,255,255,0.8)",
        //             // 			pointHoverRadius: 5,
        //             // 			pointHoverBackgroundColor: "rgba(2,117,216,1)",
        //             // 			pointHitRadius: 20,
        //             // 			pointBorderWidth: 2,
        //             // 			data: response.post_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
        //             // 		}],
        //             // 	},
        //             // 	options: {
        //             // 		scales: {
        //             // 			xAxes: [{
        //             // 				time: {
        //             // 					unit: 'date'
        //             // 				},
        //             // 				gridLines: {
        //             // 					display: false
        //             // 				},
        //             // 				ticks: {
        //             // 					maxTicksLimit: 7
        //             // 				}
        //             // 			}],
        //             // 			yAxes: [{
        //             // 				ticks: {
        //             // 					min: 0,
        //             // 					max: response.max, // The response got from the ajax request containing max limit for y axis
        //             // 					maxTicksLimit: 5
        //             // 				},
        //             // 				gridLines: {
        //             // 					color: "rgba(0, 0, 0, .125)",
        //             // 				}
        //             // 			}],
        //             // 		},
        //             // 		legend: {
        //             // 			display: false
        //             // 		}
        //             // 	}
        //             // });
        //         },
        //     };

        //     charts.init();
        // })(jQuery);
    </script>
@endsection
