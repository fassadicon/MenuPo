<x-admin.layout :notifs='$adminNotifs'>

    <h1 class="h3">Completed Orders</h1>

    <div class="container">
        <div class="align-left"><a href="/admin/orders/completed/trash" class="btn btn-warning btn-mb-2"><i class="far fa-trash-alt"></i>&nbsp; Archived Orders</a>
        </div>
        <table class="table table-bordered table-sm" id="completedTable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Parent</th>
                    <th>Student</th>
                    <th>Orders</th>
                    <th>Total kcal</th>
                    <th>Total Fat</th>
                    <th>Total SatFat</th>
                    <th>Total Sugar</th>
                    <th>Total Sodium</th>
                    <th>Total Amount</th>
                    <th>Payment ID</th>
                    <th>Payment Details</th>
                    <th>Payment Status</th>
                    <th>Claim Status</th>
                    <th>Type</th>
                    <th>Ordered At</th>
                    <th>Served At</th>
                    <th>Served By</th>
                    <th>Options</th>
                    {{-- <th>Grade</th>
                    <th>Created By</th> --}}
                    {{-- <th width="50px"><button type="button" name="bulk_delete" id="bulk_delete"
                            class="btn btn-danger">Delete</button></th> --}}
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    {{-- View Purchase Info Modal --}}
    <div class="modal fade" id="viewPurchaseInfoModal" tabindex="-1" aria-labelledby="viewPurchaseInfoModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPurchaseInfoModalLabel">Purchase Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <input type="hidden" name="purchaseID" id="purchaseID">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Parent Name</label>
                                    <p id="parent_id" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Student Name</label>
                                    <p id="student_id" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="">Total Kcal</label>
                                    <p id="totalKcal" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="">Total Fat (g)</label>
                                    <p id="totalTotFat" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="">Tot Sat Fat (g)</label>
                                    <p id="totalSatFat" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="">Tot Sugar (g)</label>
                                    <p id="totalSugar" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-4">
                                
                                <div class="mb-3">
                                    <label for="">Tot Sodium (mg)</label>
                                    <p id="totalSodium" class="form-control"></p>
                                </div>
                            </div>
                         
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="">Payment ID</label>
                                    <p id="payment_id" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="">Claim Status</label>
                                    <p id="claimStatus" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Type</label>
                                    <p id="type" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Served By</label>
                                    <p id="served_by" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Ordered At</label>
                                    <p id="created_at" class="form-control"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Claimed at</label>
                                    <p id="updated_at" class="form-control"></p>
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
            var table = $('#completedTable').DataTable({
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
                        title: "Completed Orders"
                    },
                    {
                        extend: "excel",
                        text: "",
                        className: "fred bi bi bi-filetype-xlsx",
                        title: "Completed Orders"
                    },
                    {
                        extend: "pdf",
                        text: "",
                        className: "fred bi bi-filetype-pdf",
                        title: "Completed Orders"
                    },
                    {
                        extend: "print",
                        text: "",
                        className: "fred bi bi-printer",
                        title: "Completed Orders"
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
                    url: "{{ route('completed.completedOrders') }}",
                },
                columns: [{ //0
                        data: 'id',
                        name: 'id'
                    },
                    { //1
                        data: 'parent',
                        name: 'parent',
                        render: function(data, type, row) {
                            return row.parent == null ? 'Deleted Account' : row.parent.firstName + ' ' + row.parent.lastName;
                        }
                    },
                    { //2
                        data: 'student',
                        name: 'student',
                        render: function(data, type, row) {
                            return row.student == null ? 'Deleted Account' : row.student.firstName + ' ' + row.student.lastName;
                        }
                    },
                    { //3
                        data: 'orders',
                        name: 'orders',
                        render: function(data, type, row) {
                            return $.map(data, function(value, i) {
                                return value.food == null ? 'Archived Food Item x ' + value.quantity : value.food.name + ' x ' + value.quantity;
                            }).join('<br>');
                        }
                    },
                    { //4
                        data: 'totalKcal',
                        name: 'totalKcal'
                    },
                    { //5
                        data: 'totalTotFat',
                        name: 'totalTotFat'
                    },
                    { //6
                        data: 'totalSatFat',
                        name: 'totalSatFat',
                    },
                    { //7
                        data: 'totalSugar',
                        name: 'totalSugar',
                    },
                    { //8
                        data: 'totalSodium',
                        name: 'totalSodium',
                    },
                    { //9
                        data: 'totalAmount',
                        name: 'totalAmount',
                    },
                    { //10
                        data: 'payment_id',
                        name: 'payment_id',
                    },
                    { //10
                        data: 'payment.method',
                        name: 'payment',
                        render: function(data, type, row) {
                            let details;
                            if (row.type == 1) {
                                details = row.payment.method;
                            } else {
                                details = row.payment.method + ' - ' + row.payment.referenceNo;
                            }
                            return details;
                        }
                    },
                    { //11
                        data: 'paymentStatus',
                        name: 'paymentStatus',
                    },
                    { //12
                        data: 'claimStatus',
                        name: 'claimStatus',
                        render: function(data, type, row) {
                            return data == 0 ? 'Unclaimed' : 'Claimed';
                        }
                    },
                    { //13
                        data: 'type',
                        name: 'type',
                        render: function(data, type, row) {
                            return data == 0 ? 'Pre-Order' : 'Walk-In';
                        }
                    },
                    { // 14
                        // data: 'created_at',
                        // name: 'created_at',
                        data: 'created_at_formatted',
                        name: 'created_at_formatted',
                    },
                    { // 15
                        // data: 'updated_at',
                        // name: 'updated_at',
                        data: 'updated_at_formatted',
                        name: 'updated_at_formatted',
                    },

                    { //16
                        data: 'served_by_name',
                        name: 'served_by_name',
                        render: function(data, type, row) {
                            return row.served_by_name == null ?'Archived Account' : row.served_by_name.firstName + ' ' + row.served_by_name.lastName;
                        }
                    },

                    { // 17
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        "defaultContent": "-",
                        "targets": "_all"
                    },
                    {
                        target: 4,
                        visible: false,
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
                        target: 12,
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
            $('body').on('click', '.viewCompleted', function() {
                var purchaseID = $(this).data('id');
                $.get("{{ url('admin/orders/completed') }}" + '/' + purchaseID + '/view', function(data) {
                    $('#viewPurchaseInfoModal').modal('show');
                    $('#parent_id').text(data.parent.firstName + ' ' + data.parent.lastName);
                    $('#student_id').text(data.student.firstName + ' ' + data.student.lastName);
                    $('#totalKcal').text(data.totalKcal);
                    $('#totalTotFat').text(data.totalTotFat);
                    $('#totalSatFat').text(data.totalSatFat);
                    $('#totalSugar').text(data.totalSugar);
                    $('#totalSodium').text(data.totalSodium);
                    $('#totalAmount').text(data.totalAmount);
                    $('#payment_id').text(data.payment_id);
                    $('#claimStatus').text(data.claimStatus == 0 ? 'Not claimed' : 'Claimed');
                    $('#type').text(data.type == 0 ? 'Pre-order' : 'Walk-in');
                    $('#created_at').text(data.created_at_formatted);
                    $('#updated_at').text(data.updated_at_formatted);
                    $('#served_by').text(data.served_by_name.firstName + ' ' + data.served_by_name.lastName);
                })
            });

            $('body').on('click', '.archiveBtn', function() {
                Swal.fire('Archived');
            });

            $('body').on('click', '.restoreBtn', function() {
                Swal.fire('Restore');
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
<hr class="mx-4 my-4">
<br>
</x-admin.layout>
