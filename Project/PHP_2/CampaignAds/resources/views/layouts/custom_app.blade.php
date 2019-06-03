<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


{{--    <link rel="stylesheet" href="bootstrap.min.css">--}}
{{--    <script src="jquery.slim.min.js"></script>--}}
{{--    <script src=" bootstrap.bundle.min.js"></script>--}}

<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app_bar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu_left_and_list_product.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


    <link href="{{ asset('css/pop-up.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav-banner.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container" >
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link ml-3 mr-3 " data-toggle="modal" data-target=""
                           href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3 mr-3" data-toggle="modal" data-target=""
                           href="">Feature</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3 mr-3" data-toggle="modal" data-target=""
                           href="">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-3 mr-3" data-toggle="modal" data-target=""
                           href="">About</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#modalLRForm"
                               href="">Login/Register</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->full_name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">
                                    Thông tin cá nhân
                                </a>
                                <a class="dropdown-item" href="">
                                    Quản lý chiến dịch
                                </a>
                                @if(Auth::user()->role_id==1)
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        Quản lý người dùng
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

{{--
    <div class="col-12 navigation clearfix p-4 ">
        <div class="col-lg-2 col-md-2 col-sm-1 float-left">
            <a href=""><img src="http://pluspng.com/img-png/google-logo-png-open-2000.png" alt="Google Logo PNG" ></a>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-5 float-left clearfix search-bar-icon">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search ...">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-1 float-right ">
            <div class="input-group-append">
                <button class="btn btn-secondary hide-color-button" type="button">
                    <i class="fa fa-shopping-cart "></i>
                </button>
            </div>
        </div>
    </div>
--}}


{{--
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">First Slide</h2>
                    <p class="lead">This is a description for the first slide.</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">Second Slide</h2>
                    <p class="lead">This is a description for the second slide.</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">Third Slide</h2>
                    <p class="lead">This is a description for the third slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
--}}



{{--
    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="min-width: 350px; min-block-size: 350px;writing-mode: horizontal-tb;">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Modal cascading tabs-->
                <div class="modal-c-tabs full-pop-up">
                    <!-- Nav tabs -->
                    <div class="container" >
                        <div class="col-md-12 ">
                            <ul class="nav nav-tabs md-tabs-6 tabs-6 light-blue darken-3 btn-group nav-reg-log-padding" role="tablist">
                                <li class="nav-item float-md-left nav-item-reg-log " >
                                    <a class="nav-link active show "
                                       data-toggle="tab" href="#panel7" role="tab">
                                        Register</a>
                                </li>
                                <li class="nav-item float-md-right nav-item-reg-log" >
                                    <a class="nav-link" data-toggle="tab" href="#panel8" role="tab">
                                        Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <!--Panel 7-->
                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                            <!--Body-->
                            <div class="modal-body mb-1">
                                --}}
{{--                                Start register form         --}}{{--

                                <div class="container register">
                                    <div class="row justify-content-center body-background">
                                        <div class="col-md-12">
                                            <div class="card card-reg-log">
                                                <h4 class="card-title mt-1 signup-title">Sign Up for Free</h4>
                                                <div class="card-body">
                                                    <form method="POST" id="formRegister" name="registration">
                                                        @csrf
                                                        <div class="form-group row form-row-input">
                                                            <div class="col-md-12">
                                                                <input id="name" type="text"
                                                                       placeholder="Fullname&ast;" maxlength="255"
                                                                       class="form-control @error('name') is-invalid @enderror"
                                                                       name="name" value="{{ old('name') }}" required
                                                                       autocomplete="name" >
                                                                <span class="text-danger">
                                                                <strong id="error-name"></strong>
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row form-row-input">
                                                            <div class="col-md-12">
                                                                <input id="register_email" type="email" maxlength="255"
                                                                       placeholder="Name@example.com&ast;"
                                                                       class="form-control @error('email') is-invalid @enderror"
                                                                       name="email" value="{{ old('email') }}" required
                                                                       autocomplete="email">
                                                                <span class="text-danger">
                                                                <strong id="error-email"></strong>
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row form-row-input">
                                                            <div class="col-md-12">
                                                                <input id="password-register" type="password" minlength="6"
                                                                       placeholder="Type your password&ast;"
                                                                       class="form-control @error('password') is-invalid @enderror"
                                                                       name="password" required
                                                                       autocomplete="new-password">
                                                                <span class="text-danger">
                                                                <strong id="error-password"></strong>
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row form-row-input">
                                                            <div class="col-md-12">
                                                                <input id="password-confirm" type="password" minlength="6"
                                                                       placeholder="Retype your password&ast;"
                                                                       class="form-control" name="password_confirmation"
                                                                       required autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row form-row-input">
                                                            <div class="col-md-12">
                                                                <button type="submit" id="SubmitRegisterForm"
                                                                        class="btn btn-primary btn-get-started col-12 justify-content-center">
                                                                    {{ __('GET STARTED') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.Panel 7-->
                        <!--Panel 8-->
                        <div class="tab-pane fade" id="panel8" role="tabpanel">
                            <!--Body-->
                            <div class="modal-body">
                                --}}
{{--                                Start Login Form                --}}{{--

                                <div class="container" >
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card card-reg-log">
                                                <h4 class="card-title mt-1 signup-title">Login to Your Account</h4>
                                                --}}
{{--                                                <div class="card-header"></div>--}}{{--

                                                <div class="card-body">
                                                    <form method="POST" action="/login" id="formLogin">
                                                        @csrf
                                                        <spans class="text-center text-danger" id="active-error-login"></spans>
                                                        <spans class="text-center text-danger" id="failure-error-login"></spans>
                                                        <div class="form-group row form-row-input">
                                                            <div class="col-md-12">
                                                                <input id="email" type="email" maxlength="255"
                                                                       placeholder="Type your Email&ast;"
                                                                       class="form-control @error('email') is-invalid @enderror"
                                                                       name="email" value="{{ old('email') }}" required
                                                                       autocomplete="email" autofocus>
                                                                <span class="text-danger">
                                                                    <strong id="email-error-login"></strong>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row form-row-input">
                                                            <div class="col-md-12">
                                                                <input id="password" type="password" minlength="6"
                                                                       placeholder="Type Your Password&ast;"
                                                                       class="form-control @error('password') is-invalid @enderror"
                                                                       name="password" required
                                                                       autocomplete="current-password">
                                                                <span class="text-danger">
                                                                    <strong id="password-error-login"></strong>
                                                                </span>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row form-row-input">
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-primary btn-get-started col-12 justify-content-center"
                                                                        id="submitLoginForm">
                                                                    {{ __('LOGIN') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                --}}
{{--                                            </div>--}}{{--

                                            </div>
                                        </div>
                                    </div>
                                    --}}
{{--                                End Log in form             --}}{{--

                                </div>
                            </div>
                            <!--/.Panel 8-->
                        </div>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
    </div>
--}}
    @include('modal_login_register')
    <main class="py-4">
        @yield('content')
    </main>
    @include('layouts.footer')
</div>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript" src="{{ asset('js/signin_register.js') }}"></script>

</body>
</html>