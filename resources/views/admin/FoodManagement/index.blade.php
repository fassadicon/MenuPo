<x-admin.layout :notifs='$adminNotifs'>
    
    <h1 class="h3">Food Item Management</h1>
    {{-- DATABLE --}}
    <div class="container">
        <div align="left"><a href="/admin/foods/create" class="btn btn-success mb-2">Create Food Item</a></div>
        <div align="left"><a href="/admin/foods/trash" class="btn btn-success mb-2">Archived Food Item</a></div>
        <table class="table table-hover table-sm" id="foodTable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>PhilFCT ID</th>
                    <th>Serving Size</th>
                    <th>Kcal</th>
                    <th>Total Fat</th>
                    <th>Saturated Fat</th>
                    <th>Added Sugar</th>
                    <th>Sodium</th>
                    <th>Grade</th>
                    <th>Color</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Created by</th>
                    <th>Last Updated By</th>
                    <th>Options</th>
                    {{-- <th width="50px"><button type="button" name="bulk_delete" id="bulk_delete"
                            class="btn btn-danger">Delete</button></th> --}}
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
    <!-- Nutrient Data Modal -->
    <div class="modal fade" id="viewFoodInfoModal" tabindex="-1" aria-labelledby="viewFoodInfoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="viewFoodInfoModalLabel"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="foodID" id="foodID">
                    <div class="row">
                        <div class="mb-3">
                            <label for="">Description</label>
                            <p id="description" class="form-control"></p>
                        </div>
                        <div class="col-6">

                            <div class="mb-3">
                                <label for="">Color</label>
                                <p id="color" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Energy, calculated (kcal)</label>
                                <p id="calcKcal" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Total Fat (g)</label>
                                <p id="calcTotFat" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Saturated Fat (g)</label>
                                <p id="calcSatFat" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Sugars (g)</label>
                                <p id="calcSugar" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Sodium (mg)</label>
                                <p id="calcSodium" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="">Nutrient Grade</label>
                                <p id="grade" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Serving Size</label>
                                <p id="servingSize" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Created by</label>
                                <p id="created_by" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Created at</label>
                                <p id="created_at" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Last Updated at</label>
                                <p id="updated_at" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="">Last Updated By</label>
                                <p id="updated_by" class="form-control"></p>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- Food Image Modal --}}
    <div class="modal fade" id="viewFoodImgModal" tabindex="-1" aria-labelledby="viewFoodImgModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewFoodImgModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="foodID" id="foodID">
                    <div class="mb-3">
                        <img src="" alt="" id="imageFood" class="form-control" width="100"
                            height="200" />
                    </div>
                </div>
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
                    url: "{{ route('food.index') }}",
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

                columns: [{ // 0
                        data: 'id',
                        name: 'id'
                    },
                    { // 1
                        data: 'name',
                        name: 'name'
                    },
                    { // 2
                        data: 'description',
                        name: 'description',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 3
                        data: 'type',
                        name: 'type'
                    },
                    { // 4
                        data: 'price',
                        name: 'price'
                    },
                    { // 5
                        data: 'stock',
                        name: 'stock',
                    },
                    { // 6
                        data: 'philfct_id',
                        name: 'philfct_id',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 7
                        data: 'servingSize',
                        name: 'servingSize',
                    },
                    { // 8
                        data: 'calcKcal',
                        name: 'calcKcal',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 9
                        data: 'calcTotFat',
                        name: 'calcTotFat',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 10
                        data: 'calcSatFat',
                        name: 'calcSatFat',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 11
                        data: 'calcSugar',
                        name: 'calcSugar',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 12
                        data: 'calcSodium',
                        name: 'calcSodium',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 13
                        data: 'grade',
                        name: 'grade',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 14
                        data: 'grade',
                        name: 'gradeColor',
                        render: function(data, type, row) {
                            if (data <= 0) {
                                return 'Gray';
                            } else if (data <= 6) {
                                return 'Green';
                            } else if (data <= 9) {
                                return 'Amber';
                            } else if (data <= 12) {
                                return 'Red';
                            } else {
                                return null;
                            }
                        }
                    },
                    { // 15
                        data: 'created_at_formatted',
                        name: 'created_at_formatted',
                    },
                    { // 16
                        data: 'updated_at_formatted',
                        name: 'updated_at_formatted',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 17
                        data: 'created_by_name',
                        name: 'created_by_name',
                        render: function(data, type, row) {
                            return row.created_by_name == null ?'Archived Account' : row.created_by_name.firstName + ' ' + row.created_by_name
                                .lastName;
                        }
                    },
                    { // 18
                        data: 'updated_by_name.firstName',
                        name: 'updated_by_name',
                        render: function(data, type, row) {
                            return row.updated_by_name.firstName == null ? 'N/A' : row
                                .updated_by_name.firstName + ' ' + row.updated_by_name.lastName;
                        }
                    },
                    { // 19
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                    // {
                    //     data: 'checkbox',
                    //     name: 'checkbox',
                    //     orderable: false,
                    //     searchable: false
                    // },
                ],

                columnDefs: [{
                        target: 2,
                        visible: false,
                    },
                    {
                        target: 6,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 7,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 8,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 9,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 10,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 11,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 12,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 13,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 14,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 15,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 16,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 17,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 18,
                        visible: false,
                        searchable: false,
                    },
                    {
                        targets: -1,
                        data: null,
                        defaultContent: '<button>Click!</button>',
                    },
                ],
            });
            // Highlight Values in Table
            // $('#foodTable tbody').on('mouseenter', 'td', function() {
            //     var colIdx = table.cell(this).index().column;

            //     $(table.cells().nodes()).removeClass('highlight');
            //     $(table.column(colIdx).nodes()).addClass('highlight');
            // });
            // View Food Data Modal
            $('body').on('click', '.viewFood', function() {
                var foodID = $(this).data('id');
                $.get("{{ url('admin/foods/') }}" + '/' + foodID + '/view', function(data) {
                    $.each(data, function(i, e) {
                        if (data[i] == null) data[i] = 'N/A';
                    });
                    $('#viewFoodInfoModalLabel').text('Nutritional Information of ' + data.name);
                    $('#description').text(data.description);
                    $('#servingSize').text(data.servingSize);
                    $('#calcKcal').text(data.calcKcal);
                    $('#calcTotFat').text(data.calcTotFat);
                    $('#calcSatFat').text(data.calcSatFat);
                    $('#calcSugar').text(data.calcSugar);
                    $('#calcSodium').text(data.calcSodium);
                    let grade = data.grade
                    $('#grade').text(grade);
                    if (grade <= 0) {
                        $('#color').text('Gray');
                    } else if (grade <= 6) {
                        $('#color').text('Green');
                    } else if (grade <= 9) {
                        $('#color').text('Amber');
                    } else if (grade <= 12) {
                        $('#color').text('Red');
                    } else {
                        $('#color').text('Ungraded');
                    }
                    $('#created_at').text(data.created_at_formatted);
                    $('#updated_at').text(data.updated_at_formatted);
                    $('#created_by').text(data.created_by_name.firstName + ' ' + data.created_by_name.lastName);
                    data.updated_by_name.firstName == null ? $('#updated_by').text('N/A') : $(
                        '#updated_by').text(data
                        .updated_by_name.firstName + ' ' + data
                        .updated_by_name.lastName);
                    $('#viewFoodInfoModal').modal('show');

                })
            });
            // View Food Image Modal
            $('body').on('click', '.viewFoodImg', function() {
                var foodID = $(this).data('id');
                $.get("{{ url('admin/foods/') }}" + '/' + foodID + '/view', function(data) {
                    $('#viewFoodImgModalLabel').text('Image of ' + data.name);
                    $('#imageFood').attr('src', "{{ URL::asset('storage/') }}" + '/' + data.image);
                    $('#viewFoodImgModal').modal('show');
                })
            });

            $('body').on('click', '.archiveBtn', function() {
                Swal.fire('Archived');
            });
        });
    </script>

</x-admin.layout>
