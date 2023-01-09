<x-admin.layout :notifs='$adminNotifs'>
    <h1 class="h3">Mass Update BMI</h1>
  <div class="card">
    <form method="POST" action="{{ route('students.updateBMI') }}" enctype="multipart/form-data">
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
                <th>Q1Height</th>
                <th>Q1Weight</th>
                <th>Q1BMI</th>
                <th>Q2Height</th>
                <th>Q2Weight</th>
                <th>Q2BMI</th>
                <th>Q3Height</th>
                <th>Q3Weight</th>
                <th>Q3BMI</th>
                <th>Q4Height</th>
                <th>Q4Weight</th>
                <th>Q4BMI</th>
                <th>Created bY</th>
                <th>Created At</th>
                <th>Last Updated By</th>
                <th>Last Updated At</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
@include('partials.admin._DataTableScripts')
<script type="text/javascript">
        // DataTables Script
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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
                    url: "{{ route('students.tableUpdatedBMIStudents') }}"
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
                    { // 6
                        data: 'firstName',
                        name: 'firstName'
                    },
                    { // 7
                        data: 'lastName',
                        name: 'lastName'
                    },
                    { // 10
                        data: 'sex',
                        name: 'sex',
                    },
                    { // 13
                        data: 'bmi.Q1Height',
                        name: 'bmi.Q1Height',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 14
                        data: 'bmi.Q1Weight',
                        name: 'bmi.Q1Weight',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 15
                        data: 'bmi.Q1BMI',
                        name: 'bmi.Q1BMI',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 16
                        data: 'bmi.Q2Height',
                        name: 'bmi.Q2Height',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 17
                        data: 'bmi.Q2Weight',
                        name: 'bmi.Q2Weight',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 18
                        data: 'bmi.Q2BMI',
                        name: 'bmi.Q2BMI',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 19
                        data: 'bmi.Q3Height',
                        name: 'bmi.Q3Height',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 20
                        data: 'bmi.Q3Weight',
                        name: 'bmi.Q3Weight',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 21
                        data: 'bmi.Q3BMI',
                        name: 'bmi.Q3BMI',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 22
                        data: 'bmi.Q4Height',
                        name: 'bmi.Q4Height',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 23
                        data: 'bmi.Q4Weight',
                        name: 'bmi.Q4Weight',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                    { // 24
                        data: 'bmi.Q4BMI',
                        name: 'bmi.Q4BMI',
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
                    { // 18
                        data: 'created_at_formatted',
                        name: 'created_at_formatted',
                    },
                    { // 21
                        data: 'updated_by_name',
                        name: 'updated_by_name',
                        render: function(data, type, row) {
                            return row.updated_by_name.firstName == null ? 'N/A' : row
                                .updated_by_name.firstName + ' ' + row.updated_by_name.lastName;
                        }
                    },
                    { // 19
                        data: 'updated_at_formatted',
                        name: 'updated_at_formatted',
                        render: function(data, type, row) {
                            return data == null ? 'N/A' : data;
                        }
                    },
                ],
                columnDefs: [{
                        target: 0,
                        visible: false,
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
                        target: 20,
                        visible: false,
                        searchable: false,
                    },
                    {
                        target: 21,
                        visible: false,
                        searchable: false,
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

        });
    </script>
</x-admin.layout> 