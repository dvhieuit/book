<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="{{ asset('js/validate_register.js') }}"></script>


    <link href="{{ asset('css/pop-up.css') }}" rel="stylesheet">
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
                                       data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                                        Register</a>
                                </li>
                                <li class="nav-item float-md-right nav-item-reg-log" >
                                    <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i
                                                class="fas fa-user-plus mr-1"></i>
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
                                {{--                                Start register form         --}}
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
                                                                       placeholder="Fullname&ast;"
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
                                                                <input id="register_email" type="email"
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
                                                                <input id="password-register" type="password"
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
                                                                <input id="password-confirm" type="password"
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
                                {{--                                Start Login Form                --}}
                                <div class="container" >
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card card-reg-log">
                                                <h4 class="card-title mt-1 signup-title">Login to Your Account</h4>
{{--                                                <div class="card-header"></div>--}}
                                                <div class="card-body">
                                                    <form method="POST" action="/login" id="formLogin">
                                                        @csrf
                                                        <spans class="text-center text-danger" id="active-error-login"></spans>
                                                        <spans class="text-center text-danger" id="failure-error-login"></spans>
                                                        <div class="form-group row form-row-input">
                                                            <div class="col-md-12">
                                                                <input id="email" type="email"
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
                                                                <input id="password" type="password"
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
                                                                <button type="button" class="btn btn-primary btn-get-started col-12 justify-content-center"
                                                                        id="submitLoginForm">
                                                                    {{ __('LOGIN') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                                {{--                                End Log in form             --}}
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

<script type="text/javascript">
    function validateRegister() {
        var password = document.getElementById("password-register").value;
        var confirmPassword = document.getElementById("password-confirm").value;
        if (password != confirmPassword) {
            $('#error-password').html('password miss match');
            return false;
        }
        return true;
    }
    $(document).ready(function () {

        $('#formRegister').submit(function (e) {
            if(!validateRegister()){
                e.preventDefault();
                return false;
            }
            e.preventDefault()
            // $('#error-fname').html('')
            // $('#error-lname').html('')
            $('#error-name').html('')
            $('#error-email').html('')
            $('#error-password').html('')
            $('#error-phone').html('')

            var formInputs = $('#formRegister').serialize();
            $.ajax({
                url: '/register',
                type: 'POST',
                data: formInputs,
                success: function (data) {
                    console.log(data);
                    if (data.errors) {
                        // if (data.errors.firstname) {
                        //     $('#error-fname').html(data.errors.fname[0]);
                        // }
                        if (data.errors.name) {
                            $('#error-name').html(data.errors.name[0]);
                        }
                        if (data.errors.email) {
                            $('#error-email').html(data.errors.email[0]);
                        }
                        if (data.errors.password) {
                            $('#error-password').html(data.errors.password[0]);
                        }
                        if (data.errors.phone) {
                            $('#error-phone').html(data.errors.phone[0]);
                        }
                    }
                    if (data.success) {
                        //$('#success-msg').removeClass('hide');
                        setInterval(function () {
                            $('#SignUp').modal('hide');
                            //$('#success-msg').addClass('hide');
                        }, 2000);
                        window.location.href = "../home";
                    }
                },
            });
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#formLogin').submit(function (e) {
            e.preventDefault();
            var loginForm = $("#formLogin");
            var formData = loginForm.serialize();
            $('#email-error-login').html("");
            $('#password-error-login').html("");
            $('#active-error-login').html("");
            $('#failure-error-login').html("");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/login',
                type: 'POST',
                data: formData,
                success: function (data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.active) {
                            $('#active-error-login').html(data.errors.active);
                        }
                        if (data.errors.failure) {
                            $('#failure-error-login').html(data.errors.failure);
                        }
                        if (data.errors.email) {
                            $('#email-error-login').html(data.errors.email[0]);
                        }
                        if (data.errors.password) {
                            $('#password-error-login').html(data.errors.password[0]);
                        }

                    }
                    if (data.success) {
                        $('#success-msg').removeClass('hide');
                        setInterval(function () {
                            $('#LogIn').modal('hide');
                            $('#success-msg').addClass('hide');
                        }, 1000);
                        window.location.href = "../home";
                    }
                },
            });
        });
    });
</script>
</body>
</html>
