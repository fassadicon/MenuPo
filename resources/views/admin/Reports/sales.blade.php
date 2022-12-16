<x-admin.layout :notifs='$adminNotifs'>
  {{-- Saturated Fat --}}
  <div class="row">
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
</x-admin.layout>
