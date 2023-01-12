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
                    type="button" role="tab" aria-controls="pills-kcal" aria-selected="true">Daily</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-totFat-tab" data-bs-toggle="pill" data-bs-target="#pills-totFat"
                    type="button" role="tab" aria-controls="pills-totFat" aria-selected="false">Weekly</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-satFat-tab" data-bs-toggle="pill" data-bs-target="#pills-satFat"
                    type="button" role="tab" aria-controls="pills-satFat" aria-selected="false">Monthly</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-sugar-tab" data-bs-toggle="pill" data-bs-target="#pills-sugar"
                    type="button" role="tab" aria-controls="pills-sugar" aria-selected="false">Yearly</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-sodium-tab" data-bs-toggle="pill" data-bs-target="#pills-sodium"
                    type="button" role="tab" aria-controls="pills-sodium" aria-selected="false">Reports</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-kcal" role="tabpanel" aria-labelledby="pills-kcal-tab">
                Daily
            </div>
            <div class="tab-pane fade" id="pills-totFat" role="tabpanel" aria-labelledby="pills-totFat-tab">
                Weekly
            </div>
            <div class="tab-pane fade" id="pills-satFat" role="tabpanel" aria-labelledby="pills-satFat-tab">
                Monthly
            </div>
            <div class="tab-pane fade" id="pills-sugar" role="tabpanel" aria-labelledby="pills-sugar-tab">
                <div class="col-12">
                    <h1> <strong> Monthly Sales</strong></h1>
                    {!! $monthlySalesChart->container() !!}
                    <script src="{{ $monthlySalesChart->cdn() }}"></script>
                    {{ $monthlySalesChart->script() }}
                </div>
                <a class="text-center" href="/admin/reports/download-sales-report">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Download in PDF
                    </div>
                </a>
            </div>
            <div class="tab-pane fade" id="pills-sodium" role="tabpanel" aria-labelledby="pills-sodium-tab">
                Reports
            </div>
        </div>





        <hr class="mx-4 my-4">
        <br>


    </section>

</x-admin.layout>
