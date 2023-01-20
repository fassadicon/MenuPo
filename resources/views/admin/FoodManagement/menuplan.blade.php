<x-admin.layout :notifs="$adminNotifs">
    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" /> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.0.3/index.global.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <p>Menu Planner</p>


    <!-- Modal -->
    <div class="modal fade" id="menuPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Menu Item</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-square-xmark fa-xl text-white"></i></button>
                </div>
                <div class="modal-body">
                    <span id="titleError"></span>
                    <label for="title">Food</label>
                    <input type="text" class="form-control" id="title" name="title">
                    {{-- <label for="start">Start</label>
                    <input type="date" class="form-control" id="start" name="start">
                    <label for="end">End</label>
                    <input type="date" class="form-control" id="end" name="end"> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="button-sec bg-red-400" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="saveBtn" class="button-sec bg-green-400">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <section class="survey-card h-fit">
        <div class="header-page">
            <p><i class="fab fa-nutritionix fa-xl"></i>Weekly Planner</p>
        </div>
        <hr class="mx-4 my-4">
        {{-- Added Sugar --}}
        <div class="row-top row">
            {{-- <div class="col-8">
                <div class="container">
                    <h1 class="text-center"><strong>Menu Plan for Week <span class="text-yellow-500"> [num]</span> of
                            <span class="text-yellow-500">[Month]</span></strong></h1>
                    <div class="bg-white p-3 shadow-xl rounded-sm">
                        <div class="h-96 bg-white overflow-auto">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <i class="fa-solid fa-list-radio"></i>
                                </span>
                            </div>
                            <div class='overflow-x-auto w-full'>
                                <table id="menuPlannertTbl"
                                    class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300'>
                                    <thead class="bg-blue-800">
                                        <tr class="text-white">
                                            <th hidden>ID</th>
                                            <th class="font-semibold text-sm uppercase px-6 py-4"> Day </th>
                                            <th class="font-semibold text-sm uppercase px-6 py-4"> Meal Items </th>
                                            <th class="font-semibold text-sm uppercase px-6 py-4"> Added By </th>
                                            <th class="font-semibold text-sm uppercase px-6 py-4"> Date Modified </th>
                                            <th class="font-semibold text-sm uppercase px-6 py-4"> Updated By </th>
                                    </thead>
                                    <tbody>
                                        <tr class="divide-y divide-gray-200">
                                            <td class="id-list" hidden>{{ $Mondays->id }}</td>
                                            <td>Monday</td>
                                            <td><input type="text" value="{{ $Mondays->items }}" class="food-list">
                                            </td>
                                            <td>{{ $Mondays->admin->firstName . ' ' . $Mondays->admin->lastName }}</td>
                                            <td>{{ $Mondays->updated_at == null ? $Mondays->created_at->format('Y-m-d') : $Mondays->updated_at->format('Y-m-d') }}
                                            </td>
                                            <td>{{ $Mondays->admin_updated->firstName . ' ' . $Mondays->admin_updated->lastName }}
                                            </td>
                                        </tr>
                                        <tr class="divide-y  divide-gray-200">
                                            <td class="id-list" hidden>{{ $Tuesdays->id }}</td>
                                            <td>Tuesday</td>
                                            <td><input type="text" value="{{ $Tuesdays->items }}" class="food-list">
                                            </td>
                                            <td>{{ $Tuesdays->admin->firstName . ' ' . $Tuesdays->admin->lastName }}
                                            </td>
                                            <td>{{ $Tuesdays->updated_at == null ? $Tuesdays->created_at->format('Y-m-d') : $Tuesdays->updated_at->format('Y-m-d') }}
                                            </td>
                                            <td>{{ $Tuesdays->admin_updated->firstName . ' ' . $Tuesdays->admin_updated->lastName }}
                                            </td>
                                        </tr>
                                        <tr class="divide-y  divide-gray-200">
                                            <td class="id-list" hidden>{{ $Wednesdays->id }}</td>
                                            <td>Wednesday</td>
                                            <td><input type="text" value="{{ $Wednesdays->items }}"
                                                    class="food-list"></td>
                                            <td>{{ $Wednesdays->admin->firstName . ' ' . $Wednesdays->admin->lastName }}
                                            </td>
                                            <td>{{ $Wednesdays->updated_at == null ? $Wednesdays->created_at->format('Y-m-d') : $Wednesdays->updated_at->format('Y-m-d') }}
                                            </td>
                                            <td>{{ $Wednesdays->admin_updated->firstName . ' ' . $Wednesdays->admin_updated->lastName }}
                                            </td>
                                        </tr>
                                        <tr class="divide-y  divide-gray-200">
                                            <td class="id-list" hidden>{{ $Thursdays->id }}</td>
                                            <td>Thursday</td>
                                            <td><input type="text" value="{{ $Thursdays->items }}"
                                                    class="food-list"></td>
                                            <td>{{ $Thursdays->admin->firstName . ' ' . $Thursdays->admin->lastName }}
                                            </td>
                                            <td>{{ $Thursdays->updated_at == null ? $Thursdays->created_at->format('Y-m-d') : $Thursdays->updated_at->format('Y-m-d') }}
                                            </td>
                                            <td>{{ $Thursdays->admin_updated->firstName . ' ' . $Thursdays->admin_updated->lastName }}
                                            </td>
                                        </tr>
                                        <tr class="divide-y  divide-gray-200">
                                            <td class="id-list" hidden>{{ $Fridays->id }}</td>
                                            <td>Friday</td>
                                            <td><input type="text" value="{{ $Fridays->items }}" class="food-list">
                                            </td>
                                            <td>{{ $Fridays->admin->firstName . ' ' . $Fridays->admin->lastName }}</td>
                                            <td>{{ $Fridays->updated_at == null ? $Fridays->created_at->format('Y-m-d') : $Fridays->updated_at->format('Y-m-d') }}
                                            </td>
                                            <td>{{ $Fridays->admin_updated->firstName . ' ' . $Fridays->admin_updated->lastName }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-secondary print">Print</button>
                            <button class="btn btn-primary edit">Edit</button>
                            <button class="btn btn-success save">Save</button>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12 space-x-4 p-2 ml-4">
                            <button class="button-sec">Create Weekly Planner</button>
                            <button class="button-sec text-white bg-green-800">Download Current Weekly Plan</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="container col-sm-4 col-md-7 col-lg-4 mt-2">
                                <div class="card">
                                    <h3 class="card-header" id="monthAndYear"></h3>
                                    <table class="table table-bordered table-responsive-sm text-center" id="calendar">
                                        <thead id="calendarhead"></thead>
                                        <tbody id="calendar-body"></tbody>
                                    </table>

                                    <div class="form-inline mx-4 space-x-60">
                                        <button class="button-sec bg-white mr-4" id="previous"><i
                                                class="fa-solid fa-angles-left fa-lg"></i></button>
                                        <button class="button-sec bg-white" id="next"><i
                                                class="fa-solid fa-angles-right fa-lg"></i></button>
                                    </div>

                                    <br />

                                    <form class="form-inline">
                                        <label class="lead mr-2 ml-2" for="month">Jump To: </label>
                                        <select class="form-control col-sm-4" name="month" id="month"></select>
                                        <select class="form-control col-sm-4" name="year" id="year"></select>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>


        <hr class="mx-4 my-4">
        <br>


    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script>
        $('document').ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var item = @json($events);
            // console.log(item);
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, basicWeek, basicDay',
                },
                height: 650,
                events: item,
                allDayDefault: true,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {

                    $('#menuPlanModal').modal('toggle');
                    $('#saveBtn').on('click', function() {
                        var title = $('#title').val();
                        var start_date = moment(start).format('YYYY-MM-DD');
                        var end_date = moment(end).format('YYYY-MM-DD');
                        console.log(start_date);
                        $.ajax({
                            url: "{{ url('admin/menuplan/update') }}",
                            type: "POST",
                            dataType: 'json',
                            data: {
                                title,
                                start_date,
                                end_date
                            },
                            success: function(response) {
                                $('#menuPlanModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent', {
                                    'title': response.foodName,
                                    'start': response.start_date,
                                    'end': response.end_date,
                                });
                                $('#title').val('');
                                console.log(response);
                            },
                            error: function(error) {
                                if (error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors
                                        .title);
                                }
                            },
                        });
                    });
                },
                editable: true,
                eventResize: function(event) {

                    // alert(event.title + " end is now " + event.end.format());

                    // if (!confirm("is this okay?")) {
                    //     revertFunc();
                    // }
                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD');
                    var end_date = moment(event.end).format('YYYY-MM-DD');
                    Swal.fire({
                        title: 'Do you want to save the changes?',
                        showDenyButton: true,
                        confirmButtonText: 'Yes',
                        denyButtonText: 'No',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('calendar.updateDuration', '') }}" + '/' + id,
                                type: "PATCH",
                                dataType: 'json',
                                data: {
                                    start_date,
                                    end_date
                                },
                                success: function(response) {
                                    Swal.fire("Good job!", "Event Updated!",
                                        "success");
                                    $('#calendar').fullCalendar('renderEvent', {
                                        'title': response.foodName,
                                        'start': response.start_date,
                                        'end': response.end_date,
                                    });
                                },
                                error: function(error) {
                                    console.log(error)
                                },
                            });

                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info');
                        }
                    })

                },
                eventDrop: function(event) {
                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD');
                    var end_date = moment(event.end).format('YYYY-MM-DD');
                    $.ajax({
                        url: "{{ route('calendar.update', '') }}" + '/' + id,
                        type: "PATCH",
                        dataType: 'json',
                        data: {
                            start_date,
                            end_date
                        },
                        success: function(response) {
                            Swal.fire("Good job!", "Event Updated!", "success");
                            $('#calendar').fullCalendar('renderEvent', {
                                'title': response.foodName,
                                'start': response.start_date,
                                'end': response.end_date,
                            });
                        },
                        error: function(error) {
                            console.log(error)
                        },
                    });
                },
                eventClick: function(event) {
                    var id = event.id;
                    Swal.fire({
                        title: 'Do you want to delete the menu item schedule?',
                        showDenyButton: true,
                        confirmButtonText: 'Yes',
                        denyButtonText: 'No',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('calendar.destroy', '') }}" + '/' + id,
                                type: "DELETE",
                                dataType: 'json',
                                success: function(response) {
                                    $('#calendar').fullCalendar('removeEvents',
                                        response);
                                    // swal("Good job!", "Event Deleted!", "success");
                                    Swal.fire('Saved!', '', 'success');
                                    $('#calendar').fullCalendar('renderEvent', {
                                        'title': response.foodName,
                                        'start': response.start_date,
                                        'end': response.end_date,
                                    });
                                    // window.location = window.location.href + "?nocache=" + new Date().getTime();
                                },
                                error: function(error) {
                                    console.log(error);
                                    Swal.fire('Changes are not saved', '', 'info');
                                },
                            });

                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info');
                        }
                    })
                    // if (confirm('Are you sure want to remove it')) {
                    //     $.ajax({
                    //         url: "{{ route('calendar.destroy', '') }}" + '/' + id,
                    //         type: "DELETE",
                    //         dataType: 'json',
                    //         success: function(response) {
                    //             $('#calendar').fullCalendar('removeEvents', response);
                    //             // swal("Good job!", "Event Deleted!", "success");
                    //         },
                    //         error: function(error) {
                    //             console.log(error)
                    //         },
                    //     });
                    // }
                },
                // selectAllow: function(event) {
                //     return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1,
                //         'second').utcOffset(false), 'day');
                // },


            });

            $("#menuPlanModal").on("hidden.bs.modal", function() {
                $('#saveBtn').unbind();
            });
        })
    </script>
</x-admin.layout>
