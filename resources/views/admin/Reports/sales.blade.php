<x-admin.layout :notifs='$adminNotifs'>
  {{-- Saturated Fat --}}
  <div class="row">
    <div class="col-4">
      <h1>Monthly Sales</h1>
      {!! $monthlySalesChart->container() !!}
      <script src="{{ $monthlySalesChart->cdn() }}"></script>
      {{ $monthlySalesChart->script() }}
    </div>
  </div>
</x-admin.layout>
