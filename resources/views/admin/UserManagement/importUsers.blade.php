<x-admin.layout>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Import Users</h6>
        </div>
        <form method="POST" action="{{ route('imports.upload') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                    {{-- File Input --}}
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>File Input(Datasheet)</label>
                        <input type="file" class="form-control form-control-user @error('file') is-invalid @enderror"
                            id="file" name="file" value="{{ old('file') }}">

                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Upload Users</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="">Cancel</a>
                {{-- <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a> --}}
            </div>
        </form>
        {{-- DATABLE --}}
        <div class="container">
            <h1>Imported Parents</h1>
            {{-- <div align="left"><a href="/admin/foods/create" class="btn btn-success mb-2">Create Parent Account</a></div> --}}
            <table class="table table-hover table-sm" id="parentTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Suffix</th>
                        <th>Student/s</th>
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
            </table>
        </div>
        <div class="container">
            <h1>Imported Students</h1>
            {{-- <div align="left"><a href="/admin/foods/create" class="btn btn-success mb-2">Create Parent Account</a></div> --}}
            <table class="table table-hover table-sm" id="studentTable">
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
                        <th>Last Updated by</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
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

    {{-- Student Data Modal --}}
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
                                <label for="parent">Parent</label>
                                <p id="parent" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="LRN">LRN</label>
                                <p id="LRN" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="grade">Grade</label>
                                <p id="grade" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="section">Section</label>
                                <p id="section" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="adviser">Adviser</label>
                                <p id="adviser" class="form-control"></p>
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
                                <label for="height">Height</label>
                                <p id="height" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="weight">Weight</label>
                                <p id="weight" class="form-control"></p>
                            </div>
                            <div class="mb-3">
                                <label for="BMI">BMI</label>
                                <p id="BMI" class="form-control"></p>
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

    {{-- QR Modal --}}
    <div class="modal fade" id="viewQRModal" tabindex="-1" aria-labelledby="viewQRModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewQRModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="foodID" id="foodID">
                    <div class="mb-3">
                        <img src="" alt="" id="imageQR" class="form-control" width="100"
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
            var table1 = $('#parentTable').DataTable({
                dom: "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-4'f><'col-sm-12 col-md-3'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [{
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
                responsive: true,
                ajax: {
                    type: "GET",
                    url: "{{ route('imports.viewImportedGuardians') }}"
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
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    {
                        data: 'suffix',
                        name: 'suffix',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
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
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    {
                        data: 'sex',
                        name: 'sex',
                    },
                    {
                        data: 'address',
                        name: 'address',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
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
                        data: 'created_at_formatted',
                        name: 'created_at_formatted',
                    },
                    {
                        data: 'created_by_name.firstName',
                        name: 'created_by_name.firstName',
                        render: function(data, type, row) {
                            return row.created_by_name.firstName + ' ' + row.created_by_name
                                .lastName;
                        }
                    },
                    {
                        data: 'updated_at_formatted',
                        name: 'updated_at_formatted',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    {
                        data: 'updated_by_name',
                        name: 'updated_by_name',
                        render: function(data, type, row) {
                            return row.updated_by_name.firstName == null ? 'N/A' : row
                                .updated_by_name.firstName + ' ' + row.updated_by_name.lastName;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        target: 0,
                        visible: false,
                    }, {
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
                        target: 15,
                        visible: false,
                    },
                    {
                        targets: -1,
                        data: null,
                        defaultContent: '<button>Click!</button>',
                    },
                ],

            });



            var table2 = $('#studentTable').DataTable({
                dom: "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-4'f><'col-sm-12 col-md-3'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                buttons: [{
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
                    url: "{{ route('imports.viewImportedStudents') }}"
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
                        name: 'middleName',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 9
                        data: 'suffix',
                        name: 'suffix',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
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
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 14
                        data: 'weight',
                        name: 'weight',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 15
                        data: 'BMI',
                        name: 'BMI',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 18
                        data: 'created_at_formatted',
                        name: 'created_at_formatted',
                    },
                    { // 19
                        data: 'updated_at_formatted',
                        name: 'updated_at_formatted',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 20
                        data: 'created_by_name.firstName',
                        name: 'created_by_name',
                        render: function(data, type, row) {
                            return row.created_by_name.firstName + ' ' + row.created_by_name
                                .lastName;
                        }
                    },
                    { // 21
                        data: 'updated_by_name',
                        name: 'updated_by_name',
                        render: function(data, type, row) {
                            return row.updated_by_name.firstName == null ? 'N/A' : row
                                .updated_by_name.firstName + ' ' + row.updated_by_name.lastName;
                        }
                    },
                    { // 22
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
                        target: 19,
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

                    var studentsHTML = '';
                    $('#students').html('');
                    $.each(data.students, function(i, value) {
                        studentsHTML += '<p>' + value.firstName + ' ' + value.lastName +
                            '</p>';
                    });
                    $('#students').append(studentsHTML);

                })
            });
            
            // View QR Modal
            $('body').on('click', '.viewQR', function() {
                var studentID = $(this).data('id');
                $.get("{{ url('admin/students/') }}" + '/' + studentID + '/view', function(data) {
                    $('#viewQRModalLabel').text('Image of ' + data.firstName + ' ' + data.lastName);
                    $('#imageQR').attr('src', "{{ URL::asset('storage/') }}" + '/' + data.QR);
                    $('#viewQRModal').modal('show');
                })
            });

            // View Student Details Modal
            $('body').on('click', '.viewStudentDetails', function() {
                var studentID = $(this).data('id');
                $.get("{{ url('admin/students/') }}" + '/' + studentID + '/view', function(data) {
                    $.each(data, function(i, e) {
                        if (data[i] == null) data[i] = 'N/A';
                    });
                    $('#viewStudentInfoModalLabel').text('Account Information of ' + data
                        .firstName + ' ' + data.lastName);
                    $('#parent').text(data.guardian.firstName + ' ' + data.guardian.lastName);
                    $('#LRN').text(data.LRN);
                    $('#grade').text(data.grade);
                    $('#section').text(data.section);
                    $('#adviser').text(data.adviser);
                    $('#firstName').text(data.firstName);
                    $('#lastName').text(data.lastName);
                    $('#middleName').text(data.middleName);
                    $('#suffix').text(data.suffix);
                    $('#sex').text(data.sex);
                    $('#birthDate').text(data.birthDate);
                    $('#height').text(data.height);
                    $('#weight').text(data.weight);
                    $('#BMI').text(data.BMI);
                    $('#created_at').text(data.created_at_formatted);
                    $('#updated_at').text(data.updated_at_formatted);
                    $('#created_by').text(data.created_by_name.firstName + ' ' + data
                        .created_by_name.lastName);
                    data.updated_by_name.firstName == null ? $('#updated_by').text('N/A') : $(
                        '#updated_by').text(data
                        .updated_by_name.firstName + ' ' + data
                        .updated_by_name.lastName);
                    $('#viewStudentInfoModal').modal('show');
                })
            });

            // var table3 = $('#adminTable').DataTable({
            //     dom: "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-4'f><'col-sm-12 col-md-3'B>>" +
            //         "<'row'<'col-sm-12'tr>>" +
            //         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            //     buttons: [
            //         {
            //             extend: "pdf",
            //             text: "",
            //             className: "fred bi bi-filetype-pdf",
            //             title: "Food Items"
            //         },
            //         {
            //             extend: "print",
            //             text: "",
            //             className: "fred bi bi-printer",
            //             title: "Food Items"
            //         },
            //         {
            //             extend: "colvis",
            //             text: "",
            //             className: "fred bi bi-layout-sidebar-inset-reverse"
            //         },
            //     ],
            //     lengthMenu: [
            //         [10, 15, 20, 25, 30, 50, 100],
            //         [10, 15, 20, 25, 30, 50, 100]
            //     ],
            //     processing: true,
            //     serverSide: true,
            //     ajax: {
            //         type: "GET",
            //         url: "{{ route('imports.viewImportedAdmins') }}"
            //     },
            //     columns: [{
            //             data: 'id',
            //             name: 'id'
            //         },
            //         {
            //             data: 'firstName',
            //             name: 'firstName',
            //         },
            //         {
            //             data: 'lastName',
            //             name: 'lastName'
            //         },
            //         {
            //             data: 'middleName',
            //             name: 'middleName',
            //             render: function(data, type, row) {
            //                 return data == null ? 'N/A' : data;
            //             }
            //         },
            //         {
            //             data: 'suffix',
            //             name: 'suffix',
            //             render: function(data, type, row) {
            //                 return data == null ? 'N/A' : data;
            //             }
            //         },
            //         {
            //             data: 'user.email',
            //             name: 'user.email',
            //         },
            //         {
            //             data: 'user.recoveryEmail',
            //             name: 'user.recoveryEmail',
            //             render: function(data, type, row) {
            //                 return data == null ? 'N/A' : row.user.recoveryEmail;
            //             }
            //         },
            //         {
            //             data: 'sex',
            //             name: 'sex',
            //         },
            //         {
            //             data: 'address',
            //             name: 'address',
            //             render: function(data, type, row) {
            //                 return data == null ? 'N/A' : data;
            //             }
            //         },
            //         {
            //             data: 'birthDate',
            //             name: 'birthDate',
            //         },
            //         {
            //             data: 'status',
            //             name: 'status',
            //             render: function(data, type, row) {
            //                 return data == 0 ? 'Permanent' : 'Temporary';
            //             }
            //         },
            //         {
            //             data: 'created_at_formatted',
            //             name: 'created_at_formatted',

            //         },
            //         {
            //             data: 'created_by',
            //             name: 'created_by',
            //             render: function(data, type, row) {
            //                 return row.created_by_name.firstName + ' ' + row.created_by_name
            //                     .lastName;
            //             }
            //         },
            //         {
            //             data: 'updated_at_formatted',
            //             name: 'updated_at_formatted',
            //             render: function(data, type, row) {
            //                 return data == null ? 'N/A' : data;
            //             }
            //         },
            //         {
            //             data: 'updated_by',
            //             name: 'updated_by',
            //             render: function(data, type, row) {
            //                 return row.updated_by_name.firstName == null ? 'N/A' : row
            //                     .updated_by_name.firstName + ' ' + row.updated_by_name.lastName;
            //             }

            //         },
            //         {
            //             data: 'action',
            //             name: 'action',
            //             orderable: false,
            //             searchable: false
            //         }
            //     ],
            //     columnDefs: [{
            //             target: 4,
            //             visible: false,
            //         },
            //         {
            //             target: 6,
            //             visible: false,
            //         },
            //         {
            //             target: 7,
            //             visible: false,
            //         },
            //         {
            //             target: 8,
            //             visible: false,
            //         },
            //         {
            //             target: 9,
            //             visible: false,
            //         },
            //         {
            //             target: 10,
            //             visible: false,
            //         },
            //         {
            //             target: 11,
            //             visible: false,
            //         },
            //         {
            //             target: 12,
            //             visible: false,
            //         },
            //         {
            //             target: 13,
            //             visible: false,
            //         },
            //         {
            //             target: 14,
            //             visible: false,
            //         },
            //         {
            //             targets: -1,
            //             data: null,
            //             defaultContent: '<button>Click!</button>',
            //         },
            //     ],

            // });
        });
    </script>
</x-admin.layout>
