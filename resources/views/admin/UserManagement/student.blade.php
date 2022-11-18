<x-admin.layout>
    <h1 class="h3">Student Account Management</h1>
    {{-- DATABLE --}}
    <div class="container">
        {{-- <div align="left"><a href="/admin/foods/create" class="btn btn-success mb-2">Create Parent Account</a></div> --}}
        <table class="table table-hover table-sm" id="foodTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>Adviser</th>
                    <th>LRN</th>
                    <th>Parent</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Middle Name</th>
                    <th>Suffix</th>
                    <th>Sex</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>BMI</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Created by</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>Adviser</th>
                    <th>LRN</th>
                    <th>Parent</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Middle Name</th>
                    <th>Suffix</th>
                    <th>Sex</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>BMI</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Created by</th>
                </tr>
            </tfoot>
        </table>
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
                    url: "{{ route('students.index') }}"
                },
                // Footer Sorting
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column.search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append('<option value="' + d + '">' + d +
                                        '</option>');
                                });
                        });
                },
                columns: [{ // 0
                        data: 'id',
                        name: 'id'
                    },
                    { // 1
                        data: 'grade',
                        name: 'grade'
                    },
                    { // 2
                        data: 'section',
                        name: 'section'
                    },
                    { // 3
                        data: 'adviser',
                        name: 'adviser'
                    },
                    { // 4
                        data: 'LRN',
                        name: 'LRN'
                    },
                    { // 5
                        data: 'guardian.firstName',
                        name: 'guardian.firstName',
                        render: function(data, type, row) {
                            return row.guardian.firstName + ' ' + row.guardian.lastName;
                        }
                    },
                    { // 6
                        data: 'firstName',
                        name: 'firstName'
                    },
                    { // 7
                        data: 'lastName',
                        name: 'lastName'
                    },
                    { // 8
                        data: 'middleName',
                        name: 'middleName'
                    },
                    { // 9
                        data: 'suffix',
                        name: 'suffix'
                    },
                    { // 10
                        data: 'sex',
                        name: 'sex',
                    },
                    { // 11
                        data: 'birthDate',
                        name: 'birthDate',
                    },
                    { // 12
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            return data == 1 ? 'Active' : 'Inactive';
                        }
                    },
                    { // 13
                        data: 'height',
                        name: 'height',
                    },
                    { // 14
                        data: 'weight',
                        name: 'weight',
                    },
                    { // 15
                        data: 'BMI',
                        name: 'BMI',
                    },
                    { // 18
                        data: 'created_at',
                        name: 'created_at',
                    },
                    { // 19
                        data: 'updated_at',
                        name: 'updated_at',
                    },
                    { // 20
                        data: 'created_by',
                        name: 'created_by',
                        render: function(data, type, row) {
                            return row.admin.firstName + ' ' + row.admin.lastName;
                        }
                    },
                    { // 21
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        target: 0,
                        visible: false,
                    }, 
                    {
                        target: 3,
                        visible: false,
                    }, 
                    {
                        target: 4,
                        visible: false,
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
        });
    </script>

</x-admin.layout>
