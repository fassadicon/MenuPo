@include('sweetalert::alert')

@props(['purchases'])
@props(['studs'])
@props(['grade'])
@props(['parent'])
@props(['reqbutton'])

@php
    $pending = 0;
    $paid = 0;

    foreach($purchases as $purchase){
        if($purchase->paymentStatus == 0){
            $pending += 1;
        }
        else{
            $paid += 1;
        }
    }
@endphp


<div class="container h-auto mx-auto my-14 p-5 py-4 mt-20 bg-gray-50">
    <div class="md:flex no-wrap md:-mx-2 ">
        <!-- Left Side -->
        <div class="w-full md:w-3/12 md:mx-2">
            <!-- Profile Card -->
            <div class="bg-white p-3 border-t-4 border-primary shadow-xl">
                <div class="image overflow-hidden">
                <a class="relative block h-72 bg-gray-900 group" href="#">
                    <img class="absolute inset-0 object-cover w-full h-auto mx-auto group-hover:opacity-50"
                    src="https://i.pinimg.com/564x/4d/f1/7e/4df17ec95c6cd9b7224b220c4e67d948.jpg" alt="" />
                    <div class="relative p-2">
                      <div class="mt-56">
                        <div
                          class="transition-all transform translate-y-8 opacity-0 group-hover:opacity-100 group-hover:translate-y-0">
                          <div class="p-2">
                            <button class="px-4 py-2 text-sm text-white bg-indigo-600">Upload Picture</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">Greish_007</h1>
                <h3 class="text-gray-600 font-lg text-semibold leading-6">{{$parent->firstName . ' ' . $parent->lastName }}</h3>
                <ul
                    class="bg-yellow-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                    <li class="flex items-center py-3">
                        <span>Status</span>
                        <span class="ml-auto"><span
                                class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                    </li>
                    <li class="flex items-center py-3">
                        <span>Account Created</span>
                        <span class="ml-auto">{{$parent->created_at}}</span>
                    </li>
                </ul>
            </div>
            <!-- End of profile card -->
            <div class="my-4"></div>
            <!-- Friends card -->
            <div class="bg-white p-3 hover:shadow shadow-xl">
                <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                    <span class="text-primary">
                        <svg class="h-6 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    <span>Student Profiles</span>
                </div>
                <div class="grid grid-cols-3 md:grid-cols-2">

                    @foreach ($studs as $student)
                        <div class="text-center my-2">
                            <a href="/user/health/{{$student->id}}"><img class="h-auto w-16 rounded-full mx-auto"
                                src="{{ asset('user/assets/img/avatar/user-dp.png') }}"
                                alt=""
                                class="text-gray-800">{{$student->firstName . $student->lastName}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- End of friends card -->

            {{-- Pie chart start --}}
            <div class="my-4 hover:shadow shadow-xl ">

                <p class="text-lg bg-white p-4 font-semibold text-gray-900 text-xl">Order history Grade Chart</p>
                <div id="piechart" class="w-full h-full">
                </div>
            </div>
            {{-- End of pie chart --}}

        </div>
        <!-- Right Side -->
        
        <div class="w-full md:w-9/12 mx-2 h-auto">
            <!-- Profile tab -->
            <!-- About Section -->
            <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 py-4">
                <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                  <a href="#">
                    <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                        <i class="fa-solid fa-school"></i>
                    </div>
                  </a>
                  <div>
                    <span class="block text-2xl font-bold">
                        @php
                            echo sizeof($studs);
                        @endphp
                    </span>
                    <span class="block text-gray-500">Tagged student/s</span>
                  </div>
                </div>
                <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                    <a href="#">
                      <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                          <i class="fa-solid fa-school"></i>
                      </div>
                    </a>
                    <div>
                      <span class="block text-2xl font-bold">
                          @php
                              echo sizeof($studs);
                          @endphp
                      </span>
                      <span class="block text-gray-500">Tagged student/s</span>
                    </div>
                  </div>
                <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                  <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                    <i class="fa-solid fa-pause"></i>
                  </div>
                  <div>
                    <span class="inline-block text-2xl font-bold">{{$pending}}</span>
                    <span class="block text-gray-500">Pending Orders</span>
                  </div>
                </div>
                <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                  <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                    <i class="fa-solid fa-check"></i>
                  </div>
                  <div>
                    <span class="block text-2xl font-bold">{{$paid}}</span>
                    <span class="block text-gray-500">Finished Orders (Month)</span>
                  </div>
                </div>
              </section>
            <div class="bg-white p-3 shadow-xl rounded-sm">
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                    <span clas="text-green-500">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <span class="tracking-wide">About</span>
                </div>
                <div class="text-gray-700">
                    <div class="grid md:grid-cols-2 text-sm">
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">First Name</div>
                            <div class="px-4 py-2">{{$parent->firstName}}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Middle Name</div>
                            <div class="px-4 py-2">{{$parent->middleName}}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Last Name</div>
                            <div class="px-4 py-2">{{$parent->lastName}}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Suffix</div>
                            <div class="px-4 py-2">{{$parent->suffix}}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Gender</div>
                            <div class="px-4 py-2">{{$parent->sex}}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Contact No.</div>
                            <div class="px-4 py-2">no contact</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Current Address</div>
                            <div class="px-4 py-2">{{$parent->address}}</div>
                        </div>
                        
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Email.</div>
                            <div class="px-4 py-2 break-words">
                            
                                <a class="text-blue-800" href="mailto:jane@example.com">{{auth()->user()->email}}</a>
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Birthday</div>
                            <div class="px-4 py-2">{{$parent->birthDate}}</div>
                        </div>
                    </div>
                </div>
                <a class="text-center" href="/edit-info">
                    <div
                        class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Edit Information
                    </div>
                </a>
                
                
               
            </div>

            <div class="reqdiv bg-white p-3 shadow-xl rounded-sm">
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                    <span clas="text-green-500">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <span class="tracking-wide">Account Security</span>
                </div>
                <div class="text-gray-700">
                    <div class="grid md:grid-cols-2 text-sm">
                
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Username</div>
                            <div class="px-4 py-2">Mima</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Password</div>
                            <div class="px-4 py-2">************</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Recovery Email</div>
                            <div class="px-4 py-2">{{auth()->user()->recoveryEmail}}</div>
                        </div>      
                    </div>
                </div>
                @if ($reqbutton == 0)
                    <button
                        class="changepassreq block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        Request to change information
                    </button>
                @else
                    <button
                        class="changepassreq block w-full text-secondary text-sm font-semibold rounded-lg bg-zinc-400 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4"
                        disabled>
                        Request to change information
                    </button>
                @endif
                
            </div>
            <!-- End of about section -->

            <div class="my-4"></div>

            <!-- Experience and education -->
            <div class="bg-white p-3 shadow-xl rounded-sm">
                <div class="min-h-screen bg-white py-5">
                    <div class='overflow-x-auto w-full'>
                        <table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                            <thead class="bg-secondary">
                                <tr class="text-white tex-center">
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Order Details </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Receipt </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> Price </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> status </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Date </th>
                                    <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-center">
                                @foreach($purchases as $purchase)
                                    <x-user.order-history.order-history :purchase="$purchase"/>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End of Experience and education grid --> 
            </div>
            <!-- End of profile tab -->
        </div>
    </div>
</div>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Healthy', {{$grade[0]}}],
        ['Moderately Healthy', {{$grade[1]}}],
        ['Not Healthy', {{$grade[2]}}]
        
      ]);

      var options = {
        title: 'Order history Grade Chart'
      };

      var options = {
          legend: 'none',
          series: {
            0: { color: '#green' },
            1: { color: '#orange' },
            2: { color: '#red' }
            ,
          }
        };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>


