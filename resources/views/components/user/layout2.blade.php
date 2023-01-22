<!doctype html>
<html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <meta name="csrf-token" content="{{ csrf_token() }}" /> 

      <!-- Favicons -->
      <link href="{{ asset('admin/assets/img/logo-512x512.png') }}" rel="icon">
      <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
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

      {{-- Flowbite JS--}}
      <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />

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

      :root {
          scroll-behavior: smooth;
          --primary: #ffc300;
          --primaryLight: #ffe799;
          --primaryDark: #e6b000;
          --secondary: #213559;
          --secondaryLight: #374968;
      }
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
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset('images/school-images/canteen-pic.jpg') }}") no-repeat center center fixed; 
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

      .mobile-nav{
      border-top-right-radius: 80px;
      }

      .button-hero {
      background: #FBCA1F;
      font-family: inherit;
      padding: 0.6em 1.3em;
      font-weight: 900;
      font-size: 18px;
      border: 3px solid black;
      border-radius: 0.4em;
      box-shadow: 0.1em 0.1em;
      }

      .button-hero:hover {
      transform: translate(-0.05em, -0.05em);
      box-shadow: 0.15em 0.15em;
      }

      .button-hero:active {
      transform: translate(0.05em, 0.05em);
      box-shadow: 0.

      05em 0.05em;
      }


      .mobile-li:hover {
        color: var(--primary);
        margin-right: 0%;
        background: #f6f9ff;
        -webkit-transition: background-color 0.3s linear;
        -moz-transition: background-color 0.3s linear;
        -o-transition: background-color 0.3s linear;
        transition: background-color 0.3s linear;
        -webkit-border-radius: 40px 0px 0px 40px;
        -moz-border-radius: 40px 0px 0px 40px;
        border-radius: 40px 0px 0px 40px;
      }

      .mobile-nav li{
      -webkit-border-radius: 40px 0px 0px 40px;
        -moz-border-radius: 40px 0px 0px 40px;
        border-radius: 40px 0px 0px 40px;
      }

      .button-sec {
      background: var(--primary);
      font-family: inherit;
      padding: 0.6em 1.3em;
      font-weight: 500;
      font-size: 14px;
      border: 3px solid black;
      border-radius: 0.4em;
      box-shadow: 0.1em 0.1em;
      }

      .button-sec:hover {
      transform: translate(-0.05em, -0.05em);
      box-shadow: 0.15em 0.15em;
      }

      .button-sec:active {
      transform: translate(0.05em, 0.05em);
      box-shadow: 0.05em 0.05em;
      }

      .menu-landing {
      border-top-right-radius: 80px !important;
      }


      /* WEBKIT RESIZING BROWSER */

      @media only screen and (max-width: 640px) {
      .menu-landing {
        transform: scale(0.8, 0.8);
        -ms-transform: scale(0.8, 0.8); /* IE 9 */
        -webkit-transform: scale(0.8, 0.8); /* Safari and Chrome */
        -o-transform: scale(0.8, 0.8); /* Opera */
        -moz-transform: scale(0.8, 0.8); /* Firefox */
      }
      }

      @media only screen and (max-width: 640px) {
      .section-hero {
        transform: scale(0.8, 0.8);
        -ms-transform: scale(0.8, 0.8); /* IE 9 */
        -webkit-transform: scale(0.8, 0.8); /* Safari and Chrome */
        -o-transform: scale(0.8, 0.8); /* Opera */
        -moz-transform: scale(0.8, 0.8); /* Firefox */
      }

      .school-logo{
        transform: scale(0.8, 0.8);
        -ms-transform: scale(0.8, 0.8); /* IE 9 */
        -webkit-transform: scale(0.8, 0.8); /* Safari and Chrome */
        -o-transform: scale(0.8, 0.8); /* Opera */
        -moz-transform: scale(0.8, 0.8); /* Firefox */
      }


      .button-sec{
        transform: scale(0.8, 0.8);
        -ms-transform: scale(0.8, 0.8); /* IE 9 */
        -webkit-transform: scale(0.8, 0.8); /* Safari and Chrome */
        -o-transform: scale(0.8, 0.8); /* Opera */
        -moz-transform: scale(0.8, 0.8); /* Firefox */
      }

      
      }

      .button-sec{
        transform: scale(0.9, 0.9);
        -ms-transform: scale(0.9, 0.9); /* IE 9 */
        -webkit-transform: scale(0.9, 0.9); /* Safari and Chrome */
        -o-transform: scale(0.9, 0.9); /* Opera */
        -moz-transform: scale(0.9, 0.9); /* Firefox */
      }

      .cart-menu
      {
        transform: scale(1.4, 1.4);
        -ms-transform: scale(1.4, 1.4); /* IE 9 */
        -webkit-transform: scale(1.4, 1.4); /* Safari and Chrome */
        -o-transform: scale(1.4, 1.4); /* Opera */
        -moz-transform: scale(1.4, 1.4); /* Firefox */
      }


      .menu-sticky .button-hero
      {
        transform: scale(1.4, 1.4);
        -ms-transform: scale(1.4, 1.4); /* IE 9 */
        -webkit-transform: scale(1.4, 1.4); /* Safari and Chrome */
        -o-transform: scale(1.4, 1.4); /* Opera */
        -moz-transform: scale(1.4, 1.4); /* Firefox */
      }

      /* Sticky Menu */

      .menu-sticky {
        position: absolute;
        right: 5.8rem;
        width: 240px;
      /*   background: red; */
      }

      .menu-sticky .card {
        position: fixed;
        top: calc(100vh - 5rem);
        padding: 0.5rem;
        right: 5.4rem;
        background-color: transparent;
        padding-bottom: 1.4rem;
        text-align: center;
        font-weight: bold;
        z-index: 999;
        width: 92%;
        transform: translateY(-2em);
        
      } 

      @media only screen and (max-width: 640px) {
      .menu-sticky .card{
        transform: scale(0.6, 0.6);
        -ms-transform: scale(0.6, 0.6); /* IE 9 */
        -webkit-transform: scale(0.6, 0.6); /* Safari and Chrome */
        -o-transform: scale(0.6, 0.6); /* Opera */
        -moz-transform: scale(0.6, 0.6); /* Firefox */
      }

      .menu-sticky{
        left: -1.5rem; 
        right: 0 !important;
      }

      .menu-sticky .card{
        top: calc(100vh - 6rem);
        right: 6.6rem;
      }
      }

      /* preloader */

      #preloader {
      position: fixed;
      inset: 0;
      z-index: 9999;
      overflow: hidden;
      background: var(--color-white);
      transition: all 0.6s ease-out;
      width: 100%;
      height: 100vh;
      }
      #preloader:before, #preloader:after {
      content: "";
      position: absolute;
      border: 4px solid #FFC300;
      border-radius: 50%;
      -webkit-animation: animate-preloader 2s cubic-bezier(0, 0.2, 0.8, 1) infinite;
      animation: animate-preloader 2s cubic-bezier(0, 0.2, 0.8, 1) infinite;
      }
      #preloader:after {
      -webkit-animation-delay: -0.5s;
      animation-delay: -0.5s;
      }

      @-webkit-keyframes animate-preloader {
      0% {
      width: 10px;
      height: 10px;
      top: calc(50% - 5px);
      left: calc(50% - 5px);
      opacity: 1;
      }
      100% {
      width: 72px;
      height: 72px;
      top: calc(50% - 36px);
      left: calc(50% - 36px);
      opacity: 0;
      }
      }

      @keyframes animate-preloader {
      0% {
      width: 10px;
      height: 10px;
      top: calc(50% - 5px);
      left: calc(50% - 5px);
      opacity: 1;
      }
      100% {
      width: 72px;
      height: 72px;
      top: calc(50% - 36px);
      left: calc(50% - 36px);
      opacity: 0;
      }
      }


      /* Cart add minus remove */
      .cart-sum-top,
      .card-sum-bot{
        border-radius: 14px;
      }








