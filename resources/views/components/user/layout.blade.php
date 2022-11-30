<!doctype html>
<html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <meta name="csrf-token" content="{{ csrf_token() }}" /> 

      <!-- Favicons -->
      <link href="img/favicon/favicon.ico" rel="icon">
      <link href="img/favicon/apple-touch-icon.ico" rel="apple-touch-icon">
      <title>
        Welcome
      </title>
      <meta name="description" content="Simple landind page" />
      <meta name="keywords" content="" />
      <meta name="author" content="" />

     
      <link rel="stylesheet" type="text/css" href="{{ url('css/main.css') }}">

      <!--Replace with your tailwind.css once created-->
      <script src="https://kit.fontawesome.com/d00886c359.js" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
      <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
        />

      {{-- For google charts --}}
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      {{-- Sweet Alert --}}
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      {{-- Html2Canvas --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      
      {{-- tailwind --}}
      <script src="https://cdn.tailwindcss.com"></script>
      <script>
        tailwind.config = {
            theme: {
                screens: {
                          sm: '360px',
                          md: '768px',
                          lg: '976px',
                          xl: '1440px',
                        },
                extend: {
                    colors: {
                    primary: 'hsl(46, 100%, 50%)', // #ffc300
                    primaryLight: 'hsl(46, 100%, 80%)', 	// #ffe799
                    primaryDark: 'hsl(46, 100%, 45%)', //	#e6b000
                    secondary: 'hsl(219, 46%, 24%)',  // #213559
                    secondaryLight:  'hsl(218, 31%, 31%)', // #374968
                            }
                        },
                    },
                 };
      </script>
      {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

      <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
      <style>
      .gradient {
          background: linear-gradient(270deg, #ffc300 0%, white 100%)
        }
  
      .gradient2 {
          background: linear-gradient(0deg, #ffc300 0%, #ebcc34 100%)
      }
        
      .mobile-menu {
      left: -200%;
      transition: 0.5s;
      }
  
      .mobile-menu.active {
      left: 0;
      }
  
      .mobile-menu ul li ul {
      display: none;
      }
  
      .mobile-menu ul li:hover ul {
      display: block;
      }
  
      .blueColor {
        border-color: #1565c0;
      }

      .landing-image{
          background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset('user/assets/img/landing-bg.jpg') }}") no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }

      .swiper-slide {
        position: relative;
        display: inline-block; /* <= shrinks container to image size */
        transition: transform 150ms ease-in-out;
      }

      .swiper-slide svg {
        position: absolute;
        bottom: -0.1rem;
        left: 0;
      }

      .swiper-logo {
        position: absolute;
        bottom: 15px;
        margin-left: 0;
        left: 45%;
        z-index: 100;
      }

      #to-top {
        display: inline-block;
        background-color: #FF9800;
        width: 50px;
        height: 50px;
        text-align: center;
        border-radius: 4px;
        position: fixed;
        bottom: 30px;
        right: 30px;
        transition: background-color .3s, 
          opacity .5s, visibility .5s;
        opacity: 0;
        visibility: hidden;
        z-index: 1000;
      }
      #to-top::after {
        content: "\f077";
        font-family: FontAwesome;
        font-weight: normal;
        font-style: normal;
        font-size: 2em;
        line-height: 50px;
        color: #fff;
      }
      #to-top:hover {
        cursor: pointer;
        background-color: #333;
      }
      #to-top:active {
        background-color: #555;
      }
      #to-top.show {
        opacity: 1;
        visibility: visible;
      }

      @media (max-width: 768px){
        .swiper-logo{
          left: 30%;
        }
      }

      </style>
    </head>
    <body class="bg-white">

      {{-- Sweet alert for non-livewire components --}}
      {{-- @include('sweetalert::alert') --}}
    
      <header class="fixed top-0 z-50 h-20 w-screen sm:h-15 bg-primary">
        <nav class="relative px-2">
          
          <div class="container mx-auto flex justify-between space-y-6 items-center">
              <a class="toggleColour text-secondary no-underline hover:no-underline font-bold text-2xl flex lg:text-4xl" 
              href="#"
              >
              <img class="h-10 fill-current align-middle" width="50.502" src="{{ asset('storage/admin/logo-32X32.png') }}">
              <img class="h-12 fill-current align-left" width="50.502" src="{{ asset('storage/admin/school-images/school-logo.png') }}">
            </a>
             
    
              <ul class="hidden md:flex space-x-6 leading-9 font-bold text-secondary">
                <li><a href="/user/home" class="hover:text-white">Home</a></li> 
                <li><a href="/user/menu-landing" class="hover:text-white">Menu</a></li>
                <li class="flex relative group">
                  <a href="#" class="mr-1 hover:text-black">Student</a> 
                  <i class="fa-solid fa-chevron-down fa-2xs pt-3"></i>
                  <!-- Submenu starts -->

                  <ul class="absolute bg-white p-3 w-36 top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50">
                    @foreach ($studs as $student)
                      <li class="text-sm hover:bg-slate-100 leading-8 my-3"><a href="/user/health/{{$student->id}}"><img src="{{ asset('user/assets/img/avatar/user-dp.png') }}" class="w-8 h-8 rounded-full border-4 border-primary mr-4 inline">{{$student->firstName}}</a></li>
                    @endforeach
                  </ul>
                  <!-- Submenu ends -->
                </li>

                
              </ul>

              <ul class="hidden md:flex space-x-6 leading-9 font-bold text-secondary">
                <li class="flex relative group">
                  <a href="#" class="hover:text-black"><i class="fa-solid fa-envelope fa-fw fa-xl"></i></a>
                  <i class="fa-solid fa-chevron-down fa-2xs pt-3"></i>
                  <ul class="absolute bg-white p-3 w-96 -left-80 top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50"> 
                     <h3 class="text-xl">Notifications</h3>
                      @if ($notifs == null)
                        <div class="if-null text-center">
                            <p>No notifications</p>
                        </div>
                      @else
                        @foreach ($notifs as $notif)
                          <x-user.notif-modal.notif-modal :notif="$notif" />
                        @endforeach
                      @endif
                      {{-- @if(empty($notifs))
                          <div class="if-null text-center">
                              <p>No notifications</p>
                          </div>
                      @else
                          <div class="overflow-y-scroll h-80">
                              @foreach ($notifs as $notif)
                                  <x-user.notif-modal.notif-modal :notif="$notif" />
                              @endforeach
                          </div>
                      @endif --}}
                      <div class="del-all">
                        <button class="text-red-500" onclick="deleteAll()">
                          <span>Delete all</span>
                        </button>
                      </div>
                  </ul>
                </li>
                <li class="flex relative group ">
                  <a href="#" class="mr-1  hover:text-white"><img id="desktop-icon" src="{{ asset('user/assets/img/avatar/user-dp.png') }}" class="w-12 h-12 border-4 rounded-full hover:border-blue-600"></a> 
                  <i class="fa-solid fa-chevron-down fa-2xs pt-3 hidden"></i>
                  <!-- Submenu starts -->
                  <ul class="absolute bg-white p-3 w-52 top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50 right-0">
                    <li class="text-sm hover:bg-slate-100 leading-8"><a href="/user/user-account">Account Info</a></li>
                    {{-- @php
                        $currentTime = \Carbon\Carbon::now('Asia/Singapore')->toTimeString();
                        if($currentTime > '12:42:00' && $currentTime < '12:44:00'){
                            echo '<li><a href="/users/survey">Survey</a></li>';
                        }
                    @endphp --}}
                    <li><a href="/users/survey">Survey</a></li>
                    <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">Billing</a></li>
                    <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">Forms</a></li>
                    <li class="text-sm hover:bg-slate-100 leading-8"><a href="#">Settings</a></li>
                    <li class="text-sm hover:bg-slate-100 leading-8 mt-6"><a href="#" class="bg-secondaryLight px-5 py-1 rounded-3xl font-bold hover:bg-red-600 text-white hidden md:flex" role="button">Log Out</a>
                    </li>
                  </ul>
                  <!-- Submenu ends -->
                </li>
                
              </ul>
    

            
            <!-- Mobile menu icon -->
            <div class="flex relative-group ml-auto md:hidden">
              <a href="#" class="hover:text-white text-secondary"><i class="fa-solid fa-envelope fa-fw fa-xl "></i></a>
            </div>
            <button id="mobile-icon" onclick="changeMyColor()" class="md:hidden w-12 h-12 mx-2 border-4 rounded-full hover:border-blue-600">
              <img src="{{ asset('user/assets/img/avatar/user-dp.png') }}" class="rounded-full"> <i onclick="changeIcon(this)" class="fa-solid fa-bars invisible"></i>
            </button> 
            
            </div>
          
          <!-- Mobile menu -->
          <div class="md:hidden flex justify-center mt-3 w-full">
            <div id="mobile-menu" class="mobile-menu absolute z-50 top-23 w-3/4"> <!-- add hidden here later -->
              <ul class="bg-gray-100 shadow-lg leading-9 font-bold h-screen">
                <li class="border-b-2 border-gray-200 hover:bg-primary hover:text-white pl-4 flex py-2 px-2"><a href="#" class="block pl-7 uppercase"><img src="{{ asset('user/assets/img/avatar/user-dp.png') }}" class="w-12 h-12 rounded-full border-4 border-gray-50 mr-4 inline">Sample</a></li>
                <li class="group border-b-2 border-white hover:bg-primary hover:text-white pl-4"><a href="{{ url('test') }}" class="block pl-7"><i class="fa-solid fa-house-user fa-fw text-primary mr-4 group-hover:text-white"></i></i>Home</a></li>
                <li class="group border-b-2 border-white hover:bg-primary hover:text-white pl-4"><a href="/users/menu" class="block pl-7"><i class="fa-solid fa-bars fa-fw text-primary mr-4 group-hover:text-white"></i></i>Menu</a></li>
                <li class="group border-b-2 border-white hover:bg-primary hover:text-white">
                  <a href="#" class="block pl-11"><i class="fa-solid fa-school fa-fw text-primary mr-4 group-hover:text-white"></i>Student<i class="fa-solid fa-chevron-down fa-2xs pt-4"></i></a> 
                  
                  <!-- Submenu starts -->
                  <ul class="bg-white text-gray-800 w-full">
                    {{-- @foreach ($studs as $student)
                      <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="/users/health/{{$student->id}}><img src="{{ asset('user/assets/img/avatar/user-dp.png') }}" class="w-8 h-8 rounded-full border-4 border-primary mr-4 inline">{{$student->stud_FN}}</a></li>
                    @endforeach --}}
                  </ul>
                  <!-- Submenu ends -->
                </li>
                <li class="group border-b-2 border-white hover:bg-primary hover:text-white">
                  <a href="#" class="block pl-11"><i class="fa-solid fa-user fa-fw text-primary mr-4 group-hover:text-white"></i>Account<i class="fa-solid fa-chevron-down fa-2xs pt-4"></i></a> 
                  
                  <!-- Submenu starts -->
                  <ul class="bg-white text-gray-800 w-full">
                    <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="/users/user-account">Account Info</a></li>
                    <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="#">Dashboard</a></li>
                    <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="#">Billing</a></li>
                    <li class="text-sm leading-8 font-normal hover:bg-slate-200"><a class="block pl-16" href="#">Forms</a></li>
                  </ul>
                  <!-- Submenu ends -->
                </li>
                <li class="group border-b-2 border-white hover:bg-primary hover:text-white pl-4"><a href="#" class="block pl-7"><i class="fa-solid fa-gear fa-fw text-primary mr-4 group-hover:text-white"></i>Settings</a></li>
                <li class="group border-b-2 border-white hover:bg-primary hover:text-white pl-4"><a href="#" class="block pl-7"><i class="fa-solid fa-address-book fa-fw text-primary mr-4 group-hover:text-white"></i>Contact</a></li>
                <li class="group border-b-2 border-white hover:bg-red-600 hover:text-white pl-4"><a href="#" class="block pl-7"><i class="fa-solid fa-right-from-bracket fa-fw text-red-600 mr-4 group-hover:text-white"></i>Log Out</a></li>
              </ul> 
              
              </div>
          </div>
    
        </nav>
      </header>

      <a id="to-top"></a>
      
      {{ $slot }}
      
  
  
      <!--Footer-->
    <footer class="flex flex-col items-center justify-between p-10 border-t-4 border-t-primary bg-white sm:flex-row">
    
        <p class="text-sm text-gray-600">© 2022 School Name | <a href="#" class="text-blue-600">Terms of Use</a> | <a href="#" class="text-blue-600">Privacy Statement</a></p>
    
        <div class="flex -mx-2">
          <p class="text-sm text-gray-600">Contact Us at: 09613326890 (email: sample@gmail.com) or visit us at: School Address
        </div>
    </footer>

      {{-- Sweet Alert Scripts --}}
      <script>

        //Add to cart
        window.addEventListener('show-add2cart-success', event => {
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Added to cart!',
            showConfirmButton: false,
            timer: 700
          })
        });

        //Add to restrict
        window.addEventListener('show-add2restrict-success', event => {
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Added to restrict!',
            showConfirmButton: false,
            timer: 1000
          })
        });

        //Add to restrict
        window.addEventListener('show-add2restrict-error', event => {
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Already in restrict list!',
            showConfirmButton: false,
            timer: 1000
          })
        });
        
      </script>
  
      <script type="text/javascript">
          const mobile_icon = document.getElementById('mobile-icon');
          const mobile_menu = document.getElementById('mobile-menu');
          const hamburger_icon = document.querySelector("#mobile-icon i");
  
          function openCloseMenu() {
          mobile_menu.classList.toggle('block');
          mobile_menu.classList.toggle('active');
          }
  
          function changeIcon(icon) {
          icon.classList.toggle("fa-xmark");
          }
  
          mobile_icon.addEventListener('click', openCloseMenu);
  
  
      </script>
      <!-- change icon border -->
      <script type="text/javascript">
        function changeMyColor() { 
        var button = document.getElementById('mobile-icon'); 
        button.classList.toggle('blueColor'); 
  } 
      // go to top shortcut
      var btn = $('#to-top');

      $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
          btn.addClass('show');
        } else {
          btn.removeClass('show');
        }
      });

      btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
      });

      </script>

      {{-- For download button --}}
      <script>
        function doCapture(){
          var a = document.createElement('a');
          html2canvas(document.getElementById("receipt")).then(function(canvas){
            // console.log(canvas.toDataURL("image/jpeg", 0.9))
            a.href = canvas.toDataURL("image/jpeg");
            a.download = "sample.jpeg";
            a.click();

          })
        }
      </script>

      <script> 
        //For add button
        $(document).on('click', 'delete-all-btn',  function(e){
            e.preventDefault();

            // var food_id = $(this).val();

            console.log('sample');

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            // $.ajax({
            //     method: "POST",
            //     url: "update-cart-add",
            //     data: {"food-id":food_id},
            //     success: function(response){
            //         //window.location.reload();
            //         $('.cartItems').load(location.href + " .cartItems");
            //         $('.cartsummary').load(location.href + " .cartsummary");

            //     }
            // })
        });
      </script>


      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
  </html>