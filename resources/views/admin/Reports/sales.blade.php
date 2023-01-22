<x-admin.layout :notifs='$adminNotifs'>
    <section class="survey-card">
        <div class="header-page">
            <p><i class="fab fa-nutritionix fa-xl"></i>Sales Reports</p>
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
                    type="button" role="tab" aria-controls="pills-totFat" aria-selected="false">Charts</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-kcal" role="tabpanel" aria-labelledby="pills-kcal-tab">
                <h1 class="h3">Daily Report</h1>
                <div class="row">
                    <div class="col-7">
                        <table class="table-bordered table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Start</th>
                                    <th>Add</th>
                                    <th>Sold</th>
                                    <th>End</th>
                                    <th>Amount (in Pesos)</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($foodNames as $key => $foodName)
                                    <tr>
                                        <td>{{ $foodName }}</td>
                                        <td>{{ $starts[$key] }}</td>
                                        <td>{{ $adds[$key] }}</td>
                                        <td>{{ $solds[$key] }}</td>
                                        <td>{{ $ends[$key] }}</td>
                                        <td>{{ $amounts[$key] }}</td>
                                    </tr>
                                @endforeach
                            <tfoot class="table-group-divider">
                                <tr align="right">
                                    <td colspan="6">
                                        <h5>Total Amount: {{ $totalAmount }}</h5>
                                    </td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-5">
                        <table class="table-bordered table">
                            <thead>
                                <tr>
                                    <th>Items</th>
                                    <th>Cash</th>
                                    <th>Chips/Chits</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td>{{ $item }}</td>
                                        <td>{{ $cashs[$key] }}</td>
                                        <td>{{ $chips[$key] }}</td>
                                        <td>{{ $total[$key] }}</td>
                                        {{-- <td>{{ $cashs[$key] }}</td> --}}
                                    </tr>
                                @endforeach
                            <tfoot class="table-group-divider">
                                <tr align="right">
                                    <td colspan="6">
                                        <h5>Total Amount: {{ $totalAmountByType }}</h5>
                                    </td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>

                <a class="text-center" href="/admin/logs/download-dailyStockSales-report">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Download in PDF
                    </div>
                </a>

            </div>
        </div>
        <div class="tab-pane fade" id="pills-totFat" role="tabpanel" aria-labelledby="pills-totFat-tab">
            <div class="col-12">
                <h1> <strong> January 2023 Weekly Sales</strong></h1>
                {!! $thisWeekSalesChart->container() !!}
                <script src="{{ $thisWeekSalesChart->cdn() }}"></script>
                {{ $thisWeekSalesChart->script() }}
                <h1> <strong> 2022 Monthly Sales</strong></h1>
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





        <hr class="mx-4 my-4">
        <br>


    </section>

</x-admin.layout>
