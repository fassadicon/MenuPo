<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('admin/assets/img/favicon-32x32.png') }}" rel="icon">
    <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
      <title>
        MenuPo Log In
      </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/d00886c359.js" crossorigin="anonymous"></script>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/loginStyle.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <p class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('admin/assets/img/favicon-32x32.png') }}" alt="">
                    <h6 class="login-header">{{ config('app.name', 'MenuPo') }}</h6>
                </p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <button id="navbarbutton" class="button login__submit">
                                        <i class="button__icon fa-solid fa-right-to-bracket"></i>
                                        <a id="navbarhead" class="button__text" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </button>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <button id="navbarbutton" class="button login__submit">
                                        <i class="button__icon fa-solid fa-circle-user"></i>
                                        <a id="navbarhead" class="button__text" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </button>
                                </li>
                            @endif --}}
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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="main-content">

            </div>
            @yield('content')
        </main>
        <footer id="footer" class="footer">
            <div class="bottom-details">
              <div class="bottom_text">
                <span class="copyright_text">© 2022 School Name | <a id="bottomLink" href="#"> Terms of Use </a> | <a id="bottomLink" href="#"> Privacy Statement </a></span>
                <span class="policy_terms">
                  <a href="#">Contact Us at: 09613326890 (email: sample@gmail.com)</a>
                  
                </span>
              </div>
            </div>
          </footer>
    </div>
  
</body>
</html>
