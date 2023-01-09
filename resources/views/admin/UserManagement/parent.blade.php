<x-admin.layout :notifs='$adminNotifs'>
    <h1 class="h3">Parent User Management</h1>
    <a href="/admin/guardians/create" class="btn btn-success mb-2"><i class="fas fa-user-plus"></i>&nbsp; Create Parent Account</a>
    <a href="/admin/guardians/trash" class="btn btn-warning mb-2"><i class="fas fa-user-times"></i>&nbsp; Inactive Parent Accounts</a>
    <a href="/admin/logs/guardianAccount" class="btn btn-info mb-2"><i class="fas fa-file-alt"></i>&nbsp;Parent Changes Logs</a>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-window-close fa-xl"></i></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="studentID" id="studentID">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <p id="email" class="form-control"></p>
                            </div>
                           
                         

                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="recoveryEmail">Recovery Email</label>
                                <p id="recoveryEmail" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="students">Students</label>
                                {{-- <div id="students"></div> --}}
                                <p class="form-control" id="students"></p>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="firstName">First Name</label>
                                <p id="firstName" class="form-control"></p>
                            </div>
                          
                          
                           

                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="lastName">Last Name</label>
                                <p id="lastName" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="middleName">Middle Name</label>
                                <p id="middleName" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label for="suffix">Suffix</label>
                                <p id="suffix" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-3">
                                <label for="sex">Sex</label>
                                <p id="sex" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="birthDate">Birth Date</label>
                                <p id="birthDate" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <p id="address" class="form-control"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="created_by">Created By</label>
                                <p id="created_by" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="created_at">Created At</label>
                                <p id="created_at" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="updated_by">Last Updated By</label>
                                <p id="updated_by" class="form-control"></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="updated_at">Last Updated At</label>
                                <p id="updated_at" class="form-control"></p>
                            </div>
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

                },
                columns: [{//0
                        data: 'id',
                        name: 'id'
                    },
                    {//1
                        data: 'firstName',
                        name: 'firstName',
                    },
                    {//2
                        data: 'lastName',
                        name: 'lastName'
                    },
                    {//3
                        data: 'middleName',
                        name: 'middleName',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    {//4
                        data: 'suffix',
                        name: 'suffix',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    {//5
                        data: 'students',
                        name: 'students',
                        render: function(data, type, row) {
                            return $.map(data, function(value, i) {
                                return value.firstName + ' ' + value.lastName;
                            }).join('<br>');
                        }
                    },
                    {//6
                        data: 'user.email',
                        name: 'user.email',
                    },
                    {//7
                        data: 'user.recoveryEmail',
                        name: 'user.recoveryEmail',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    {//8
                        data: 'sex',
                        name: 'sex',
                    },
                    {//9
                        data: 'address',
                        name: 'address',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    {//10
                        data: 'birthDate',
                        name: 'birthDate',
                    },
                    {//11
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            return data == 1 ? 'Active' : 'Inactive';
                        }
                    },
                    {//12
                        data: 'created_at_formatted',
                        name: 'created_at_formatted',
                    },
                    {//13
                        data: 'created_by_name',
                        name: 'created_by_name',
                        render: function(data, type, row) {
                            return row.created_by_name == null ?'Archived Account' : row.created_by_name.firstName + ' ' + row.created_by_name
                                .lastName;
                        }
                    },
                    {//14
                        data: 'updated_at_formatted',
                        name: 'updated_at_formatted',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    {//15
                        data: 'updated_by_name',
                        name: 'updated_by_name',
                        render: function(data, type, row) {
                            return row.updated_by_name.firstName == null ? 'N/A' : row
                                .updated_by_name.firstName + ' ' + row.updated_by_name.lastName;
                        }
                    },
                    {//16
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
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
                    // {
                    //     target: 15,
                    //     visible: false,
                    // },
                    {
                        targets: -1,
                        data: null,
                        defaultContent: '<button>Click!</button>',
                    },
                ],

            });

            // View Student Picture Modal
            $('body').on('click', '.viewImage', function() {
                var guardianID = $(this).data('id');
                $.get("{{ url('admin/guardians/') }}" + '/' + guardianID + '/view', function(data) {
                    $('#viewImgModalLabel').text('Image of ' + data.firstName + ' ' + data
                    .lastName);
                    data.image != null ? $('#image').attr('src', "{{ URL::asset('storage/') }}" +
                        '/' + data.image) : $('#image').attr('src',
                        "{{ URL::asset('storage/admin/userNoImage.png') }}");
                    $('#viewImgModal').modal('show');
                })
            });
            // View Student Details Modal
            $('body').on('click', '.viewParentDetails', function() {
                var guardianID = $(this).data('id');
                $.get("{{ url('admin/guardians/') }}" + '/' + guardianID + '/view', function(data) {
                    $.each(data, function(i, e) {
                        if (data[i] == null) data[i] = 'N/A';
                    });
                    $('#viewStudentInfoModalLabel').text('Account Information of ' + data
                        .firstName + ' ' + data.lastName);
                    $('#email').text(data.user.email);
                    $('#recoveryEmail').text(data.user.recoveryEmail);
                    $('#firstName').text(data.firstName);
                    $('#lastName').text(data.lastName);
                    $('#middleName').text(data.middleName);
                    $('#suffix').text(data.suffix);
                    $('#sex').text(data.sex);
                    $('#address').text(data.address);
                    $('#birthDate').text(data.birthDate);
                    $('#created_at').text(data.created_at_formatted);
                    $('#updated_at').text(data.updated_at_formatted);
                    $('#created_by').text(data.created_by_name.firstName + ' ' + data
                        .created_by_name.lastName)
                    data.updated_by_name.firstName == null ? $('#updated_by').text('N/A') : $(
                        '#updated_by').text(data
                        .updated_by_name.firstName + ' ' + data
                        .updated_by_name.lastName);
                    $('#viewStudentInfoModal').modal('show');

                    let studentList = '';
                    $.each(data.students, function(i, value) {
                        studentList += value.firstName + ' ' + value.lastName + ', ';
                    });
                    $('#students').text(studentList);

                })
            });

            // End of Scripts
        });
    </script>
    <hr class="mx-4 my-4">
    <br>

</x-admin.layout>
