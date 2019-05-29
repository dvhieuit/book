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


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
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
         aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <div class="container">
                        <div class="col-md-12 ">
                            <ul class="nav nav-tabs md-tabs-6 tabs-6 light-blue darken-3 btn-group" role="tablist">
                                <li class="nav-item float-md-left  " style="width: 50%;">
                                    <a class="nav-link active  align-content-center align-items-center align-items-center"
                                       data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                                        Register</a>
                                </li>
                                <li class="nav-item float-md-right" style="width: 50%;">
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
                                            <div class="card card-register">
                                                <div class="card-body">
                                                    <form method="POST" id="formRegister" name="registration">
                                                        @csrf
                                                        <h4 class="card-title mt-1 signup-title">Sign up for free</h4>
                                                        <div class="form-group row">

                                                            <div class="col-md-12">
                                                                <div class="col-md-6 float-md-left padding-name">
                                                                    <input id="firstname" type="text" maxlength="122" required
                                                                           placeholder="First name"
                                                                           class="form-control  @error('fname') is-invalid @enderror"
                                                                           name="fname" value="{{ old('firstname') }}"
                                                                           autocomplete="firstname" autofocus>
                                                                    <span class="text-danger">
                                                                    <strong id="error-fname"></strong>
                                                                </span>
                                                                </div>
                                                                <div class="col-md-6 float-md-right padding-name">
                                                                    <input id="lastname" type="text" maxlength="122" required
                                                                           placeholder="Last name"
                                                                           class="form-control  @error('lname') is-invalid @enderror"
                                                                           name="lname" value="{{ old('lname') }}"
                                                                           autocomplete="lastname" autofocus>
                                                                    <span class="text-danger">
                                                                    <strong id="error-lname"></strong>
                                                                </span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input id="register_email" type="email" maxlength="255"
                                                                       placeholder="Name@example.com"
                                                                       class="form-control @error('email') is-invalid @enderror"
                                                                       name="email" value="{{ old('email') }}" required
                                                                       autocomplete="email">
                                                                <span class="text-danger">
                                                                <strong id="error-email"></strong>
                                                            </span>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input id="password-register" type="password" minlength="6"
                                                                       placeholder="Type your password"
                                                                       class="form-control @error('password') is-invalid @enderror"
                                                                       name="password" required
                                                                       autocomplete="new-password">
                                                                <span class="text-danger">
                                                                <strong id="error-password"></strong>
                                                            </span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-12">
                                                                <input id="password-confirm" type="password" minlength="6"
                                                                       placeholder="Retype your password"
                                                                       class="form-control" name="password_confirmation"
                                                                       required autocomplete="new-password">

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">

                                                            <div class="col-md-12">
                                                                <input id="phone" type="tel" placeholder="Phone number"
                                                                       pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                                                       class="form-control @error('phone') is-invalid @enderror"
                                                                       name="phone" value="{{ old('[phone') }}" required
                                                                       autocomplete="phone" autofocus>
                                                                <span class="text-danger">
                                                                <strong id="error-phone"></strong>
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body col-12 btn-margin">
                                                            <div class="col-12 justify-content-center">
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
                                {{--                                                                --}}
                                {{--                                                                --}}
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">{{ __('Login') }}</div>

                                                <div class="card-body">
                                                    <form method="POST" action="/login" id="formLogin">
                                                        @csrf
                                                        <spans class="text-center text-danger" id="active-error-login"></spans>
                                                        <spans class="text-center text-danger" id="failure-error-login"></spans>
                                                        <div class="form-group row">
                                                            {{--                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                                                            <div class="col-md-12">
                                                                <input id="email" type="email" maxlength="255"
                                                                       placeholder="Type your Email"
                                                                       class="form-control @error('email') is-invalid @enderror"
                                                                       name="email" value="{{ old('email') }}" required
                                                                       autocomplete="email" autofocus>

                                                                <span class="text-danger">
                                                                    <strong id="email-error-login"></strong>
                                                                </span>
                                                                {{--                                                                @error('email')--}}
                                                                {{--                                                                <span class="invalid-feedback" role="alert">--}}
                                                                {{--                                        <strong>{{ $message }}</strong>--}}
                                                                {{--                                    </span>--}}
                                                                {{--                                                                @enderror--}}
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            {{--                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                                                            <div class="col-md-12">
                                                                <input id="password" type="password" minlength="6"
                                                                       placeholder="Type Your Password"
                                                                       class="form-control @error('password') is-invalid @enderror"
                                                                       name="password" required
                                                                       autocomplete="current-password">

                                                                <span class="text-danger">
                                                                    <strong id="password-error-login"></strong>
                                                                </span>

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-md-6 offset-md-4">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                           name="remember"
                                                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                    <label class="form-check-label" for="remember">
                                                                        {{ __('Remember Me') }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-0">
                                                            <div class="col-md-8 offset-md-4">
                                                                <button type="submit" class="btn btn-primary" id="submitLoginForm">
                                                                   Login
                                                                </button>

                                                                @if (Route::has('password.request'))
                                                                    <a class="btn btn-link"
                                                                       href="{{ route('password.request') }}">
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
            $('#error-fname').html('')
            $('#error-lname').html('')
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
                        if (data.errors.firstname) {
                            $('#error-fname').html(data.errors.fname[0]);
                        }
                        if (data.errors.lastname) {
                            $('#error-lname').html(data.errors.lname[0]);
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
                        window.location.href = "http://campaignads.local/home";
                    }
                },
                /*error: function (data) {
                    console.log(data)
                    if (errors.firstname) {
                        $('#error-fname').html(errors.firstname[0]);
                    }
                    if (errors.lastname) {
                        $('#error-lname').html(errors.lastname[0]);
                    }
                    if (errors.email) {
                        $('#error-email').html(errors.email[0]);
                    }
                    if (errors.password) {
                        $('#error-password').html(errors.password[0]);
                    }
                    if (errors.phone) {
                        $('#error-phone').html(errors.phone[0]);
                    }
                }*/
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
                        window.location.href = "http://campaignads.local/home";
                    }
                },
            });
        });
    });
</script>

</body>
</html>
