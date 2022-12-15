<x-admin.layout :notifs='$adminNotifs'>
<section class="survey-card">
    <div class="header-page">
        <p><i class="fas fa-poll fa-xl"></i>Parent's Survey</p>
        </div>
        <hr class="mx-4 my-4">
        
      
    <div class="card-body">
        <div class="row">
            {{-- Start of Card --}}
            <div class="row-parent row">
            <div class="col-sm-6">
                <div class="card-survey card_red text-center">
                    {{-- Canteen Rating Pie Chart --}}
                        {!! $ratingChart->container() !!}

                        <script src="{{ $ratingChart->cdn() }}"></script>

                        {{ $ratingChart->script() }}
                
                </div>
            </div>
            {{-- Rating average Card --}}
            <div class="col-sm-6">
            <div class="row-top row">
            <div class="col-sm-6">
                <div class="card-survey card_red text-center">
                <h1>Rating Average Card</h1>
                <h1 class="h1" id="ratingCard">{{ $averageRating}}</h1>
                </div>
            </div>
            </div>
            {{-- Most suggested Food --}}
           
            <div class="row">
            <div class="col-sm-6">
                <div class="card-survey card_red text-center">
                <h1>Most Suggested Food</h1>
                <br>
                <h1 class="card-list" id="mostSuggestedFoodsCard">
                    @foreach ($mostSuggestedFoods as $mostSuggestedFood)
                        <li>{{$mostSuggestedFood}}</li>
                    @endforeach
                </h1>
            </div>
            </div>
            </div>
            </div>
        </div>
        {{-- Start of Card --}}
        <div class="row-mid row">
            {{-- Most suggested Meals --}}
            <div class="col-12">
                <div class="card-survey card_red text-center">
                {!! $suggestionChart->container() !!}

                <script src="{{ $suggestionChart->cdn() }}"></script>

                {{ $suggestionChart->script() }}
                </div>
                </div>
            </div>
            <div class="row">
                <div class="column-table col-12">
                    <div class="card-survey card_red text-center">
                    <table class="table table-hover table-sm" id="foodTable">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Rating</th>
                                <th>Suggestions</th>
                                <th>Comment</th>
                                <th>Answered At</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        
        </div>
    
 
    {{-- <div class="row">
    <div class="col-12">
        <div class="card-survey card_red text-center">
            <div class="card-survey card_red text-center">
                <h1>Parent Recommendation Survey Table</h1>
            </div>
        </div>
    </div> --}}
    <a class="w-full text-center mr-4" href="/admin/reports/download-survey-report">
        <div
            class="block  text-secondary text-smfont-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
            Download in PDF
        </div>
    </a>
    </div>

    <div class="table-bottom">

            {{-- DataTable Resources Scripts --}}
            @include('partials.admin._DataTableScripts')
            {{-- Scripts --}}
            <script type="text/javascript">
                // DataTables Script
                $(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var table = $('#foodTable').DataTable({
                        dom: "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-4'f><'col-sm-12 col-md-3'B>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                        // buttons: [
                        //     'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                        // ],
                        buttons: [{
                                extend: "csv",
                                text: "",
                                className: "fred bi bi-filetype-csv",
                                title: "Food Items"
                            },
                            {
                                extend: "excel",
                                text: "",
                                className: "fred bi bi bi-filetype-xlsx",
                                title: "Food Items"
                            },
                            {
                                extend: "pdf",
                                text: "",
                                className: "fred bi bi-filetype-pdf",
                                title: "Food Items"
                            },
                            {
                                extend: "print",
                                text: "",
                                className: "fred bi bi-printer",
                                title: "Food Items"
                            },
                            {
                                extend: "colvis",
                                text: "",
                                className: "fred bi bi-layout-sidebar-inset-reverse"
                            },
                        ],
                        lengthMenu: [
                            [10, 15, 20, 25, 30, 50, 100],
                            [10, 15, 20, 25, 30, 50, 100]
                        ],
                        processing: true,
                        serverSide: true,
                        ajax: {
                            type: "GET",
                            url: "{{ route('survey.table') }}",
                            // data: function(d) {

                            // },
                            // dataFilter: function(data) {
                            //     var json = JQuery.parseJSON(data);
                            //     json.draw = json.draw;
                            //     json.recordsFiltered = json.total;
                            //     json.recordsTotal = json.total;
                            //     json.data = json.data;
                            //     return JSON.stringify(json);
                            // }
                        },

                        columns: [
                            { // 1
                                data: 'name',
                                name: 'name',
                                render: function(data, type, row) {
                                    return data == null ? 'N/A' : data;
                                }
                            },
                            { // 2
                                data: 'rating',
                                name: 'rating',
                                render: function(data, type, row) {
                                    return data == null ? 'N/A' : data;
                                }
                            },
                            { // 3
                                data: 'suggestions',
                                name: 'suggestions',
                                render: function(data, type, row) {
                                    return data == null ? 'N/A' : data;
                                }
                            },
                            { // 4
                                data: 'comment',
                                name: 'comment',
                                render: function(data, type, row) {
                                    return data == null ? 'N/A' : data;
                                }
                            },
                            { // 15
                                data: 'created_at_formatted',
                                name: 'created_at_formatted',
                            },
                        ],

                        // columnDefs: [{
                        //         target: 2,
                        //         visible: false,
                        //     },
                        //     {
                        //         target: 6,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 7,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 8,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 9,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 10,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 11,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 12,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 13,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 14,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 15,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 16,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 17,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         target: 18,
                        //         visible: false,
                        //         searchable: false,
                        //     },
                        //     {
                        //         targets: -1,
                        //         data: null,
                        //         defaultContent: '<button>Click!</button>',
                        //     },
                        // ],
                    });

                });
            </script>
            </div>
    </div>
</div>

</section>
</x-admin.layout>