
@props(['anak'])
@props(['restricts'])
@props(['purchases'])
@props(['purchase_info'])
@props(['average_grade'])

@php
    $age = \Carbon\Carbon::parse($anak->birthDate)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
    $recommended_cal = 0;
    $consumed_cal = 0;
    $to_consume = $recommended_cal - $consumed_cal;
    $no_warning = true;
    $yellow_warning = true;
    $red_warning = true;

    
    //For recommended Calories
    if($age >= 6 && $age <= 9 && $anak->sex == 'M'){
        $recommended_cal = 1600;
    }
    else{
        $recommended_cal = 1470;
    }

    //For consumed calorie
    foreach($purchases as $purch){
        $date_today = \Carbon\Carbon::now('Asia/Singapore')->toDateString();
        
        $is_there = strpos($purch->created_at, $date_today);
        if($is_there === false){
           //
        }
        else{
            $consumed_cal += $purch->totalKcal;
        }
    }
    //For remaining cal
    if ($consumed_cal != 0) {
        $to_consume_percent = 100 - (($consumed_cal / $recommended_cal)*100);
        $to_consume_percent = number_format((float)$to_consume_percent, 2, '.', '');
    }
    else{
        $to_consume_percent = 100;
    }

    //for warning
    if($to_consume_percent >= 30 && $to_consume_percent <= 50){
        $no_warning = false;
        $red_warning = false;
    }
    elseif($to_consume_percent < 30){
        $no_warning = false;
        $yellow_warning = false;
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
                  src="https://i.pinimg.com/564x/ed/c3/f4/edc3f4694de738c6223cbb130b1f83dd.jpg" alt="" />
                  <div class="relative p-2">
                    <div class="mt-56">
                      <div
                        class="transition-all transform translate-y-8 opacity-0 group-hover:opacity-100 group-hover:translate-y-0">
                        <div class="p-2">
                          <button class="px-4 py-2 text-sm text-white bg-indigo-600 hover:bg-indigo-800">Upload Picture</button>
                        </div>
                      </div>s
                    </div>
                  </div>
                </a>
              </div>
              <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$anak->firstName . ' ' . $anak->middleName . ' ' . $anak->lastName . ' ' . $anak->stud_suffix }}</h1>
              <h3 class="text-gray-600 font-lg text-semibold leading-6">{{$anak->LRN}}</h3>
              <ul
                  class="bg-yellow-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                  <li class="flex items-center py-3">
                      <span>Status</span>
                      <span class="ml-auto"><span
                              class="bg-green-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                  </li>
                  <li class="flex items-center py-3">
                      <span>Birth Date</span>
                      <span class="ml-auto">{{$anak->birthDate}}</span>
                  </li>
                  <li class="flex items-center py-3">
                      <span>Grade & Sec.</span>
                      <span class="ml-auto">{{$anak->grade . ' ' . $anak->section}}</span>
                  </li>
                  <li class="flex items-centesr py-3">
                      <span>Adviser</span>
                      <span class="ml-auto">Post Malone</span>
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
                  <span>Parent Profile</span>
              </div>
              <div class="grid grid-cols-3 md:grid-cols-2">
                  <div class="text-center my-2 hover:text-primary">
                      <a href="/user/user-account"><img class="h-auto w-16 rounded-full mx-auto border-4 border-white hover:border-primary"
                          src="https://i.pinimg.com/564x/af/83/19/af8319cc30be857f61493c59937f40e4.jpg"
                          alt=""
                          class="text-gray-800">Post Malone</a>
                  </div>
                  
              </div>
          </div>
          <!-- End of friends card -->
      </div>
      <!-- Right Side -->
      
      <div class="w-full md:w-9/12 h-auto">
          <!-- Profile tab -->
          <!-- About Section -->
          <div class="bg-primaryLight p-3 shadow-xl mt-4 rounded-sm">
              <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                  <span clas="text-green-500">
                      <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                  </span>
                  <span class="md:text-base text-sm tracking-wide">Recommended Daily Calorie Intake Chart</span>
              </div>
          </div>
          <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 py-4">
              <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                <a href="#">
                  <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                      <i class="fa-solid fa-chart-simple"></i>
                  </div>
                </a>
                <div>
                  <span class="block text-xl font-bold">{{$recommended_cal}}</span>
                  <span class="block text-gray-500">Recommended Calorie Intake</span>
                </div>
              </div>
              <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                
                @if ($no_warning)
                    <div class="flex relative group">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                            <i class="fa-solid fa-utensils"></i>
                        </div>
                        <ul class="absolute bg-white p-3 w-40 -top-8 left-12 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50">
                            <h4>No warnings at the moment.</h4>        
                        </ul>
                    </div>
                @elseif($yellow_warning)
                    <div class="flex relative group">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <ul class="absolute bg-white p-3 w-40 -top-8 left-12 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50">
                            <h4>Yellow warning.</h4>        
                        </ul>
                    </div>
                @elseif($red_warning)
                    <div class="flex relative group">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-red-500 rounded-full mr-6">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <ul class="absolute bg-white p-3 w-40 -top-8 left-12 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50">
                            <h4>Red warning.</h4>        
                        </ul>
                    </div>
                @endif
                
                <div>
                    <span class="block text-xl font-bold">{{$consumed_cal}}</span>
                    <span class="block text-gray-500">Today's Calorie Intake</span>
                </div>
              </div>
              <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                  <i class="fa-solid fa-circle-info"></i>
                </div>
                <div>
                  <span class="inline-block text-xl font-bold">{{$to_consume_percent.'%'}}</span>
                  <span class="block text-gray-500">Remaining Calorie Intake</span>
                </div>
              </div>
              <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                  <i class="fa-solid fa-clock"></i>
                </div>
                <div>
                  <span class="block text-xl font-bold">{{$average_grade}}</span>
                  <span class="block text-gray-500">Average Food Grade</span>
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
                  <span class="tracking-wide">Personal Information</span>
              </div>
              <div class="text-gray-700">
                  <div class="grid md:grid-cols-2 text-sm">
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">First Name</div>
                          <div class="px-4 py-2">{{$anak->firstName}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Middle Name</div>
                          <div class="px-4 py-2">{{$anak->middleName}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Last Name</div>
                          <div class="px-4 py-2">{{$anak->lastName}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Suffix</div>
                          <div class="px-4 py-2">{{$anak->suffix}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Gender</div>
                          <div class="px-4 py-2">{{$anak->sex}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Current Address</div>
                          <div class="px-4 py-2">sample</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Birthday</div>
                          <div class="px-4 py-2">{{$anak->birthDate}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Account Created</div>
                          <div class="px-4 py-2">{{$anak->created_at}}</div>
                      </div>
                  </div>
              </div>
              <button
                  class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                  Edit Information</button>
          </div>

          <div class="bg-white p-3 shadow-xl rounded-sm">
              <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                  <span clas="text-green-500">
                      <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                  </span>
                  <span class="tracking-wide">Health Information</span>
              </div>
              <div class="text-gray-700">
                  <div class="grid md:grid-cols-2 text-sm">
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Height</div>
                          <div class="px-4 py-2">1.6</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">Weight</div>
                          <div class="px-4 py-2">30</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-semibold">BMI</div>
                          <div class="px-4 py-2">
                            @php
                                $height = 1.6;
                                $weight = 30;
                                $bmi = 0;

                                $bmi = $weight / ($height^2);
                                echo $bmi;
                            @endphp
                          </div>
                      </div>
                  </div>
              </div>
              <button
                  class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                  Request to Change Information</button>
          </div>

          <div class="my-4"></div>

          <!-- End of about section -->
          <div class="bg-white p-3 shadow-xl rounded-sm">
              <div class="min-h-auto bg-white py-5">
                  <div class='w-full'>
                      <div class="flex w-full items-center space-x-2 font-semibold text-gray-900 leading-8">
                          <span clas="text-green-500 float-left">
                              <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                              </svg>
                          </span>
                          <span class="tracking-wide float-left">Restricted Food Items</span>
                          <a href="/users/menu/{{$anak->id}}"><span class="tracking-wide float-right">Back to menu</span></a>
                      </div>

                      <div class="my-4"></div>
                      <div class="restriction flex flex-row overflow-x-auto">
                        {{-- @if (sizeof($restricts) == 0) --}}
                          @foreach ($restricts as $restrict)
                            @foreach ($restrict as $res)
                              <x-user.health-mod.restrict :restrict="$res" :anak_id="$anak->id"/>
                            @endforeach
                          @endforeach
                        {{-- @else
                            <div class="flex flex row">
                              <p class="text-lg font-bold text-[#ffc300]">No restricted foods.</p>
                            </div>
                        @endif --}}
                        
                      </div>
                      
                      
                  </div>
              </div>
                      
      
              <!-- End of Experience and education grid -->
              
          </div>

          <div class="my-4"></div>

          <!-- Experience and education -->
          <div class="bg-white h-1/3 p-3 shadow-xl rounded-sm">
              <div class="bg-white py-5">
                  <div class='overflow-x-auto h-96 w-full'>
                      <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                          <span clas="text-green-500">
                              <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                              </svg>
                          </span>
                          <span class="tracking-wide">Order History</span>
                      </div>
                      <table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-auto'>
                          <thead class="bg-secondary">
                              <tr class="text-white text-left">
                                  <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Order number </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4"> View </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Price </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> status </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Date </th>
                                  
                              </tr>
                          </thead>
                          <tbody class="divide-y divide-gray-200">
                            @foreach ($purchase_info as $purch)
                                @if (!empty($purch))
                                <tr class="">
                                    <td class="px-6 py-4 text-center">{{$purch[0]->purchase_id}}</td>
                                    <td class="flex relative group px-6 py-4 text-center">
                                        <i class="relative fa-solid fa-eye"></i>
                                        <!-- Submenu starts -->
                                        <span class="absolute flex flex-col bg-white p-3 w-auto top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-90">
                                            <table class="w-full">
                                            <thead class="flex flex-row text-center">
                                                <th class="border-solid border-4 text-lg w-20 text-[#ffc300] font-bold"> Fat </th>
                                                <th class="border-solid border-4 text-lg w-20 text-[#ffc300] font-bold"> Sat. Fat </th>
                                                <th class="border-solid border-4 text-lg w-20 text-[#ffc300] font-bold"> Sugar </th>
                                                <th class="border-solid border-4 text-lg w-20 text-[#ffc300] font-bold"> Calories </th>
                                            </thead>
                                            @php
                                                $fat = 0;
                                                $sat_fat = 0;
                                                $sugar = 0;
                                                $cal = 0;
                                            @endphp
                                            @foreach ($purch as $item)
                                                @php
                                                    $fat += $item->totFat;
                                                    $sat_fat += $item->satFat;
                                                    $sugar += $item->sugar;
                                                    $cal += $item->kcal; 
                                                @endphp
                                            @endforeach
                                            <tbody>
                                                <tr class="flex flex-row ">
                                                <td class="border-solid border-2 text-lg text-center w-20 font-bold">{{$fat}}</td>
                                                <td class="border-solid border-2 text-lg text-center w-20 font-bold">{{$sat_fat}}</td>
                                                <td class="border-solid border-2 text-lg text-center w-20 font-bold">{{$sugar}}</td>
                                                <td class="border-solid border-2 text-lg text-center w-20 font-bold">{{$cal}}</td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </span>
                                    <!-- Submenu ends -->
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class=""><span>&#8369;</span>20.0</p>
                                    </td>
                                    <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-red-600 font-semibold px-2 rounded-full"> Pending </span> </td>
                                    {{-- <td class="px-6 py-4 text-center"> {{$purch[0]->created_at}} </td> --}}
                                    <td class="px-6 py-4 text-center"> ........ </td>
                                </tr>
                                @endif
                            @endforeach   
                          </tbody>
                      </table>
                  </div>
              </div>
                      
      
              <!-- End of Experience and education grid -->
              
          </div>
          <!-- End of profile tab -->
          <div class="my-4"></div>

          <!-- Experience and education -->
          {{-- <div class="bg-white p-3 shadow-xl rounded-sm">
              <div class="min-h-auto bg-white py-5">
                  <div class='overflow-x-auto w-full'>
                      <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                          <span clas="text-green-500">
                              <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                  stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                              </svg>
                          </span>
                          <span class="tracking-wide">Calorie Intake Table</span>
                      </div>
                      <table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                          <thead class="bg-secondary">
                              <tr class="text-white text-left">
                                  <th class="font-semibold text-sm uppercase px-6 py-4"> Order Details </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4"> Price </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> status </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Date </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4"> </th>
                              </tr>
                          </thead>
                          <tbody class="divide-y divide-gray-200">
                              <tr>
                                  <td class="px-6 py-4">
                                      <div class="flex items-center space-x-3">
                                          <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='{{ asset('user/assets/img/avatar/user-dp.png') }}' /> </div>
                                          <div>
                                              <p> Order to: Student Name</p>
                                              <p class="text-gray-500 text-sm font-semibold tracking-wide"> Spaghetti </p>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="px-6 py-4">
                                      <p class=""><span>&#8369;</span>20.0</p>
                                  </td>
                                  <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Paid </span> </td>
                                  <td class="px-6 py-4 text-center"> Date </td>
                                  <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                              </tr>
                              <tr>
                                  <td class="px-6 py-4">
                                      <div class="flex items-center space-x-3">
                                          <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='{{ asset('user/assets/img/avatar/user-dp.png') }}' /> </div>
                                          <div>
                                              <p> Order to: Student Name</p>
                                              <p class="text-gray-500 text-sm font-semibold tracking-wide"> Spaghetti </p>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="px-6 py-4">
                                      <p class=""><span>&#8369;</span>20.0</p>
                                  </td>
                                  <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Paid </span> </td>
                                  <td class="px-6 py-4 text-center"> Date </td>
                                  <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                              </tr>
                              <tr>
                                  <td class="px-6 py-4">
                                      <div class="flex items-center space-x-3">
                                          <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='{{ asset('user/assets/img/avatar/user-dp.png') }}' /> </div>
                                          <div>
                                              <p> Order to: Student Name</p>
                                              <p class="text-gray-500 text-sm font-semibold tracking-wide"> Spaghetti </p>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="px-6 py-4">
                                      <p class=""><span>&#8369;</span>20.0</p>
                                  </td>
                                  <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Paid </span> </td>
                                  <td class="px-6 py-4 text-center"> Date </td>
                                  <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                              </tr>
                              <tr>
                                  <td class="px-6 py-4">
                                      <div class="flex items-center space-x-3">
                                          <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='{{ asset('user/assets/img/avatar/user-dp.png') }}' /> </div>
                                          <div>
                                              <p> Order to: Student Name</p>
                                              <p class="text-gray-500 text-sm font-semibold tracking-wide"> Spaghetti </p>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="px-6 py-4">
                                      <p class=""><span>&#8369;</span>20.0</p>
                                  </td>
                                  <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Paid </span> </td>
                                  <td class="px-6 py-4 text-center"> Date </td>
                                  <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                              </tr>
                              <<tr>
                                  <td class="px-6 py-4">
                                      <div class="flex items-center space-x-3">
                                          <div class="inline-flex w-10 h-10"> <img class='w-10 h-10 object-cover rounded-full' alt='User avatar' src='{{ asset('user/assets/img/avatar/user-dp.png') }}' /> </div>
                                          <div>
                                              <p> Order to: Student Name</p>
                                              <p class="text-gray-500 text-sm font-semibold tracking-wide"> Spaghetti </p>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="px-6 py-4">
                                      <p class=""><span>&#8369;</span>20.0</p>
                                  </td>
                                  <td class="px-6 py-4 text-center"> <span class="text-white text-sm w-1/3 pb-1 bg-green-600 font-semibold px-2 rounded-full"> Paid </span> </td>
                                  <td class="px-6 py-4 text-center"> Date </td>
                                  <td class="px-6 py-4 text-center"> <a href="#" class="text-purple-800 hover:underline">Edit</a> </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div> --}}
                      
      
              <!-- End of Experience and education grid -->
              
          </div>
      </div>
  </div>
</div>
