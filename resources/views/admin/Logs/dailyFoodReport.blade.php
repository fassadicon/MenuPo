<x-admin.layout :notifs="$adminNotifs">
    <h1 class="h3">Daily Report</h1>
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
    <div class="row">
        <h1>Total Amount: {{ $totalAmount }}</h1>
    </div>

</x-admin.layout>
