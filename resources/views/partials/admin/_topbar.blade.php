
{{-- Topbar --}}
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
      {{-- <i class="bi bi-list toggle-sidebar-btn"></i> --}}
      {{-- <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset('admin/assets/img/favicon-32x32.png') }}" alt="">
        <span class="d-none d-lg-block">Menu<span id="span-white">Po</span></span>
    </a> --}}
      <label class="switch">
        <input type="checkbox" class="toggle-sidebar-btn">
        <span class="slider"></span>
      </label>
      
  </div><!-- End Logo -->

  {{-- <div class="search-bar">
<form class="search-form d-flex align-items-center" method="POST" action="#">
  <input type="text" name="query" placeholder="Search" title="Enter search keyword">
  <button type="submit" title="Search"><i class="bi bi-search"></i></button>
</form>
</div><!-- End Search Bar --> --}}

  <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

          {{-- <li class="nav-item d-block d-lg-none">
    <a class="nav-link nav-icon search-bar-toggle " href="#">
      <i class="bi bi-search"></i>
    </a>
  </li><!-- End Search Icon--> --}}

          <li class="nav-item dropdown">
           
              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                  <i class="bi bi-bell"></i>
                  @if ($notifs == null)
                    <span class="badge bg-primary badge-number">5</span>
                  @endif
              </a><!-- End Notification Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow w-80 notifications">
                  <li class="dropdown-header">
                     <p class="text-xl font-bold">Notifications</p>
                  </li>

                  {{-- Orders Notifs --}}
                  <li class="flex relative group">
                    <div class="border-2 border-solid bg-green-400 h-12 w-full text-center mb-3 mx-3">
                        <span class="text-lg font-bold">Order Notifs</span>
                    </div>
                   
                    <ul class="absolute bg-white p-3 w-96  -left-80 top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50"> 
                       <h3 class="text-xl">Notifications</h3>
                       <div class="h-96 overflow-y-scroll" >
                            @if ($notifs == null)
                                <p class="text-black">No notifications</p>
                            @else
                                @foreach ($notifs as $notif)
                                    @if ($notif->type == 1)
                                        <div class="flex flex-row pl-3 hover:bg-gray-200">
                                            <div class="notif-image">
                                                <img class="w-16 h-16 rounded-full mt-4" src="https://i.pinimg.com/564x/49/6f/1d/496f1d78e07b43c2975522de90ce8504.jpg" alt="profile_pic" >
                                            </div>
                                            <div class=" modal-body p-4" id="notif-body">
                                                <p class="text-lg font-bold">{{$notif->title}}</p>
                                                <p style="opacity: 0.5; font-size: 15px;">{{\Carbon\Carbon::parse($notif->created_at)->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                        <hr class="mt-0 mb-2" id="user-profile">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="del-all">
                          <button class="deleteAll h-10 w-full bg-primary rounded mt-3 text-lg focus:outline-none font-bold text-secondary hover:bg-secondary hover:text-primary ">Delete All</button>
                        </div>
                    </ul>
                  </li>

                  {{-- User Notifs --}}
                  <li class="flex relative group">
                    <div class="border-2 border-solid bg-yellow-400 h-12 w-full text-center mb-3 mx-3">
                        <p class="text-lg text-center font-bold">User Notifs</p>
                    </div>
                   
                    <ul class="absolute bg-white p-3 w-96  -left-80 top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50"> 
                       <h3 class="text-xl">Notifications</h3>
                       <div class="h-96 overflow-y-scroll" >
                            @if ($notifs == null)
                                <p class="text-black">No notifications</p>
                            @else
                                @foreach ($notifs as $notif)
                                    @if ($notif->type == 2)
                                        <div class="flex flex-row pl-3 hover:bg-gray-200">
                                            <div class="notif-image">
                                                <img class="w-16 h-16 rounded-full mt-4" src="https://i.pinimg.com/564x/49/6f/1d/496f1d78e07b43c2975522de90ce8504.jpg" alt="profile_pic" >
                                            </div>
                                            <div class=" modal-body p-4" id="notif-body">
                                                <p class="text-lg font-bold">{{$notif->title}}</p>
                                                <p style="opacity: 0.5; font-size: 15px;">{{\Carbon\Carbon::parse($notif->created_at)->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                        <hr class="mt-0 mb-2" id="user-profile">
                                    @endif
                                @endforeach
                            @endif
                        
                        </div>
                        
                        <div class="del-all">
                          <button class="deleteAll h-10 w-full bg-primary rounded mt-3 text-lg focus:outline-none font-bold text-secondary hover:bg-secondary hover:text-primary ">Delete All</button>
                          
                        </div>
                    </ul>
                  </li>

                  {{-- Archive Notifs --}}
                  <li class="flex relative group">
                    <div class="border-2 border-solid bg-red-400 h-12 w-full text-center mb-3 mx-3">
                        <p class="text-lg font-bold">Archive Notifs</p>
                    </div>
                    <ul class="absolute bg-white p-3 w-96  -left-80 top-6 transform scale-0 group-hover:scale-100 transition duration-150 ease-in-out origin-top shadow-lg z-50"> 
                       <h3 class="text-xl">Notifications</h3>
                       <div class="h-96 overflow-y-scroll" >
                            @if ($notifs == null)
                                <p class="text-black">No notifications</p>
                            @else
                                @foreach ($notifs as $notif)
                                    @if ($notif->type == 3)
                                        <div class="flex flex-row pl-3 hover:bg-gray-200">
                                            <div class="notif-image">
                                                <img class="w-16 h-16 rounded-full mt-4" src="https://i.pinimg.com/564x/49/6f/1d/496f1d78e07b43c2975522de90ce8504.jpg" alt="profile_pic" >
                                            </div>
                                            <div class=" modal-body p-4" id="notif-body">
                                                <p class="text-lg font-bold">{{$notif->title}}</p>
                                                <p style="opacity: 0.5; font-size: 15px;">{{\Carbon\Carbon::parse($notif->created_at)->diffForHumans()}}</p>
                                            </div>
                                        </div>
                                        <hr class="mt-0 mb-2" id="user-profile">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="del-all">
                          <button class="deleteAll h-10 w-full bg-primary rounded mt-3 text-lg focus:outline-none font-bold text-secondary hover:bg-secondary hover:text-primary ">Delete All</button>
                          
                        </div>
                    </ul>
                  </li>
     
                  
              </ul><!-- End Notification Dropdown Items -->

          </li><!-- End Notification Nav -->

          <li class="nav-item dropdown pe-3">

              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                  data-bs-toggle="dropdown">
                  <img src="{{ auth()->user()->admin->image ? asset('storage/' . auth()->user()->admin->image) : asset('storage/admin/userNoImage.png') }}" alt="Profile" class="rounded-circle">
                  <span class="d-none d-md-block dropdown-toggle ps-2"></span>
              </a><!-- End Profile Iamge Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li class="dropdown-header">
                      <img src="{{ auth()->user()->admin->image ? asset('storage/' . auth()->user()->admin->image) : asset('storage/admin/userNoImage.png') }}" alt="Profile" class="rounded-circle float-left h-12 w-12">
                      <h6>{{auth()->user()->admin->firstName}} {{auth()->user()->admin->lastName}}</h6>
                      <span>Canteen Staff</span>
                  </li>
                  <li>
                      <hr class="dropdown-divider">
                  </li>

                  <li>
                      <a class="dropdown-item d-flex align-items-center" href="{{ url('account') }}">
                          <i class="bi bi-person"></i>
                          <span>Account Profile</span>
                      </a>
                  </li>
                  <li>
                      <hr class="dropdown-divider">
                  </li>

                  <li>
                      <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                          <i class="bi bi-gear"></i>
                          <span>Account Settings</span>
                      </a>
                  </li>
                  <li>
                      <hr class="dropdown-divider">
                  </li>

                  {{-- <li>
        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>Need Help?</span>
        </a>
      </li> --}}
                  <li>
                      <hr class="dropdown-divider">
                  </li>

                  <li>
                      <button type="submit" class="dropdown-item d-flex align-items-center" >
                          <i class="bi bi-box-arrow-right"></i>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </button>
                    </form>
                  </li>

              </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->
          {{-- <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul> --}}

      </ul>
  </nav><!-- End Icons Navigation -->
  

</header>
{{-- End Topbar --}}