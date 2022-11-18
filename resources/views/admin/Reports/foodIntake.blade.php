<x-admin.layout>
    <div class="card">
        <!-- NCs -->
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <canvas id="NC_CookedMeals"></canvas>
                </div>
                <div class="col-3">
                    <canvas id="NC_Snacks"></canvas>
                </div>
                <div class="col-3">
                    <canvas id="NC_Beverages"></canvas>
                </div>
                <div class="col-3">
                    <canvas id="NC_Others"></canvas>
                </div>
            </div>
        </div> <!-- NCs -->
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <canvas id="NB_CookedMeals"></canvas>
                </div>
                <div class="col-3">
                    <canvas id="NB_Snacks"></canvas>
                </div>
                <div class="col-3">
                    <canvas id="NB_Beverages"></canvas>
                </div>
                <div class="col-3">
                  <canvas id="NB_Others"></canvas>
              </div>
            </div>
        </div>
    </div>
    <!-- Page level plugins -->
    <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/chart.min.js') }}"></script>
</x-admin.layout>
<script>
    // Color Generation
    function generateColors(length) {
        var colors = [];
        for (let i = 0; i < length; i++) {
            colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
        }
        return colors;
        // generateColors(response.data.length)
    }
    // NC_CookedMeals
    (function($) {
        var NC_CookedMeals = {
            init: function() {
                this.ajaxGetPostMonthlyData();
            },
            ajaxGetPostMonthlyData: function() {
                var urlPath = "{{ route('reports.countFoodsBasedInColor', 3) }}";
                var request = $.ajax({
                    method: "GET",
                    url: urlPath
                });
                request.done(function(response) {
                    NC_CookedMeals.createCompletedJobsChart(response);
                });
            },
            createCompletedJobsChart: function(response) {
                var ctx = document.getElementById("NC_CookedMeals");
                var myPieChart = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: "Count of Food Items by Grade Color",
                            data: response.data,
                            backgroundColor: ['#344e41', '#ff9500', '#941b0c'],
                            hoverBackgroundColor: ['#588157', '#ffb700', '#c32f27'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            borderWidth: 5
                        }, ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        },
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: '% of Cooked Meals based on Color'
                            }
                        },
                        cutoutPercentage: 80,
                    },
                });

            }
        };
        NC_CookedMeals.init();
    })(jQuery);
    // NC_Snacks
    (function($) {
        var NC_Snacks = {
            init: function() {
                this.ajaxGetPostMonthlyData();
            },
            ajaxGetPostMonthlyData: function() {
                var urlPath = "{{ route('reports.countFoodsBasedInColor', 2) }}";
                var request = $.ajax({
                    method: "GET",
                    url: urlPath,
                });
                request.done(function(response) {
                    NC_Snacks.createCompletedJobsChart(response);
                });
            },
            createCompletedJobsChart: function(response) {
                var ctx = document.getElementById("NC_Snacks");
                var myPieChart = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: "Count of Food Items by Grade Color",
                            data: response.data,
                            backgroundColor: ['#344e41', '#ff9500', '#941b0c'],
                            hoverBackgroundColor: ['#588157', '#ffb700', '#c32f27'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            borderWidth: 5
                        }, ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        },
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: '% of Snacks based on Grade Color'
                            }
                        },
                        cutoutPercentage: 80,
                    },
                });

            },
        };
        NC_Snacks.init();
    })(jQuery);
    // NC_Beverages
    (function($) {
        var NC_Beverages = {
            init: function() {
                this.ajaxGetPostMonthlyData();
            },
            ajaxGetPostMonthlyData: function() {
                var urlPath = "{{ route('reports.countFoodsBasedInColor', 1) }}";
                var request = $.ajax({
                    method: "GET",
                    url: urlPath,
                });
                request.done(function(response) {
                    NC_Beverages.createCompletedJobsChart(response);
                });
            },
            createCompletedJobsChart: function(response) {
                var ctx = document.getElementById("NC_Beverages");
                var myPieChart = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: "Count of Food Items by Grade Color",
                            data: response.data,
                            backgroundColor: ['#344e41', '#ff9500', '#941b0c'],
                            hoverBackgroundColor: ['#588157', '#ffb700', '#c32f27'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            borderWidth: 5
                        }, ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        },
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: '% of Beverages based on Grade Color'
                            }
                        },
                        cutoutPercentage: 80,
                    },
                });

            },
        };
        NC_Beverages.init();
    })(jQuery);
    // NC_Others
    (function($) {
        var NC_Others = {
            init: function() {
                this.ajaxGetPostMonthlyData();
            },
            ajaxGetPostMonthlyData: function() {
                var urlPath = "{{ route('reports.countFoodsBasedInColor', 0) }}";
                var request = $.ajax({
                    method: "GET",
                    url: urlPath,
                });
                request.done(function(response) {
                    NC_Others.createCompletedJobsChart(response);
                });
            },
            createCompletedJobsChart: function(response) {
                var ctx = document.getElementById("NC_Others");
                var myPieChart = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: "Count of Food Items by Grade Color",
                            data: response.data,
                            backgroundColor: ['#344e41', '#ff9500', '#941b0c'],
                            hoverBackgroundColor: ['#588157', '#ffb700', '#c32f27'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            borderWidth: 5
                        }, ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        },
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: '% of Other Food Items based on Grade Color'
                            }
                        },
                        cutoutPercentage: 80,
                    },
                });

            },
        };
        NC_Others.init();
    })(jQuery);
    // NB_CookedMeals
    (function($) {
        var NB_CookedMeals = {
            init: function() {
                this.ajaxGetPostMonthlyData();
            },
            ajaxGetPostMonthlyData: function() {
                var urlPath = "{{ route('reports.aveGradePerType', 3) }}";
                var request = $.ajax({
                    method: "GET",
                    url: urlPath,
                });
                request.done(function(response) {
                  NB_CookedMeals.createCompletedJobsChart(response);
                });
            },
            createCompletedJobsChart: function(response) {
                var ctx = document.getElementById("NB_CookedMeals");
                var myPieChart = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: "Count of Bought Cooked Meals by Grade Color",
                            data: response.data,
                            backgroundColor: ['#344e41', '#ff9500', '#941b0c'],
                            hoverBackgroundColor: ['#588157', '#ffb700', '#c32f27'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            borderWidth: 5
                        }, ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        },
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Count of Bought Food Items by Grade Color'
                            }
                        },
                        cutoutPercentage: 80,
                    },
                });

            },
        };
        NB_CookedMeals.init();
    })(jQuery);
    // NB_Snacks
    (function($) {
        var NB_Snacks = {
            init: function() {
                this.ajaxGetPostMonthlyData();
            },
            ajaxGetPostMonthlyData: function() {
                var urlPath = "{{ route('reports.aveGradePerType', 2) }}";
                var request = $.ajax({
                    method: "GET",
                    url: urlPath,
                });
                request.done(function(response) {
                  NB_Snacks.createCompletedJobsChart(response);
                });
            },
            createCompletedJobsChart: function(response) {
                var ctx = document.getElementById("NB_Snacks");
                var myPieChart = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: "Count of Bought Cooked Meals by Grade Color",
                            data: response.data,
                            backgroundColor: ['#344e41', '#ff9500', '#941b0c'],
                            hoverBackgroundColor: ['#588157', '#ffb700', '#c32f27'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            borderWidth: 5
                        }, ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        },
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Count of Bought Snacks by Grade Color'
                            }
                        },
                        cutoutPercentage: 80,
                    },
                });

            },
        };
        NB_Snacks.init();
    })(jQuery);
    // NB_Beverages
    (function($) {
        var NB_Beverages = {
            init: function() {
                this.ajaxGetPostMonthlyData();
            },
            ajaxGetPostMonthlyData: function() {
                var urlPath = "{{ route('reports.aveGradePerType', 1) }}";
                var request = $.ajax({
                    method: "GET",
                    url: urlPath,
                });
                request.done(function(response) {
                  NB_Beverages.createCompletedJobsChart(response);
                });
            },
            createCompletedJobsChart: function(response) {
                var ctx = document.getElementById("NB_Beverages");
                var myPieChart = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: "Count of Bought Beverages by Grade Color",
                            data: response.data,
                            backgroundColor: ['#344e41', '#ff9500', '#941b0c'],
                            hoverBackgroundColor: ['#588157', '#ffb700', '#c32f27'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            borderWidth: 5
                        }, ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        },
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Count of Bought Beverages by Grade Color'
                            }
                        },
                        cutoutPercentage: 80,
                    },
                });

            },
        };
        NB_Beverages.init();
    })(jQuery);
    // NB_Others
    (function($) {
        var NB_Others = {
            init: function() {
                this.ajaxGetPostMonthlyData();
            },
            ajaxGetPostMonthlyData: function() {
                var urlPath = "{{ route('reports.aveGradePerType', 0) }}";
                var request = $.ajax({
                    method: "GET",
                    url: urlPath,
                });
                request.done(function(response) {
                  NB_Others.createCompletedJobsChart(response);
                });
            },
            createCompletedJobsChart: function(response) {
                var ctx = document.getElementById("NB_Others");
                var myPieChart = new Chart(ctx, {
                    type: "doughnut",
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: "Count of Bought Cooked Meals by Grade Color",
                            data: response.data,
                            backgroundColor: ['#344e41', '#ff9500', '#941b0c'],
                            hoverBackgroundColor: ['#588157', '#ffb700', '#c32f27'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                            borderWidth: 5
                        }, ],
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: "#dddfeb",
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        },
                        legend: {
                            display: true,
                            labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Count of Bought Other Food Items by Grade Color'
                            }
                        },
                        cutoutPercentage: 80,
                    },
                });

            },
        };
        NB_Others.init();
    })(jQuery);
</script>
