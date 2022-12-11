<x-admin.layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
        <div class="col-xl-7 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">
                        SCAN HERE
                    </h4>
                </div>
                <div class="card-body videoDiv">
                    <video src="" id="preview" width="100%"></video>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-4">
            <div class="receipt card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">
                        ORDER DETAILS
                    </h4>
                </div>
                <div class="card-body orderDetailsCard">
                    <div class="row">
                        <div class="col-12">
                            {{-- <input type="text" name="studentID" id="studentID" hidden> --}}
                            <label for="parentName">Parent's Name: </label>
                            <input type="text" id="parentName" class="border border-gray-200 rounded p-2 w-full" readonly>
                            <label for="studentName">Student's Name: </label>
                            <input type="text" id="studentName" class="border border-gray-200 rounded p-2 w-full" readonly>
                            <label for="studentID">Student's ID: </label>
                            <input type="number" id="studentID" class="border border-gray-200 rounded p-2 w-full">
                            <label for="totalAmount">Total Amount: </label>
                            <input type="text" id="totalAmount" class="border border-gray-200 rounded p-2 w-full" readonly>
                        </div>
                        <div class="col-12 table-responsive">
                            <table class="table table-borderless" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                    <td>Food</td>
                                    <td>Quantity</td>
                                    <td>Amount</td>
                                </thead>
                                <tbody id="purchaseTable">
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        {{-- <div class="col-12 table-responsive">
                            <table class="table table-borderless" width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                    <td>Food</td>
                                    <td>Quantity</td>
                                    <td>Amount</td>
                                </thead>
                                <tbody id="orderTable">
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div> --}}
                        {{-- <div class="card">
                            <h3>Purchase->Order->Food</h3>
                            @foreach ($purchases as $purchase)
                                <h2>Purchase ID: {{ $purchase->id }}</h2>
                                <h4>Parent Name: {{ $purchase->parent->name }}</h4>
                                <h4>Student: {{ $purchase->student->name }} </h4>
                                @foreach ($purchase->orders as $order)
                                    <p>Order ID: {{ $order->id }} Food Name: {{ $order->food->name }}</p>
                                @endforeach
                            @endforeach
                        </div> --}}
                    </div>
                    <!-- <input type="text" name="text" id="text" class="form-control"> -->

                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-lg-6 d-flex flex-row justify-content-center">
                <a href="{{ URL('admin/pos')}}" class="btn btn-secondary btn-lg">
                    Proceed to Manual Order
                    <!-- <i class="fas fa-check"></i> -->
                </a>
            </div> --}}
            <div class="col-lg-6 d-flex flex-row justify-content-center">
                <button class="btn btn-success btn-lg completeBtn">
                    Complete Order
                </button>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
</x-admin.layout>
<script>
    // Scanner Initialization
    // import Instascan from '@mathewparet/instascan'
    var scanner = new Instascan.Scanner({
        continuous: true,
        video: document.getElementById('preview'),
        scanPeriod: 5,
        mirror: true
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
            // $('[name="options"]').on('change', function() {
            //     if ($(this).val() == 1) {
            //         if (cameras[0] != "") {
            //             scanner.start(cameras[0]);
            //         } else {
            //             alert('No Front camera found!');
            //         }
            //     } else if ($(this).val() == 2) {
            //         if (cameras[1] != "") {
            //             scanner.start(cameras[1]);
            //         } else {
            //             alert('No Back camera found!');
            //         }
            //     }
            // });
        } else {
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan', function(content) {
        document.getElementById('studentID').value = content;
        var id = content;
        $.ajax({
            type: "GET",
            url: "{{ url('admin/orders/scanner') }}" + '/' + id + '/view',
            // data: content;
            success: function(data) {
                var trHTML1 = '';
                var total = 0.00;
                $('#purchaseTable').html('');
                // $('#orderTable').html('');
                console.log(data);
                if (data.purchase.length == 0) {
                    Swal.fire({
                        title: "The student have no order/s for today. Do you want to proceed to Walk-in Order?",
                        icon: "warning",
                        html: '<a href="/admin/pos/' + id +
                            '"class=\'btn btn-success\'>Yes</a>',
                        showCancelButton: true,
                        showConfirmButton: false
                    });
                }
                $.each(data.purchase, function() {
                    // $('#purchaseID').val(this.id);
                    $('#parentName').val(this.parent.firstName + ' ' + this.parent
                        .lastName);
                    $('#studentName').val(this.student.firstName + ' ' + this.student
                        .lastName);
                    total += this.totalAmount;
                    // console.log(this.id)
                    $.each(this.orders, function(i, value) {
                        trHTML1 += '<tr><td>' + value.food.name +
                            '</td><td>' + value.quantity +
                            '</td><td>' + value.amount + '</td></tr>';
                    });
                });
                $('#totalAmount').val('PHP ' + total);
                $('#purchaseTable').append(trHTML1);
            },
            error: function(error) {
                Swal.fire({
                    title: 'The student have no order/s for today. Do you want to proceed to Walk-in Order?',
                    text: "The student have no order/s for today. Do you want to proceed to Walk-in Order?",
                    icon: "warning",
                    html: '<button type="button" role="button" tabindex="0" class="bg-dark text-white rounded py-2 px-4 hover:bg-black">' +
                        'No' + '</button>' +
                        '<button type="button" role="button" tabindex="0" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">' +
                        'Yes' + '</button>',
                    showCancelButton: true,
                    showConfirmButton: false
                });
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Complete Button
    $(".completeBtn").click(function() {
        var sid = $("#studentID").val();
        $.ajax({
            type: "POST",
            url: "{{ url('admin/orders/scanner') }}" + '/' + sid + '/complete',
            success: function(result) {
                $('#studentID').val('');
                $('#purchaseID').val('');
                $('#parentName').val('');
                $('#studentName').val('');
                $('#totalAmount').val('');
                $('#purchaseTable').children('tr').remove();

                Swal.fire({
                    title: 'Order Claimed Successfully. Do you want to add orders?',
                    html: '<a href="/admin/pos/' + sid +
                        '"class=\'btn btn-success\'>Yes</a>',
                    showCancelButton: true,
                    showConfirmButton: false
                });

            },
            error: function(error) {
                Swal.fire(
                    'No QR Scanned!',
                );
            }
        });
    });
</script>
