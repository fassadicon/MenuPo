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
                    <th>Created By</th>
                    <th>Updated At</th>
                    <th>Last Updated By</th>
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
                    <th>Created By</th>
                    <th>Updated At</th>
                    <th>Last Updated By</th>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- Parent Account Details Modal --}}
    <div class="modal fade" id="viewStudentInfoModal" tabindex="-1" aria-labelledby="viewStudentInfoModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="viewStudentInfoModalLabel"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="studentID" id="studentID">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <p id="email" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="recoveryEmail">Recovery Email</label>
                                <p id="recoveryEmail" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="students">Students</label>
                                <div id="students"></div>
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="firstName">First Name</label>
                                <p id="firstName" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="lastName">Last Name</label>
                                <p id="lastName" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="middleName">Middle Name</label>
                                <p id="middleName" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="suffix">Suffix</label>
                                <p id="suffix" class="form-control"></p>
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="sex">Sex</label>
                                <p id="sex" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="birthDate">Birth Date</label>
                                <p id="birthDate" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <p id="address" class="form-control"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="created_by">Created By</label>
                            <p id="created_by" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="created_at">Created At</label>
                            <p id="created_at" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="updated_by">Last Updated By</label>
                            <p id="updated_by" class="form-control"></p>
                        </div>
                        <div class="mb-3">
                            <label for="updated_at">Last Updated At</label>
                            <p id="updated_at" class="form-control"></p>
                        </div>
                    </div>
                    {{--  <div class="mb-3">
                            <label for="">Description</label>
                            <p id="description" class="form-control"></p>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Profile Picture Modal --}}
    <div class="modal fade" id="viewImgModal" tabindex="-1" aria-labelledby="viewImgModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewImgModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="foodID" id="foodID">
                    <div class="mb-3">
                        <img src="" alt="" id="image" class="form-control" width="100"
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
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'firstName',
                        name: 'firstName',
                    },
                    {
                        data: 'lastName',
                        name: 'lastName'
                    },
                    {
                        data: 'middleName',
                        name: 'middleName',
                    },
                    {
                        data: 'suffix',
                        name: 'suffix',
                    },
                    {
                        data: 'students',
                        name: 'students',
                        render: function(data, type, row) {
                            return $.map(data, function(value, i) {
                                return value.firstName + ' ' + value.lastName;
                            }).join('<br>');
                        }
                    },
                    {
                        data: 'user.email',
                        name: 'user.email',
                    },
                    {
                        data: 'user.recoveryEmail',
                        name: 'user.recoveryEmail',
                    },
                    {
                        data: 'sex',
                        name: 'sex',
                    },
                    {
                        data: 'address',
                        name: 'address',
                    },
                    {
                        data: 'birthDate',
                        name: 'birthDate',
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            return data == 1 ? 'Active' : 'Inactive';
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'admin.firstName',
                        name: 'admin.name',
                        render: function(data, type, row) {
                            return row.admin.firstName + ' ' + row.admin.lastName;
                        }
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                    },
                    {
                        data: 'admin_updated',
                        name: 'admin_updated',
                        render: function(data, type, row) {
                            return data.firstName;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                // columnDefs: [{
                //         target: 4,
                //         visible: false,
                //     },
                //     {
                //         target: 7,
                //         visible: false,
                //     },
                //     {
                //         target: 8,
                //         visible: false,
                //     },
                //     {
                //         target: 9,
                //         visible: false,
                //     },
                //     {
                //         target: 10,
                //         visible: false,
                //     },
                //     {
                //         target: 11,
                //         visible: false,
                //     },
                //     {
                //         target: 12,
                //         visible: false,
                //     },
                //     {
                //         target: 13,
                //         visible: false,
                //     },
                //     {
                //         target: 14,
                //         visible: false,
                //     },
                //     {
                //         targets: -1,
                //         data: null,
                //         defaultContent: '<button>Click!</button>',
                //     },
                // ],

            });

            // View Student Picture Modal
            $('body').on('click', '.viewImage', function() {
                var guardianID = $(this).data('id');
                $.get("{{ url('admin/guardians/') }}" + '/' + guardianID + '/view', function(data) {
                    $('#viewImgModalLabel').text('Image of ' + data.guardian.firstName + ' ' + data
                        .guardian.lastName);
                    $('#image').attr('src', "{{ URL::asset('storage/') }}" + '/' + data.guardian
                        .image);
                    $('#viewImgModal').modal('show');
                })
            });
            // View Student Details Modal
            $('body').on('click', '.viewParentDetails', function() {
                var guardianID = $(this).data('id');
                $.get("{{ url('admin/guardians/') }}" + '/' + guardianID + '/view', function(data) {
                    $('#viewStudentInfoModalLabel').text('Account Information of ' + data.guardian
                        .firstName + ' ' + data
                        .guardian.lastName);
                    $('#email').text(data.guardian.user.email);
                    $('#recoveryEmail').text(data.guardian.user.recoveryEmail);
                    $('#firstName').text(data.guardian.firstName);
                    $('#lastName').text(data.guardian.lastName);
                    $('#middleName').text(data.guardian.middleName);
                    $('#suffix').text(data.guardian.suffix);
                    $('#sex').text(data.guardian.sex);
                    $('#address').text(data.guardian.sex);
                    $('#birthDate').text(data.guardian.birthDate);
                    $('#created_at').text(data.created_atFormatted);
                    $('#updated_at').text(data.updated_atFormatted);
                    $('#created_by').text(data.guardian.admin.firstName + ' ' + data.guardian.admin
                        .lastName);
                    $('#updated_by').text(data.guardian.admin_updated.firstName + ' ' + data.guardian.admin_updated
                        .lastName);
                    $('#viewStudentInfoModal').modal('show');

                    var studentsHTML = '';
                    $('#students').html('');
                    $.each(data.guardian.students, function(i, value) {
                        studentsHTML += '<p>' + value.firstName + ' ' + value.lastName +
                            '</p>';
                    });
                    $('#students').append(studentsHTML);

                })
            });

            // End of Scripts
        });
    </script>

</x-admin.layout>
