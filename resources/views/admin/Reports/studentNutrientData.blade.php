<x-admin.layout :notifs='$adminNotifs'>
    <section class="survey-card">
        <div class="header-page">
            <p><i class="fab fa-nutritionix fa-xl"></i>Students' Nutrient Data Intake</p>
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
                        <h1><strong>Sat Fat from Bought Canteen Foods to the Daily Recommended Kcal Intake of Students</strong>
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
                        <h1><strong>Added Sugars from Bought Canteen Foods to the Daily Recommended Kcal Intake of Students</strong>
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
                        <h1><strong>Sodium from Bought Canteen Foods to the Daily Recommended Sodium Intake of Students</strong>
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
        </div>



       

        <hr class="mx-4 my-4">
        <br>


    </section>


</x-admin.layout>
