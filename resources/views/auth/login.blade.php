@extends('layouts.app')

@section('content')

<div class="containerForm">
        <div class="layoutLogin">
          <div class="col col-main">
            
            <img id="forSchoolLogo" class="lg:transform lg:scale-125 w-48 md:w-48" src="{{  asset('images/school-images/school-logo.png') }}"
            alt="Image" />
            <h1 class="column-head">Nuestra Señora De Aranzazu Parochial School</h1>
            <h6 class="column-text">Elementary School Food Ordering System</h6>
            {{-- <h6 class="column-text">Canteen Ordering System</h6> --}}
          </div>
          <div class="col col-complementary" role="complementary">
            <div class="screen">
                <div class="screen__content">
                    <p class="role-head">Welcome</p>
                    <form class="login" method="POST" action="{{ route('login') }}">
                        @csrf
        
                        <div class="login__field">
                            <i class="login__icon fas fa-user"></i>
                            <input placeholder="Email" id="email" type="email" class="login__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="login__field">
                            <i class="login__icon fas fa-lock"></i>
                            <input placeholder="Password" id="password" type="password" class="login__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                             @enderror
                        </div>
        
                    
                                <div class="form-remember form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        
                       
                        
                        <button type="submit" class="button login__submit">
                            <span class="button__text">{{ __('Login') }}</span>
                            <i class="button__icon fas fa-chevron-right"></i>
                        </button>
                        <a id="forgot-pass" class="btn btn-link" href="/change-password-request">
                            {{ __('Forgot Your Password?') }}
                        </a>		
                    </form>
                </div>
                <div class="screen__background">
                    <span class="screen__background__shape screen__background__shape4"></span>
                    <span class="screen__background__shape screen__background__shape3"></span>		
                    <span class="screen__background__shape screen__background__shape2"></span>
                    <span class="screen__background__shape screen__background__shape1"></span>
                </div>		
            </div>
            
        </div>  
      
      
      
      </div>
      
            
      
        
    
</div>
@endsection


{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