</style>
    </head>
    <body class="bg-white">

      {{-- Sweet alert for non-livewire components --}}
      {{-- @include('sweetalert::alert') --}}
    
      <header class="fixed top-0 z-50 h-20 w-screen sm:h-15 bg-gradient-to-l from-yellow-100 via-yellow-300 to-yellow-500">
        <nav class="relative px-2">
          
          <div class="container mx-auto flex justify-between space-y-6 items-center">
              <a class="toggleColour text-secondary no-underline hover:no-underline font-bold text-2xl flex lg:text-4xl" 
              href="#"
              >
              <img class="h-10 mt-4 fill-current align-middle" width="50.502" src="{{ asset('images/school-images/logo-512X512.png') }}">
              <img class="h-12 mt-4 fill-current align-left" width="50.502" src="{{ asset('images/school-images/school-logo.png') }}">
            </a>

     


    

            
            <!-- Mobile menu icon -->
            <div class="flex relative-group ml-auto md:hidden">
              {{-- <li class="allNotifs flex relative group">
                <a href="#" class="hover:text-black"><i class="fa-solid fa-envelope fa-fw fa-xl"></i></a>
                <i class="fa-solid fa-chevron-down fa-2xs pt-3"></i>
                <ul class="absolute bg-white p-3 w-80 h-96 overflow-y-scroll -left-60 top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50"> 
                   <h3 class="text-xl">Notifications</h3>
                   <div class="">
                      @if ($notifs == null)
                        <div class="if-null text-center">
                            <p>No notifications</p>
                        </div>
                      @else
                        @foreach ($notifs as $notif)
                          <x-user.notif-modal.notif-modal :notif="$notif" />
                        @endforeach
                      @endif
                   </div>
        
                    <div class="del-all">
                      <button class="deleteAll text-red-500">
                        <span>Delete all</span>
                      </button>
                    </div>
                </ul>
              </li> --}}
            </div>
            <button class="button-sec"><a href="/user/home" class="block uppercase">Back</a></li></ul>
            
            </div>
          
          <!-- Mobile menu -->
          <div class="md:hidden flex justify-center mt-3 w-full">
             
                

          </div>
    
        </nav>
      </header>

      <a id="to-top"></a>
      
      {{ $slot }}
      
  
  
      <!--Footer-->
      <footer class="footer flex flex-col items-center justify-between p-10 border-t-4 border-t-primary bg-white sm:flex-row">
    
        <p class="text-sm text-gray-600">© 2022 School Name | <a href="/terms-and-conditions" class="text-primary">Terms of Use</a> | <a href="/privacy-statement" class="text-primary">Privacy Statement</a></p>
    
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
          //For deleting all notifs
          $(document).on('click', '.deleteAll',  function(e){
                e.preventDefault();

                console.log('food_id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: 'home/deleteAllNotifs',
                    data: {"food-id":1},
                    success: function(response){
                      $('.allNotifs').load(location.href + " .allNotifs");
                    }
                })
            });
      </script>

      {{-- Flowbite JS --}}
      <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
  </html>