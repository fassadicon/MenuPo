<x-admin.layout :notifs="$adminNotifs">
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

</x-admin.layout>
