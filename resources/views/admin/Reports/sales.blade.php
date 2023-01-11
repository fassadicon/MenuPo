<x-admin.layout :notifs='$adminNotifs'>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                aria-controls="pills-home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                aria-controls="pills-profile" aria-selected="false">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                aria-controls="pills-contact" aria-selected="false">Contact</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">.2</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">3.</div>
    </div>
    {{-- Saturated Fat --}}
    {{-- <div class="row">
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
    </div> --}}
</x-admin.layout>
