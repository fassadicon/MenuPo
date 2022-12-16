<x-admin.layout :notifs="$adminNotifs">
  <h1 class="h3">Food Movement Logs</h1>
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
      @foreach ($foodNames as $foodName)
      @foreach ($starts as $start)
      @foreach ($adds as $add)
      @foreach ($solds as $sold)
      @foreach ($ends as $end)
      @foreach ($amounts as $amount)
      <tr>
        <td>{{ $foodName }}</td>
        <td>{{ $start }}</td>
        <td>{{ $add }}</td>
        <td>{{ $sold }}</td>
        <td>{{ $end }}</td>
        <td>{{ $amount }}</td>
      </tr>
      <tfoot class="table-group-divider">
        <tr align="right">
          <td colspan="6">
            <h5>Total Amount: {{$totalAmount}}</h5>
          </td>
        </tr>
      </tfoot>
      @endforeach
      @endforeach
      @endforeach
      @endforeach
      @endforeach
      @endforeach
    </tbody>
  </table>
  
  
  {{-- <div class="row">
    <div class="col-2">
      <h1>Name</h1>
      @foreach ($foodNames as $foodName)
          <h1>{{ $foodName }}</h1>
      @endforeach
    </div>
    <div class="col-2">
      <h1>Start</h1>
      @foreach ($starts as $start)
          <h1>{{ $start }}</h1>
      @endforeach
    </div>
    <div class="col-2">
      <h1>Add</h1>
      @foreach ($adds as $add)
          <h1>{{ $add }}</h1>
      @endforeach
    </div>
    <div class="col-2">
      <h1>Sold</h1>
      @foreach ($solds as $sold)
          <h1>{{ $sold }}</h1>
      @endforeach
    </div>
    <div class="col-2">
      <h1>End</h1>
      @foreach ($ends as $end)
          <h1>{{ $end }}</h1>
      @endforeach
    </div>
    <div class="col-2">
      <h1>Amount (In Pesos)</h1>
      @foreach ($amounts as $amount)
          <h1>{{ $amount }}</h1>
      @endforeach
    </div>
   
  </div>
  <div class="row">
    <h1>Total Amount: {{$totalAmount}}</h1>
  </div> --}}
  
</x-admin.layout>
