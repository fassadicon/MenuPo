<x-admin.layout :notifs="$adminNotifs">
   
  <table class="table table-bordered table-sm" id="logsTable">

      <thead>
          <tr>
              <th>ID</th>
              <th>Description</th>
              <th>Entity</th>
              <th>Action by</th>
              <th>After</th>
              <th>Before</th>
              {{-- <th>Grade</th>
            <th>Created By</th> --}}
              {{-- <th width="50px"><button type="button" name="bulk_delete" id="bulk_delete"
                    class="btn btn-danger">Delete</button></th> --}}
          </tr>
      </thead>
      <tbody>
      </tbody>
  </table>
  @include('partials.admin._DataTableScripts')

  <script type="text/javascript">
      // DataTables Script
      $(function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          var table = $('#logsTable').DataTable({
              dom: "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-4'f><'col-sm-12 col-md-3'B>>" +
                  "<'row'<'col-sm-12'tr>>" +
                  "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

              buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
              ],
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
                  url: "{{ route('menuLogsTable') }}",

              },
              columns: [{ //0
                      data: 'id',
                      name: 'id'
                  },
                  {
                      data: 'event',
                      data: 'event',
                  },
                  {
                      data: 'model_id',
                      data: 'model_id',
                  },
                  {
                      data: 'action_by',
                      data: 'action_by',
                  },
                  { //3
                      data: 'properties',
                      name: 'properties',
                      render: function(data, type, row) {
                          return $.map(data, function(value, status) {
                              return $.map(value, function(value, key) {
                                  if (status == 'attributes')
                                      return key + ': ' + value;
                              })
                          }).join('<br>');
                      }
                  },
                  { //3
                      data: 'properties',
                      name: 'properties',
                      render: function(data, type, row) {
                          return $.map(data, function(value, status) {
                              return $.map(value, function(value, key) {
                                  if (status == 'old') {
                                      return key + ': ' + value;
                                  }
                              })
                          }).join('<br>');
                      }
                  },
                  // { //1
                  //     data: 'parent',
                  //     name: 'parent',
                  //     render: function(data, type, row) {
                  //         return row.parent == null ? 'Deleted Account' : row.parent.firstName + ' ' + row.parent.lastName;
                  //     }
                  // },
                  // { //3
                  //     data: 'orders',
                  //     name: 'orders',
                  //     render: function(data, type, row) {
                  //         return $.map(data, function(value, i) {
                  //             return value.food == null ? 'Archived Food Item x ' + value.quantity : value.food.name + ' x ' + value.quantity;
                  //         }).join('<br>');
                  //     }
                  // },
              ],
              // columnDefs: [{
              //         "defaultContent": "-",
              //         "targets": "_all"
              //     },
              //     //   {
              //     //      target: 3,
              //     //      visible: false,
              //     //   },
              //     {
              //         target: 4,
              //         visible: false,
              //     },
              //     {
              //         target: 5,
              //         visible: false,
              //     },
              //     {
              //         target: 6,
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
              //         target: 12,
              //         visible: false,
              //     },

              //     //   {
              //     //      target: 12,
              //     //      visible: false,
              //     //   },
              //     //   {
              //     //      target: 13,
              //     //      visible: false,
              //     //      searchable: false,
              //     //   },
              //     // {
              //     //     target: 14,
              //     //     visible: false,
              //     //     searchable: false,
              //     // },
              //     //   {
              //     //      target: 15,
              //     //      visible: false,
              //     //      searchable: false,
              //     //   },
              //     {
              //         targets: -1,
              //         data: null,
              //         defaultContent: '<button>Click!</button>',
              //     }
              // ],
          });

      });
  </script>
</x-admin.layout>
