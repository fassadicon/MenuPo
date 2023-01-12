<x-admin.layout :notifs="$adminNotifs">

    <p>Dashboard</p>


    <section class="survey-card h-fit">
        <div class="header-page">
            <p><i class="fab fa-nutritionix fa-xl"></i>Weekly Planner</p>
        </div>
        <hr class="mx-4 my-4">
        {{-- Added Sugar --}}
        <div class="row-top row">
            <div class="col-8">
                <div class="container">
                    <h1 class="text-center"><strong>Menu Plan for Week <span class="text-yellow-500"> [num]</span> of
                            <span class="text-yellow-500">[Month]</span></strong></h1>
                    <div class="bg-white p-3 shadow-xl rounded-sm">
                        <div class="h-96 bg-white overflow-y-scroll">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <i class="fa-solid fa-list-radio"></i>
                                </span>
                            </div>
                            <div class='overflow-x-auto w-full'>
                                <table
                                    class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300'>
                                    <thead class="bg-blue-800">
                                        <tr class="text-white">
                                            <th class="font-semibold text-sm uppercase px-6 py-4"> Day </th>
                                            <th class="font-semibold text-sm uppercase px-6 py-4"> Meal Items </th>
                                            <th class="font-semibold text-sm uppercase px-6 py-4"> Added By </th>
                                    </thead>
                                    <tbody class="divide-y  divide-gray-200">
                                        <td>Monday</td>
                                        @foreach ($Mondays as $Monday)
                                            @foreach (explode(', ', $Monday->items) as $item)
                                                <input type="text" value="{{ $item }}"></input>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tbody class="divide-y  divide-gray-200">
                                        <td>Tuesday</td>
                                        <td>Ginisang Alugbati, Ginisang Puso ng Pinya, Manok na Pula</td>
                                        <td>Glen Reyes</td>
                                    </tbody>
                                    <tbody class="divide-y  divide-gray-200">
                                        <td>Wednesday</td>
                                        <td>Ginisang Alugbati, Ginisang Puso ng Pinya, Manok na Pula</td>
                                        <td>Glen Reyes</td>
                                    </tbody>
                                    <tbody class="divide-y  divide-gray-200">
                                        <td>Thursday</td>
                                        <td>Ginisang Alugbati, Ginisang Puso ng Pinya, Manok na Pula</td>
                                        <td>Glen Reyes</td>
                                    </tbody>
                                    <tbody class="divide-y  divide-gray-200">
                                        <td>Friday</td>
                                        <td>Ginisang Alugbati, Ginisang Puso ng Pinya, Manok na Pula</td>
                                        <td>Glen Reyes</td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                </div>
            </div>
            <div class="col-4">
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
            </div>
        </div>


        <hr class="mx-4 my-4">
        <br>


    </section>
    <script>
        const monthAndYear = document.getElementById("monthAndYear");
        const btnPrevious = document.getElementById('previous');
        const btnNext = document.getElementById('next');
        const thead = document.getElementById("calendarhead");
        const tbody = document.getElementById("calendar-body");
        const selectMonth = document.getElementById("month");
        const selectYear = document.getElementById("year");

        const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        selectYear.onchange = jump;
        selectMonth.onchange = jump;
        btnPrevious.onclick = previous;
        btnNext.onclick = next;

        const today = new Date();
        let currentYear = today.getFullYear();
        let currentMonth = today.getMonth();

        function generate_thead() {
            for (let i = 0; i < days.length; i++) {
                const th = document.createElement('th');
                th.innerHTML = days[i];
                thead.append(th);
            }
        }

        function generate_select_months() {
            for (let i = 0; i < months.length; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.innerHTML = months[i];
                selectMonth.append(option);
            }
        }

        function generate_select_years(start, end) {
            for (let i = start; i <= end; i++) {
                const option = document.createElement("option");
                option.value = i;
                option.innerHTML = i;
                selectYear.append(option);
            }
        }

        function next() {
            currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
            currentMonth = (currentMonth + 1) % 12;
            showCalendar(currentMonth, currentYear);
        }

        function previous() {
            currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
            currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
            showCalendar(currentMonth, currentYear);
        }

        function jump() {
            currentYear = parseInt(selectYear.value);
            currentMonth = parseInt(selectMonth.value);
            showCalendar(currentMonth, currentYear);
        }

        /* check how many days in a month code from https://dzone.com/articles/determining-number-days-month */
        function daysInMonth(iMonth, iYear) {
            return 32 - new Date(iYear, iMonth, 32).getDate();
        }

        function showCalendar(month, year) {
            const firstDay = (new Date(year, month)).getDay();

            // clearing all previous cells
            tbody.innerHTML = "";
            // filing data about month and in the page via DOM.
            monthAndYear.innerHTML = months[month] + " " + year;
            selectYear.value = year;
            selectMonth.value = month;

            // creating all cells
            let date = 1;
            for (let i = 0; i < 6; i++) {
                // creates a table row
                let row = document.createElement("tr");
                //creating individual cells, filing them up with data.
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        const cell = document.createElement("td");
                        const cellText = document.createTextNode("-");
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                    } else if (date > daysInMonth(month, year)) {
                        break;
                    } else {
                        const cell = document.createElement("td");
                        const cellText = document.createTextNode(date);
                        if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                            cell.classList.add("bg-info");
                        } // color today's date
                        cell.appendChild(cellText);
                        row.appendChild(cell);
                        date++;
                    }
                }
                // appending each row into calendar body.
                tbody.appendChild(row);
            }
        }

        generate_thead();
        generate_select_months();
        generate_select_years(1990, 2030);
        showCalendar(currentMonth, currentYear);
    </script>
</x-admin.layout>
