<x-admin.layout :notifs='$adminNotifs'>
    <h1 class="h3">Archived Orders</h1>

    <div class="container">
        <div align="left"><a href="/admin/orders/placed/" class="btn btn-warning mb-2">Back</a></div>
        <table class="table table-bordered table-sm" id="orderTable">
    
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Purchase ID</th>
                    <th>Food ID</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Kcal</th>
                    <th>Total Fat</th>
                    <th>Saturated Fat</th>
                    <th>Sugar</th>
                    <th>Sodium</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Order ID</th>
                    <th>Purchase ID</th>
                    <th>Food ID</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Kcal</th>
                    <th>Total Fat</th>
                    <th>Saturated Fat</th>
                    <th>Sugar</th>
                    <th>Sodium</th>
                    <th>Options</th>
                </tr>
            </tfoot>
        </table>
    </div>


    {{-- View Order Nutrient Modal --}}
    <div class="modal fade" id="viewOrderInfoModal" tabindex="-1" aria-labelledby="viewOrderInfoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewOrderModalLabel">Purchase Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="orderID" id="orderID">
                    <div class="mb-3">
                        <label for="">Purchase ID</label>
                        <p id="purchase_id" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Food ID</label>
                        <p id="food_id" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Quantity</label>
                        <p id="quantity" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Amount</label>
                        <p id="amount" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Kcal</label>
                        <p id="kcal" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Total Fat</label>
                        <p id="totFat" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Saturated Fat</label>
                        <p id="satFat" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Sugar</label>
                        <p id="sugar" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Sodium</label>
                        <p id="sodium" class="form-control"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
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
        var table = $('#orderTable').DataTable({
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
                url: "{{ route('orders.trash') }}",
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
            columns: [{//0
                      data: 'id',
                      name: 'id'
                  },
                  {//1
                      data: 'purchase_id',
                      name: 'purchase_id'
                  },
                  { //2
                      data: 'food.name',
                      name: 'food_id'
                  },
                  {//3
                      data: 'quantity',
                      name: 'quantity'
                  },
                  {//4
                      data: 'amount',
                      name: 'amount'
                  },
                  {//5
                      data: 'kcal',
                      name: 'kcal',
                  },
                  {//6
                      data: 'totFat',
                      name: 'totFat',
                  },
                  { //7
                      data: 'satFat',
                      name: 'satFat',
                  },
                  {//8
                      data: 'sugar',
                      name: 'sugar',
                  },
                  {//9
                      data: 'sodium',
                      name: 'sodium',
                  },
                  
                  { // 10
                      data: 'action',
                      name: 'action',
                      orderable: false,
                      searchable: false
                  }
                  // {
                  //     data: 'checkbox',
                  //     name: 'checkbox',
                  //     orderable: false,
                  //     searchable: false
                  // },
              ],
              columnDefs: [{
                  "defaultContent": "-",
                  "targets": "_all"
                  },
                  {
                     target: 5,
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
                      targets: -1,
                      data: null,
                      defaultContent: '<button>Click!</button>',
                  }   
             ],
        });

        // View Pending Order Data Modal
       $('body').on('click', '.viewOrder', function() {
           var orderID = $(this).data('id');
           $.get("{{ url('admin/orders/placed/') }}" + '/' + orderID + '/viewTrash', function(data) {
               $('#viewOrderInfoModal').modal('show');
               $('#purchase_id').text(data.purchase_id);
               $('#food_id').text(data.food_id);
               $('#quantity').text(data.quantity);
               $('#amount').text(data.amount);
               $('#kcal').text(data.kcal);
               $('#totFat').text(data.totFat);
               $('#satFat').text(data.satFat);
               $('#sugar').text(data.sugar);
               $('#sodium').text(data.sodium);
           })
       });

       // Mark Pending Order as Paid
    //    $('body').on('click', '.viewPurchase', function() {
    //        var orderID = $(this).data('id');
    //        $.get("{{ url('admin/orders/pendings') }}" + '/' + purchaseID + '/view', function(data) {
    //            $('#viewPurchaseInfoModal').modal('show');
    //            $('#parent_id').text(data.parent.name);
    //            $('#student_id').text(data.student.name);
    //            $('#totalKcal').text(data.totalKcal);
    //            $('#totalTotFat').text(data.totalTotFat);
    //            $('#totalSatFat').text(data.totalSatFat);
    //            $('#totalSugar').text(data.totalSugar);
    //            $('#totalSodium').text(data.totalSodium);
    //            $('#totalAmount').text(data.totalAmount);
    //            $('#payment_id').text(data.payment_id);
    //            $('#paymentStatus').text(data.paymentStatus);
    //            $('#claimStatus').text(data.claimStatus);
    //            $('#type').text(data.type);
    //            $('#created_at').text(data.created_at);
    //            $('#updated_at').text(data.updated_at);
    //            $('#served_by').text(data.served_by);
    //        })
    //    });
    });
    </script>

</x-admin.layout>