<x-admin.layout :notifs="$adminNotifs">
  <div class="row">
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
  </div>
  
</x-admin.layout>
