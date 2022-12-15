<x-admin.layout :notifs='$adminNotifs'>
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Import Admin Accounts</h6>
      </div>
      <form method="POST" action="{{ route('imports.uploadAdmin') }}" enctype="multipart/form-data">
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
          <h1>Imported Admins</h1>
          {{-- <div align="left"><a href="/admin/foods/create" class="btn btn-success mb-2">Create Parent Account</a></div> --}}
          <table class="table table-hover table-sm" id="adminTable">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>FN</th>
                    <th>LN</th>
                    <th>MN</th>
                    <th>Suffix</th>
                    <th>Email</th>
                    <th>Recovery Email</th>
                    <th>Sex</th>
                    <th>Address</th>
                    <th>Birth Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Created By</th>
                    <th>Updated At</th>
                    <th>Updated By</th>
                    <th>Options</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
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
          var table3 = $('#adminTable').DataTable({
              dom: "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-4'f><'col-sm-12 col-md-3'B>>" +
                  "<'row'<'col-sm-12'tr>>" +
                  "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
              buttons: [
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
                  url: "{{ route('imports.viewImportedAdmins') }}"
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
                      data: 'user.email',
                      name: 'user.email',
                  },
                  {
                      data: 'user.recoveryEmail',
                      name: 'user.recoveryEmail',
                      render: function(data, type, row) {
                          return data == null ? 'N/A' : row.user.recoveryEmail;
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
                          return data == 0 ? 'Permanent' : 'Temporary';
                      }
                  },
                  {
                      data: 'created_at_formatted',
                      name: 'created_at_formatted',

                  },
                  {
                      data: 'created_by',
                      name: 'created_by',
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
                      data: 'updated_by',
                      name: 'updated_by',
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
                      target: 4,
                      visible: false,
                  },
                  {
                      target: 6,
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
