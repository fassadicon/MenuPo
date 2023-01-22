<x-admin.layout :notifs="$adminNotifs">
    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" /> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.0.3/index.global.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> --}}
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.print.css " rel="stylesheet"
        type="text/css" media="print" />


    <!-- Modal -->
    <div class="modal fade" id="menuPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Menu Item</h5>
                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-square-xmark fa-xl text-white"></i></button>
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
            <p><i class="fab fa-nutritionix fa-xl"></i>Menu Planner <span> <a href=""
                        class="printBtn btn btn-info">Print</a></span> <span><a href="" id="implementMenuBtn"
                        class="btn btn-warning">Implement</a></span></p>

        </div>

    </section>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div id='calendar'></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.js"
        integrity="sha512-/fgTphwXa3lqAhN+I8gG8AvuaTErm1YxpUjbdCvwfTMyv8UZnFyId7ft5736xQ6CyQN4Nzr21lBuWWA9RTCXCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script>
        $('document').ready(function() {

            $('.printBtn').on('click', function() {
                $('#calendar').show();
                window.print();
            });

            var routeFindPhilFCT = "{{ url('/autocomplete-search-foods') }}";
            $('#title').typeahead({
                hint: true,
                highlight: true,
                minLength: 1,
                items: 5,
                source: function(query, process) {
                    return $.get(routeFindPhilFCT, {
                        query: query
                    }, function(data) {
                        console.log(data)
                        return process(data);
                    });
                }
            });

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
                                url: "{{ route('calendar.updateDuration', '') }}" +
                                    '/' + id,
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

            $('#implementMenuBtn').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('calendar.implement') }}",
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        })
    </script>
</x-admin.layout>
