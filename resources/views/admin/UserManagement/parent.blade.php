<x-admin.layout>
    <h1 class="h3">Parent User Management</h1>
    <a href="/admin/guardians/create" class="btn btn-primary mb-2">Create Parent Account</a>
    {{-- DATABLE --}}
    <div class="container">
        {{-- <div align="left"><a href="/admin/foods/create" class="btn btn-success mb-2">Create Parent Account</a></div> --}}
        <table class="table table-hover table-sm" id="foodTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FN</th>
                    <th>LN</th>
                    <th>MN</th>
                    <th>Suffix</th>
                    <th>Students</th>
                    <th>Email</th>
                    <th>Recovery Email</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Created By</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>FN</th>
                    <th>LN</th>
                    <th>MN</th>
                    <th>Suffix</th>
                    <th>Students</th>
                    <th>Email</th>
                    <th>Recovery Email</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Created By</th>
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
                // serverSide: true,
                ajax: {
                    type: "GET",
                    url: "{{ route('guardians.index') }}"
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
                columns: [{
                        data: 'guardian.id',
                        name: 'guardian.id'
                    },
                    {
                        data: 'guardian.firstName',
                        name: 'guardian.firstName',
                    },
                    {
                        data: 'guardian.lastName',
                        name: 'guardian.lastName'
                    },
                    {
                        data: 'guardian.middleName',
                        name: 'guardian.middleName',
                    },
                    {
                        data: 'guardian.suffix',
                        name: 'guardian.suffix',
                    },
                    {
                        data: 'guardian.students',
                        name: 'guardian.students',
                        render: function(data, type, row) {
                            return $.map(data, function(value, i) {
                                return value.firstName + ' ' + value.lastName;
                            }).join(', ');
                        }
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'recoveryEmail',
                        name: 'recoveryEmail',
                    },
                    {
                        data: 'guardian.sex',
                        name: 'guardian.sex',
                    },
                    {
                        data: 'guardian.address',
                        name: 'guardian.address',
                    },
                    {
                        data: 'guardian.birthDate',
                        name: 'guardian.birthDate',
                    },
                    {
                        data: 'guardian.status',
                        name: 'guardian.status',
                        render: function(data, type, row) {
                            return data == 1 ? 'Active' : 'Inactive';
                        }
                    },
                    {
                        data: 'guardian.created_at',
                        name: 'guardian.created_at',
                    },
                    {
                        data: 'guardian.updated_at',
                        name: 'guardian.updated_at',
                    },
                    {
                        data: 'guardian.admin.firstName',
                        name: 'guardian.admin',
                        render: function(data, type, row) {
                            return row.guardian.admin.firstName + ' ' + row.guardian.admin.lastName;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                    // <th>ID</th> 0
                    // <th>FN</th> 1
                    // <th>LN</th> 2
                    // <th>MN</th> 3
                    // <th>Suffix</th> 4
                    // <th>Students</th> 5
                    // <th>Email</th> 6
                    // <th>Recovery Email</th> 7
                    // <th>Sex</th> 8
                    // <th>Address</th> 9
                    // <th>Birth Date</th> 10
                    // <th>Status</th> 11
                    // <th>Created At</th> 12
                    // <th>Updated At</th> 13
                    // <th>Created By</th> 14
                    // <th>Options</th>
                columnDefs: [{
                        target: 4,
                        visible: false,
                    },
                    {
                        target: 7,
                        visible: false,
                    },
                    {
                        target: 8,
                        visible: false,
                    },
                    {
                        target: 9,
                        visible: false,
                    },
                    {
                        target: 10,
                        visible: false,
                    },
                    {
                        target: 11,
                        visible: false,
                    },
                    {
                        target: 12,
                        visible: false,
                    },
                    {
                        target: 13,
                        visible: false,
                    },
                    {
                        target: 14,
                        visible: false,
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
