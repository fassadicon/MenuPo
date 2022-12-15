<x-admin.layout>
    <h1 class="h3">Food Item Management</h1>
    {{-- DATABLE --}}
    <div class="container">
        <div align="left"><a href="/admin/foods/create" class="btn btn-success mb-2">Create Food Item</a></div>
        <table class="table table-hover table-sm" id="foodTable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Parent</th>
                    <th>xd</th>
                    <th>totalAmount</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Parent</th>
                    <th>xd</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Nutrient Data Modal -->
    <div class="modal fade" id="viewFoodInfoModal" tabindex="-1" aria-labelledby="viewFoodInfoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewFoodInfoModalLabel">Nutritional Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="foodID" id="foodID">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <p id="name" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <p id="description" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Serving Size</label>
                        <p id="servingSize" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Nutrient Grade</label>
                        <p id="grade" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Energy, calculated (kcal)</label>
                        <p id="calcKcal" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Total Fat (g)</label>
                        <p id="calcTotFat" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Saturated Fat (g)</label>
                        <p id="calcSatFat" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Sugars (g)</label>
                        <p id="calcSugar" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Sodium (mg)</label>
                        <p id="calcSodium" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Created by:</label>
                        <p id="user_id" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Created at:</label>
                        <p id="created_at" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Updated at:</label>
                        <p id="updated_at" class="form-control"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Food Image Modal --}}
    <div class="modal fade" id="viewFoodImgModal" tabindex="-1" aria-labelledby="viewFoodImgModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewFoodImgModalLabel">Nutritional Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="foodID" id="foodID">
                    <div class="mb-3">
                        <label for="">Name</label>
                        <p id="imageName" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Source</label>
                        <p id="imageSource" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <img src="" alt="" id="imageFood" class="form-control" width="100"
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
                processing: true,
                serverSide: true,
                ajax: {
                    type: "GET",
                    url: "{{ route('food.test') }}"
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'parent.name',
                        // name: 'parent.name'
                    }, 
                    {
                        data: 'xd'
                    },
                    {
                        data: 'totalAmount'
                    },
                ]
            });
            // Highlight Values in Table
            // $('#foodTable tbody').on('mouseenter', 'td', function() {
            //     var colIdx = table.cell(this).index().column;

            //     $(table.cells().nodes()).removeClass('highlight');
            //     $(table.column(colIdx).nodes()).addClass('highlight');
            // });
            // View Food Data Modal
            $('body').on('click', '.viewFood', function() {
                var foodID = $(this).data('id');
                $.get("{{ url('admin/foods/') }}" + '/' + foodID + '/view', function(data) {
                    $('#viewFoodInfoModal').modal('show');
                    $('#name').text(data.name);
                    $('#description').text(data.description);
                    $('#servingSize').text(data.servingSize);
                    $('#calcKcal').text(data.calcKcal);
                    $('#calcTotFat').text(data.calcTotFat);
                    $('#calcSatFat').text(data.calcSatFat);
                    $('#calcSugar').text(data.calcSugar);
                    $('#calcSodium').text(data.calcSodium);
                    $('#grade').text(data.grade);
                    $('#created_at').text(data.created_at);
                    $('#updated_at').text(data.updated_at);
                    $('#user_id').text(data.user_id);
                })
            });
            // View Food Image Modal
            $('body').on('click', '.viewFoodImg', function() {
                var foodID = $(this).data('id');
                $.get("{{ url('admin/foods/') }}" + '/' + foodID + '/view', function(data) {
                    $('#imageName').text(data.name);
                    $('#imageFood').attr('src', "{{ URL::asset('storage/') }}" + '/' + data.image);
                    $('#viewFoodImgModal').modal('show');
                })
            });
        });
    </script>
<hr class="mx-4 my-4">
<br>

</x-admin.layout>
