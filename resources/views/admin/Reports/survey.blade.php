<x-admin.layout :notifs='$adminNotifs'>

    <div class="card-body">
        <div class="row">
            
            <div class="col-6">
                {!! $ratingChart->container() !!}

                <script src="{{ $ratingChart->cdn() }}"></script>

                {{ $ratingChart->script() }}
            </div>
            <div class="col-3">
                <h1>Rating Average Card</h1>
                <h1 class="h1" id="ratingCard">{{ $averageRating}}</h1>
            </div>
            <div class="col-3">
                <h1>Most Suggested Food</h1>
                <h1 id="mostSuggestedFoodsCard">
                    @foreach ($mostSuggestedFoods as $mostSuggestedFood)
                        <li>{{$mostSuggestedFood}}</li>
                    @endforeach
                </h1>
            </div>
            <div class="col-12">
                {!! $suggestionChart->container() !!}

                <script src="{{ $suggestionChart->cdn() }}"></script>

                {{ $suggestionChart->script() }}
            </div>
            <div class="col-12">
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
</x-admin.layout>