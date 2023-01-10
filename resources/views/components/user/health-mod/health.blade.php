@include('sweetalert::alert')

@props(['anak'])
@props(['parent'])
@props(['restricts'])
@props(['purchases'])
@props(['average_grade'])
@props(['bmi'])

@php

    $age = \Carbon\Carbon::parse($anak->birthDate)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
    $recommended_cal = 0;
    $recommended_fat = 0;
    $recommended_satFat = 0;
    $recommended_sugar = 0;
    $recommended_sodium = 0;

    $consumed_cal = 0;
    $to_consume = $recommended_cal - $consumed_cal;
    $no_warning = true;
    $yellow_warning = true;
    $red_warning = true;


    $consumed_fat = 0;
    $consumed_satFat = 0;
    $consumed_sugar = 0;
    $consumed_sodium = 0;

    
    //For recommended Calories and 4 macro
    if($age >= 6 && $age <= 9 && $anak->sex == 'M'){
        $recommended_cal = 1600;
        $recommended_fat = 30;
        $recommended_satFat = 20.74;
        $recommended_sugar = 20.74;
        $recommended_sodium = 2000;
    }
    else{
        $recommended_cal = 1470;
        $recommended_fat = 30;
        $recommended_satFat = 19.1;
        $recommended_sugar = 19.1;
        $recommended_sodium = 2000;
    }

    //For consumed calorie and 4 macro
    foreach($purchases as $purch){
        $date_today = \Carbon\Carbon::now('Asia/Singapore')->toDateString();
        
        $is_there = strpos($purch->created_at, $date_today);
        if($is_there === false){
           //
        }
        else{
            $consumed_cal += $purch->totalKcal;
            $consumed_fat += $purch->totalTotFat;
            $consumed_satFat += $purch->totalSatFat;
            $consumed_sugar += $purch->totalSugar;
            $consumed_sodium += $purch->totalSodium;
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
                  src="https://www.kindpng.com/picc/m/57-573752_school-student-images-png-transparent-png.png" alt="" />
                  <div class="relative p-2">
                    <div class="mt-56">
                      <div
                        class="transition-all transform translate-y-8 opacity-0 group-hover:opacity-100 group-hover:translate-y-0">
                        <div class="p-2">
                          <button class="px-4 py-2 text-sm text-white bg-indigo-600 hover:bg-indigo-800">Upload Picture</button>
                        </div>
                      </div>
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
                      <span class="ml-auto">{{$anak->adviser}}</span>
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
                          class="text-gray-800">{{$parent->firstName . ' ' . $parent->lastName}}</a>
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
                    <i class="fa-solid fa-chart-line"></i>
                  </span>
                  <span class="md:text-base text-sm tracking-wide">Recommended Daily Calorie Intake Chart</span>
              </div>
          </div>
          <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 py-4">
              <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">

                <div class="flex relative group">
                    <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                    <ul class="absolute bg-white p-3 w-60 -top-8 left-12 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50">
                        <p class="text-secondary text-lg font-bold">Recommended amount: </p>  
                        <p><b> Fat:</b> {{$recommended_fat}}g</p> 
                        <p><b> Saturated Fat:</b> {{$recommended_satFat}}g</p>  
                        <p><b> Sugar:</b>{{$recommended_sugar}}g</p>  
                        <p><b> Sodium:</b> {{$recommended_sodium}}mg</p>   
                    </ul>
                </div>

                <div>
                  <span class="block text-xl font-bold">{{$recommended_cal}}</span>
                  <span class="block font-bold text-gray-500">Recommended Calorie Intake</span>
                </div>
              </div>
              <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                
                @if ($no_warning)
                    <div class="flex relative group">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                            <i class="fa-solid fa-utensils"></i>
                        </div>
                        <ul class="absolute bg-white p-3 w-60 -top-8 left-12 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50">
                            <p class="text-secondary text-lg font-bold">No warnings at the moment.</p>  
                            <p class="text-secondary"><b>Consumed:</b></p> 
                            <p><b> Fat:</b> {{$consumed_fat}}g</p> 
                            <p><b> Sat Fat:</b> {{$consumed_satFat}}g</p>  
                            <p><b> Sugar:</b>{{$consumed_sugar}}g</p>  
                            <p><b> Sodium:</b> {{$consumed_sodium}}mg</p>   

                        </ul>
                    </div>
                @elseif($yellow_warning)
                    <div class="flex relative group">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primary rounded-full mr-6">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <ul class="absolute bg-white p-3 w-60 -top-8 left-12 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50">
                            <p class="text-primary text-lg font-bold">Yellow Warning.</p>  
                            <p class="text-secondary"><b>Consumed:</b></p> 
                            <p><b> Fat:</b> {{$consumed_fat}}g</p> 
                            <p><b> Sat Fat:</b> {{$consumed_satFat}}g</p>  
                            <p><b> Sugar:</b>{{$consumed_sugar}}g</p>  
                            <p><b> Sodium:</b> {{$consumed_sodium}}mg</p>   
                        </ul>
                    </div>
                @elseif($red_warning)
                    <div class="flex relative group">
                        <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-red-500 rounded-full mr-6">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <ul class="absolute bg-white p-3 w-60 -top-8 left-12 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50">
                            <p class="text-red-500 text-lg font-bold">Red Warning.</p>  
                            <p class="text-secondary"><b>Consumed:</b></p> 
                            <p><b> Fat:</b> {{$consumed_fat}}g</p> 
                            <p><b> Sat Fat:</b> {{$consumed_satFat}}g</p>  
                            <p><b> Sugar:</b>{{$consumed_sugar}}g</p>  
                            <p><b> Sodium:</b> {{$consumed_sodium}}mg</p>   
                        </ul>
                    </div>
                @endif
                
                <div>
                    <span class="block text-xl font-bold">{{$consumed_cal}}</span>
                    <span class="block font-bold text-gray-500">Today's Calorie Intake</span>
                </div>
              </div>
              <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                  <i class="fa-solid fa-circle-info"></i>
                </div>
                <div>
                  <span class="inline-block text-xl font-bold">{{$to_consume_percent.'%'}}</span>
                  <span class="block font-bold text-gray-500">Remaining Calorie Intake</span>
                </div>
              </div>
              <div class="flex items-center p-8 bg-white shadow-xl rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-secondary bg-primaryLight rounded-full mr-6">
                  <i class="fa-solid fa-clock"></i>
                </div>
                <div>
                  <span class="block text-xl font-bold">{{$average_grade}}</span>
                  <span class="block font-bold text-gray-500">Average Food Grade</span>
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
                  <span class="tracking-wide font-bold">Personal Information</span>
              </div>
              <div class="text-gray-700">
                  <div class="grid md:grid-cols-2 text-sm">
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">First Name</div>
                          <div class="px-4 py-2">{{$anak->firstName}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">Middle Name</div>
                          <div class="px-4 py-2">{{$anak->middleName}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">Last Name</div>
                          <div class="px-4 py-2">{{$anak->lastName}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">Suffix</div>
                          <div class="px-4 py-2">{{$anak->suffix}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">Gender</div>
                          <div class="px-4 py-2">{{$anak->sex}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">Current Address</div>
                          <div class="px-4 py-2">{{$parent->address}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">Birthday</div>
                          <div class="px-4 py-2">{{$anak->birthDate}}</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">Account Created</div>
                          <div class="px-4 py-2">{{$anak->created_at}}</div>
                      </div>
                  </div>
              </div>
              <div class="w-full md:flex">
                <a class="w-full text-center mr-4" href="/health/edit-info/{{$anak->id}}">
                    <div
                        class="block w-full text-secondary font-bold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 md:my-4">
                        Edit Information
                    </div>
                </a>
                <a class="w-full text-center" href="/user/health-report/{{$anak->id}}">
                    <div
                        class="block w-full text-secondary font-bold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 md:my-4">
                        View health report
                    </div>
                </a>
              </div>
                
          </div>

          <div class="bg-white p-3 shadow-xl rounded-sm">
              <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                  <span clas="text-green-500">
                    <i class="fa-solid fa-suitcase-medical"></i>
                  </span>
                  <span class="tracking-wide font-bold">Health Information</span>
              </div>
              <div class="text-gray-700 mb-4">
                  <div class="grid md:grid-cols-2 text-sm">
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">Height</div>
                          <div class="px-4 py-2">{{$bmi->Q1Height}} cm</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">Weight</div>
                          <div class="px-4 py-2">{{$bmi->Q1Weight}} kgs</div>
                      </div>
                      <div class="grid grid-cols-2">
                          <div class="px-4 py-2 font-bold">BMI</div>
                          <div class="px-4 py-2">
                            {{$bmi->Q1BMI}}
                          </div>
                      </div>
                  </div>
              </div>
              {{-- <button
                  class="block w-full text-secondary text-sm font-semibold rounded-lg bg-yellow-100 hover:bg-primaryLight focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                  Request to Change Information</button> --}}
          </div>

          <div class="my-4"></div>

          <!-- End of about section -->
          <div class="bg-white p-3 shadow-xl rounded-sm">
              <div class="min-h-auto bg-white py-2">
                  <div class='w-full'>
                      <div class="flex w-full items-center space-x-2 font-semibold text-gray-900 leading-8">
                          <span clas="text-green-500 float-left">
                            <i class="fa-sharp fa-solid fa-circle-exclamation"></i>
                          </span>
                          <div class="items-end w-full">
                            <span class="tracking-wide font-bold float-left">Restricted Food Items</span>
                            <a href="/user/menu/{{$anak->id}}"><span class="tracking-wide font-bold hover:text-primary float-right"><i class="fa-solid fa-right-from-bracket"></i></span></a>
                        </div>
                          
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
          <div class="bg-white h-96 p-3 shadow-xl rounded-sm">
              <div class="bg-white">
                  <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                      <span clas="text-green-500">
                        <i class="fa-solid fa-list-radio"></i>
                      </span>
                      <span class="tracking-wide font-bold">Order History</span>
                  </div>
                  <div class='overflow-x-auto h-80 w-full'>
                      
                      <table class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300'>
                          <thead class="bg-secondary">
                              <tr class="text-white text-left">
                                  <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Order number </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4"> View </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Price </th>
                                  <th class="font-semibold text-sm uppercase px-6 py-4 text-center"> Date </th>
                                  
                              </tr>
                          </thead>
                          <tbody class="divide-y divide-gray-200">
                            @foreach ($purchases as $purch)
                                <tr class="">
                                    <td class="px-6 py-4 text-center">{{$purch->id}}</td>
                                    <td class="flex relative group px-6 py-4 text-center">
                                        <i class="relative fa-solid fa-eye ml-2 "></i>
                                        <!-- Submenu starts -->
                                        <span class="absolute flex flex-col bg-white p-3 w-auto left-16 -top-8 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-90">
                                            <table class="w-full">
                                            <thead class="flex flex-row text-center">
                                                <th class="border-solid border-4 text-lg w-20 text-[#ffc300] font-bold"> Fat </th>
                                                <th class="border-solid border-4 text-lg w-20 text-[#ffc300] font-bold"> Sat. Fat </th>
                                                <th class="border-solid border-4 text-lg w-20 text-[#ffc300] font-bold"> Sugar </th>
                                                <th class="border-solid border-4 text-lg w-20 text-[#ffc300] font-bold"> Calories </th>
                                            </thead>
                                            
                                            <tbody>
                                                <tr class="flex flex-row ">
                                                <td class="border-solid border-2 text-lg text-center w-20 font-bold">{{$purch->totalTotFat}}</td>
                                                <td class="border-solid border-2 text-lg text-center w-20 font-bold">{{$purch->totalSatFat}}</td>
                                                <td class="border-solid border-2 text-lg text-center w-20 font-bold">{{$purch->totalSugar}}</td>
                                                <td class="border-solid border-2 text-lg text-center w-20 font-bold">{{$purch->totalKcal}}</td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </span>
                                    <!-- Submenu ends -->
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-center"><span>&#8369;</span>{{$purch->totalAmount}}</p>
                                    </td>
                                    {{-- <td class="px-6 py-4 text-center"> {{$purch[0]->created_at}} </td> --}}
                                    <td class="px-6 py-4 text-center">{{$purch->created_at}}</td>
                                </tr>
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
