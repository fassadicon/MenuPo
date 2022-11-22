<x-admin.layout>
    <h1 class="h3">Student Account Management</h1>
    {{-- DATABLE --}}
    <a href="/admin/students/create" class="btn btn-primary mb-2">Create Student Account</a>
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

    {{-- Student Data Modal --}}
    <!-- Nutrient Data Modal -->
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

    {{-- Profile Picture Modal --}}
    <div class="modal fade" id="viewImgModal" tabindex="-1" aria-labelledby="viewImgModalLabel"
        aria-hidden="true">
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
            // View QR Modal
            $('body').on('click', '.viewQR', function() {
                var studentID = $(this).data('id');
                $.get("{{ url('admin/students/') }}" + '/' + studentID + '/view', function(data) {
                    $('#viewQRModalLabel').text('Image of ' + data.student.firstName + ' ' + data
                        .student.lastName);
                    $('#imageQR').attr('src', "{{ URL::asset('storage/') }}" + '/' + data.student
                        .QR);
                    $('#viewQRModal').modal('show');
                })
            });
            // View Student Picture Modal
            $('body').on('click', '.viewImage', function() {
                var studentID = $(this).data('id');
                $.get("{{ url('admin/students/') }}" + '/' + studentID + '/view', function(data) {
                    $('#viewImgModalLabel').text('QR Code of ' + data.student.firstName + ' ' + data
                        .student.lastName);
                    $('#image').attr('src', "{{ URL::asset('storage/') }}" + '/' + data.student
                        .image);
                    $('#viewImgModal').modal('show');
                })
            });
            // View Student Details Modal
            $('body').on('click', '.viewStudentDetails', function() {
                var studentID = $(this).data('id');
                $.get("{{ url('admin/students/') }}" + '/' + studentID + '/view', function(data) {
                    $('#viewStudentInfoModalLabel').text('Account Information of ' + data.student.firstName + ' ' + data
                        .student.lastName);
                    $('#parent').text(data.student.guardian.firstName + ' ' + data.student.guardian.lastName);
                    $('#LRN').text(data.student.LRN);
                    $('#grade').text(data.student.grade);
                    $('#section').text(data.student.section);
                    $('#adviser').text(data.student.adviser);
                    $('#firstName').text(data.student.firstName);
                    $('#lastName').text(data.student.lastName);
                    $('#middleName').text(data.student.middleName);
                    $('#suffix').text(data.student.suffix);
                    $('#sex').text(data.student.sex);
                    $('#birthDate').text(data.student.birthDate);
                    $('#height').text(data.student.height);
                    $('#weight').text(data.student.weight);
                    $('#BMI').text(data.student.BMI);
                    $('#created_at').text(data.created_atFormatted);
                    $('#updated_at').text(data.updated_atFormatted);
                    $('#created_by').text(data.student.admin.firstName + ' ' + data.student.admin
                        .lastName);
                    $('#updated_by').text(data.updatedByAdminName);
                    $('#viewStudentInfoModal').modal('show');
                })
            });
        });
    </script>

</x-admin.layout>
