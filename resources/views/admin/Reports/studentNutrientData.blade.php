<x-admin.layout :notifs='$adminNotifs'>
    <section class="survey-card">
        <div class="header-page">
            <p><i class="fab fa-nutritionix fa-xl"></i>Students' Nutrient Data Intake</p>
            <button id="generateReport" class="btn btn-info">Generate Report</button>
        </div>
        <hr class="mx-4 my-4">
        {{-- Tabs --}}
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-kcal-tab" data-bs-toggle="pill" data-bs-target="#pills-kcal"
                    type="button" role="tab" aria-controls="pills-kcal" aria-selected="true">Kcal</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-totFat-tab" data-bs-toggle="pill" data-bs-target="#pills-totFat"
                    type="button" role="tab" aria-controls="pills-totFat" aria-selected="false">Total Fat</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-satFat-tab" data-bs-toggle="pill" data-bs-target="#pills-satFat"
                    type="button" role="tab" aria-controls="pills-satFat" aria-selected="false">Sat Fat</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-sugar-tab" data-bs-toggle="pill" data-bs-target="#pills-sugar"
                    type="button" role="tab" aria-controls="pills-sugar" aria-selected="false">Added
                    Sugars</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-sodium-tab" data-bs-toggle="pill" data-bs-target="#pills-sodium"
                    type="button" role="tab" aria-controls="pills-sodium" aria-selected="false">Sodium</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-bmi-tab" data-bs-toggle="pill" data-bs-target="#pills-bmi"
                    type="button" role="tab" aria-controls="pills-bmi" aria-selected="false">BMI</button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-generate-tab" data-bs-toggle="pill" data-bs-target="#pills-generate"
                    type="button" role="tab" aria-controls="pills-generate" aria-selected="false">Generate Report</button>
            </li> --}}
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-kcal" role="tabpanel" aria-labelledby="pills-kcal-tab">
                {{-- Kcal --}}
                <div class="row-top row">
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Average Daily Kcal by Quarter</strong></h1>
                            {!! $averageCalorieConsumptionChart->container() !!}
                            <script src="{{ $averageCalorieConsumptionChart->cdn() }}"></script>
                            {{ $averageCalorieConsumptionChart->script() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Kcal from Bought Canteen Foods to the Daily Recommended Kcal Intake of
                                    Students</strong>
                            </h1>
                            {!! $testPieChart->container() !!}
                            <script src="{{ $testPieChart->cdn() }}"></script>
                            {{ $testPieChart->script() }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Kcal consumed by sex and age group</strong></h1>
                            {!! $testRadialCjart->container() !!}
                            <script src="{{ $testRadialCjart->cdn() }}"></script>
                            {{ $testRadialCjart->script() }}
                        </div>
                    </div>

                </div>
                <a class="text-center" href="/admin/reports/download-calorie-report">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Download in PDF
                    </div>
                </a>
            </div>
            <div class="tab-pane fade" id="pills-totFat" role="tabpanel" aria-labelledby="pills-totFat-tab">
                <div class="row-top row">
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Average Total Fat by Quarter</strong></h1>
                            {!! $averageTotalFatChart->container() !!}
                            <script src="{{ $averageTotalFatChart->cdn() }}"></script>
                            {{ $averageTotalFatChart->script() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Total Fat from Bought Canteen Foods to the Daily Recommended Total Fat</strong>
                            </h1>
                            {!! $avgTotFatPieChart->container() !!}
                            <script src="{{ $avgTotFatPieChart->cdn() }}"></script>
                            {{ $avgTotFatPieChart->script() }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Total Fat consumed by sex and age group</strong></h1>
                            {!! $avgTotFatComparisonPieChart->container() !!}
                            <script src="{{ $avgTotFatComparisonPieChart->cdn() }}"></script>
                            {{ $avgTotFatComparisonPieChart->script() }}
                        </div>
                    </div>

                </div>
                <a class="text-center" href="/admin/reports/download-totalFat-report">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Download in PDF
                    </div>
                </a>
            </div>
            <div class="tab-pane fade" id="pills-satFat" role="tabpanel" aria-labelledby="pills-satFat-tab">
                <div class="row-top row">
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Average Daily Saturated Fat by Quarter</strong></h1>
                            {!! $averageSaturatedFatChart->container() !!}
                            <script src="{{ $averageSaturatedFatChart->cdn() }}"></script>
                            {{ $averageSaturatedFatChart->script() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Sat Fat from Bought Canteen Foods to the Daily Recommended Kcal Intake of
                                    Students</strong>
                            </h1>
                            {!! $avgSatFatPieChart->container() !!}
                            <script src="{{ $avgSatFatPieChart->cdn() }}"></script>
                            {{ $avgSatFatPieChart->script() }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Sat Fat consumed by sex and age group</strong></h1>
                            {!! $avgSatFatComparisonPieChart->container() !!}
                            <script src="{{ $avgSatFatComparisonPieChart->cdn() }}"></script>
                            {{ $avgSatFatComparisonPieChart->script() }}
                        </div>
                    </div>

                </div>
                <a class="text-center" href="/admin/reports/download-satFat-report">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Download in PDF
                    </div>
                </a>
            </div>
            <div class="tab-pane fade" id="pills-sugar" role="tabpanel" aria-labelledby="pills-sugar-tab">
                <div class="row-top row">
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Average Daily Added Sugars by Quarter</strong></h1>
                            {!! $averageSugarChart->container() !!}
                            <script src="{{ $averageSugarChart->cdn() }}"></script>
                            {{ $averageSugarChart->script() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Added Sugars from Bought Canteen Foods to the Daily Recommended Kcal Intake of
                                    Students</strong>
                            </h1>
                            {!! $avgSugarPieChart->container() !!}
                            <script src="{{ $avgSugarPieChart->cdn() }}"></script>
                            {{ $avgSugarPieChart->script() }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Added Sugars consumed by sex and age group</strong></h1>
                            {!! $avgSugarComparisonPieChart->container() !!}
                            <script src="{{ $avgSugarComparisonPieChart->cdn() }}"></script>
                            {{ $avgSugarComparisonPieChart->script() }}
                        </div>
                    </div>

                </div>
                <a class="text-center" href="/admin/reports/download-sugar-report">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Download in PDF
                    </div>
                </a>
            </div>
            <div class="tab-pane fade" id="pills-sodium" role="tabpanel" aria-labelledby="pills-sodium-tab">
                <div class="row-top row">
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Average Daily Sodium by Quarter</strong></h1>
                            {!! $averageSodiumChart->container() !!}
                            <script src="{{ $averageSodiumChart->cdn() }}"></script>
                            {{ $averageSodiumChart->script() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Sodium from Bought Canteen Foods to the Daily Recommended Sodium Intake of
                                    Students</strong>
                            </h1>
                            {!! $avgSodiumPieChart->container() !!}
                            <script src="{{ $avgSodiumPieChart->cdn() }}"></script>
                            {{ $avgSodiumPieChart->script() }}
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-survey card_red">
                            <h1><strong>Sodium consumed by sex and age group</strong></h1>
                            {!! $avgSodiumComparisonPieChart->container() !!}
                            <script src="{{ $avgSodiumComparisonPieChart->cdn() }}"></script>
                            {{ $avgSodiumComparisonPieChart->script() }}
                        </div>
                    </div>

                </div>
                <a class="text-center" href="/admin/reports/download-sodium-report">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Download in PDF
                    </div>
                </a>
            </div>
            <div class="tab-pane fade" id="pills-bmi" role="tabpanel" aria-labelledby="pills-bmi-tab">
                <div class="row">
                    <div class="col-3">
                        <h1>BMI Quarterly Changes by Sex</h1>
                        {!! $bmiChangeFLineChart->container() !!}
                        <script src="{{ $bmiChangeFLineChart->cdn() }}"></script>
                        {{ $bmiChangeFLineChart->script() }}
                    </div>
                    <div class="col-3">
                        <h1>Weight Quarterly Changes by Sex</h1>
                        {!! $weightChangeFLineChart->container() !!}
                        <script src="{{ $weightChangeFLineChart->cdn() }}"></script>
                        {{ $weightChangeFLineChart->script() }}
                    </div>
                    <div class="col-4">
                        <h1>BMI Classification Count</h1>
                        {!! $bmiCount4thQtrPieChart->container() !!}
                        <script src="{{ $bmiCount4thQtrPieChart->cdn() }}"></script>
                        {{ $bmiCount4thQtrPieChart->script() }}
                    </div>
                    <div class="col-2">
                        <h1>Average Height of Boys</h1>
                        <h1>{{ $averageMHeight }} cm</h1>
                        <h1>Average Height of Girls</h1>
                        <h1>{{ $averageFHeight }} cm</h1>
                        <h1>Average Weight of Boys</h1>
                        <h1>{{ $averageMWeight }} kg</h1>
                        <h1>Average Weight of Girls</h1>
                        <h1>{{ $averageFWeight }} kg</h1>
                    </div>
                </div>
                <a class="text-center" href="/admin/reports/download-bmi-report">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Download in PDF
                    </div>
                </a>
            </div>
            {{-- <div class="tab-pane fade" id="pills-generate" role="tabpanel" aria-labelledby="pills-generate-tab">
                <div class="row">
                   <label for="">Invididual</label>
                   <input type="text">
                   <label for="">Section</label>
                   <input type="text">

                <a class="text-center" href="/admin/reports/download-bmi-report">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Download in PDF
                    </div>
                </a>
            </div> --}}
        </div>


        {{-- Modals --}}
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
            tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Please select the scope of the report:
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle1" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Individual</button>
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Section</button>
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Grade</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL 1 --}}
        <div class="modal fade" id="exampleModalToggle1" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="studentName">Enter Student Name</label>
                        <input type="text" name="studentName" id="studentName">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Avg. Kcal: </label>
                                <p id="avgKcalByInd" class="form-control"></p>
                                <label for="">Avg. Total Fat: </label>
                                <p id="avgTotFatByInd" class="form-control"></p>
                                <label for="">Avg. Saturated Fat: </label>
                                <p id="avgSatFatByInd" class="form-control"></p>
                                <label for="">Avg. Added Sugar: </label>
                                <p id="avgSugarByInd" class="form-control"></p>
                                <label for="">Avg. Sodium: </label>
                                <p id="avgSodiumByInd" class="form-control"></p>
                                <label for="">BMI Status: </label>
                                <p id="BMIstatus" class="form-control"></p>
                                <label for="">Avg. Kcal Consumed (%): </label>
                                <p id="caloriesConsumed" class="form-control"></p>
                                <label for="">Avg. Kcal left to consume (%): </label>
                                <p id="caloriesConsumedLeft" class="form-control"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Back</button>
                        <button class="btn btn-primary" id="indivBtn">Generate</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL 2 --}}
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Generate Individual Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="sectionName">Enter Section Name</label>
                        <input type="text" name="sectionName" id="sectionName">
                        <div class="row">
                            <div class="col-12">
                                <label for="">Avg. Kcal: </label>
                                <p id="avgKcalBySec" class="form-control"></p>
                                <label for="">Avg. Total Fat: </label>
                                <p id="avgTotFatBySec" class="form-control"></p>
                                <label for="">Avg. Saturated Fat: </label>
                                <p id="avgSatFatBySec" class="form-control"></p>
                                <label for="">Avg. Added Sugar: </label>
                                <p id="avgSugarBySec" class="form-control"></p>
                                <label for="">Avg. Sodium: </label>
                                <p id="avgSodiumBySec" class="form-control"></p>
                                <label for="">No. of Underweights: </label>
                                <p id="underweightBySec" class="form-control"></p>
                                <label for="">No. of Normal weights: </label>
                                <p id="normalBySec" class="form-control"></p>
                                <label for="">No. of Overweights: </label>
                                <p id="overweightBySec" class="form-control"></p>
                                <label for="">No. of Obese</label>
                                <p id="obeseBySec" class="form-control"></p>
                                <label for="">Avg. Kcal Consumed (%): </label>
                                <p id="caloriesConsumedBySec" class="form-control"></p>
                                <label for="">Avg. Kcal left to consume (%): </label>
                                <p id="caloriesConsumedLeftBySec" class="form-control"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Back</button>
                        <button class="sectionBtn">Generate</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL 3 --}}
        <div class="modal fade" id="exampleModalToggle3" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Generate Report by Grade Level</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="gradeLevel">Enter Grade Level</label>
                        {{-- <input type="text" name="gradeLevel" id="gradeLevel"> --}}
                        <div class="form-group">
                            <select id="gradeLevel" name="gradeLevel" class="form-control">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Avg. Kcal: </label>
                                <p id="avgKcalByGrade" class="form-control"></p>
                                <label for="">Avg. Total Fat: </label>
                                <p id="avgTotFatByGrade" class="form-control"></p>
                                <label for="">Avg. Saturated Fat: </label>
                                <p id="avgSatFatByGrade" class="form-control"></p>
                                <label for="">Avg. Added Sugar: </label>
                                <p id="avgSugarByGrade" class="form-control"></p>
                                <label for="">Avg. Sodium: </label>
                                <p id="avgSodiumByGrade" class="form-control"></p>
                                <label for="">No. of Underweights: </label>
                                <p id="underweightByGrade" class="form-control"></p>
                                <label for="">No. of Normal weights: </label>
                                <p id="normalByGrade" class="form-control"></p>
                                <label for="">No. of Overweights: </label>
                                <p id="overweightByGrade" class="form-control"></p>
                                <label for="">No. of Obese</label>
                                <p id="obeseByGrade" class="form-control"></p>
                                <label for="">Avg. Kcal Consumed (%): </label>
                                <p id="caloriesConsumedByGrade" class="form-control"></p>
                                <label for="">Avg. Kcal left to consume (%): </label>
                                <p id="caloriesConsumedLeftByGrade" class="form-control"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                            data-bs-dismiss="modal">Back</button>
                        <button class="gradeBtn">Generate</button>
                    </div>
                </div>
            </div>
        </div>


        <hr class="mx-4 my-4">
        <br>



    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script>
        $('document').ready(function() {

            var routeFindPhilFCT = "{{ url('/autocomplete-search-students') }}";
            $('#studentName').typeahead({
                hint: true,
                highlight: true,
                minLength: 1,
                items: 5,
                source: function(query, process) {
                    return $.get(routeFindPhilFCT, {
                        query: query
                    }, function(data) {
                        return process(data);
                    });
                },
            });

            var routeFindSection = "{{ url('/autocomplete-search-sections') }}";
            $('#sectionName').typeahead({
                hint: true,
                highlight: true,
                minLength: 1,
                items: 5,
                source: function(query, process) {
                    return $.get(routeFindSection, {
                        query: query
                    }, function(data) {
                        return process(data);
                    });
                },
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#generateReport').click(function() {
                $('#exampleModalToggle').modal('show');

            });

            $('#indivBtn').click(function() {
                var fullName = $('#studentName').val();
                $.ajax({
                    url: "{{ url('admin/reports/nutrient/generateByIndiv') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        fullName
                    },
                    success: function(response) {
                        $('#avgKcalByInd').text(response.avgKcal);
                        $('#avgTotFatByInd').text(response.avgTotFat);
                        $('#avgSatFatByInd').text(response.avgSatFat);
                        $('#avgSugarByInd').text(response.avgSugar);
                        $('#avgSodiumByInd').text(response.avgSodium);
                        $('#BMIstatus').text(response.BMIstatus);
                        $('#caloriesConsumed').text(response.caloriesConsumed);
                        $('#caloriesConsumedLeft').text(response.caloriesConsumedLeft);
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error.responseJSON.message);
                    },
                });
            })

            $('.sectionBtn').click(function() {
                var section = $('#sectionName').val();
                $.ajax({
                    url: "{{ url('admin/reports/nutrient/generate') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        section
                    },
                    success: function(response) {
                        $('#avgKcalBySec').text(response.avgKcal);
                        $('#avgTotFatBySec').text(response.avgTotFat);
                        $('#avgSatFatBySec').text(response.avgSatFat);
                        $('#avgSugarBySec').text(response.avgSugar);
                        $('#avgSodiumBySec').text(response.avgSodium);
                        $('#underweightBySec').text(response.underweight);
                        $('#normalBySec').text(response.normal);
                        $('#overweightBySec').text(response.overweight);
                        $('#obeseBySec').text(response.obese);
                        $('#caloriesConsumedBySec').text(response.caloriesConsumed);
                        $('#caloriesConsumedLeftBySec').text(response.caloriesConsumedLeft);
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error.responseJSON.message);
                    },
                });
            })

            $('.gradeBtn').click(function() {
                var grade = $('#gradeLevel').val();
                $.ajax({
                    url: "{{ url('admin/reports/nutrient/generateByGrade') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        grade
                    },
                    success: function(response) {
                        $('#avgKcalByGrade').text(response.avgKcal);
                        $('#avgTotFatByGrade').text(response.avgTotFat);
                        $('#avgSatFatByGrade').text(response.avgSatFat);
                        $('#avgSugarByGrade').text(response.avgSugar);
                        $('#avgSodiumByGrade').text(response.avgSodium);
                        $('#underweightByGrade').text(response.underweight);
                        $('#normalByGrade').text(response.normal);
                        $('#overweightByGrade').text(response.overweight);
                        $('#obeseByGrade').text(response.obese);
                        $('#caloriesConsumedByGrade').text(response.caloriesConsumed);
                        $('#caloriesConsumedLeftByGrade').text(response.caloriesConsumedLeft);
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error.responseJSON.message);
                    },
                });
            })
        });
    </script>
</x-admin.layout>
