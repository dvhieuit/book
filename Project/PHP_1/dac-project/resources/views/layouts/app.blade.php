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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" class="logo img-fluid" alt="Responsive image">
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
                            <a href="" class="nav-link" data-toggle="modal"
                               data-target="#modalForm">{{ __('Login/Sign up') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown"><img src="{{ asset('img/avatar.png') }}" class="avatar"
                                                           alt="Responsive image"></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->fullname }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <div class="modal-content">
                <div class="modal-c-tabs">
                    <ul class="justify-content-center nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#panelLogin" role="tab">
                                <i class="fas fa-user-plus mr-1"></i>
                                Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#panelRegister" role="tab"><i
                                        class="fas fa-user mr-1"></i>
                                Sign Up</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade" id="panelRegister" role="tabpanel">
                            <div class="card">
                                <article class="card-body">
                                    <form method="POST" id="formRegister">
                                        @csrf
                                        <div class="form-group">
                                            <h2 class="heading-title">Sign Up For Free</h2>
                                        </div>
                                        <div class="form-row">
                                            <div class="col form-group">
                                                <!-- <label>First name </label> -->
                                                <input id="first_name" type="text"
                                                       class="form-control"
                                                       name="first_name"
                                                       value="{{ old('first_name') }}" required
                                                       autocomplete="first_name" autofocus placeholder="First Name">

                                                <span class="text-danger">
                                                    <strong id="error-firstname"></strong>
                                                </span>
                                            </div>
                                            <div class="col form-group">
                                                <!-- <label>Last name</label> -->
                                                <input id="last_name" type="text"
                                                       class="form-control"
                                                       name="last_name"
                                                       value="{{ old('last_name') }}" required autocomplete="last_name"
                                                       autofocus placeholder="Last Name">


                                                <span class="text-danger">
                                                    <strong id="error-lastname"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label>Email address</label> -->
                                            <input id="email" type="email"
                                                   class="form-control"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email"
                                                   placeholder="Email Address">

                                            <span class="text-danger">
                                                <strong id="error-email"></strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label>Set a password</label> -->
                                            <input id="password" type="password"
                                                   class="form-control"
                                                   name="password"
                                                   required autocomplete="new-password" placeholder="Set a password">

                                            <span class="text-danger">
                                                <strong id="error-password"></strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label>Confirm password</label> -->

                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required autocomplete="new-password"
                                                   placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <!-- <label>Phone</label> -->
                                            <input id="phone" type="text"
                                                   class="form-control"
                                                   name="phone"
                                                   required value="{{ old('phone') }}"
                                                   autocomplete="phone" placeholder="Phone Number">
                                            <span class="text-danger">
                                                <strong id="error-phone"></strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block custom-btn"
                                                    id="submitFormSignUp">GET STARTED
                                            </button>
                                        </div>

                                    </form>
                                </article>
                            </div>
                        </div>
                        <div class="tab-pane fade in show active" id="panelLogin" role="tabpanel">
                            <div class="card">
                                <article class="card-body">
                                    <form method="POST" id="formLogin">
                                        @csrf
                                        <div class="form-group">
                                            <!-- <label>Email address</label> -->
                                            <!-- <span class="second-letter">*</span> -->
                                            <input id="emailLogin" type="email"
                                                   class="form-control"
                                                   name="email"
                                                   value="{{ old('email') }}" required autocomplete="email"
                                                   placeholder="Email">

                                            <span class="text-danger">
                                                <strong id="error-emailLogin"></strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label>Password</label> -->
                                            <!-- <span class="second-letter">*</span> -->
                                            <input id="passwordLogin" type="password"
                                                   class="form-control"
                                                   name="password"
                                                   required autocomplete="new-password" placeholder="Password">

                                            <span class="text-danger">
                                                <strong id="error-passwordLogin"></strong>
                                            </span>
                                        </div>
                                        <span class="text-success">
                                            <strong id="activate"></strong>
                                        </span>
                                        <div class="form-group">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block custom-btn">LOGIN
                                            </button>
                                        </div>
                                    </form>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#formRegister').submit(function (e) {
            e.preventDefault()
            $('#error-firstname').html('')
            $('#error-lastname').html('')
            $('#error-email').html('')
            $('#error-password').html('')
            $('#error-phone').html('')
            formInputs = $('#formRegister').serialize();
            $.ajax({
                url: '/register',
                type: 'POST',
                data: formInputs,
                success: function (data) {
                    $('#modalForm').modal("hide")
                    Swal.fire({
                        title: 'Successful',
                        text: data.message,
                        type: 'success',
                    }).then((result) => {
                        if (result.value) {
                            location.reload()
                        }
                    })
                },
                error: function (data) {
                    errors = data.responseJSON.errors
                    if (errors.first_name) {
                        $('#error-firstname').html(errors.first_name[0]);
                    }
                    if (errors.last_name) {
                        $('#error-lastname').html(errors.last_name[0]);
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
                }
            });
        });

        $('#formLogin').submit(function (e) {
            e.preventDefault()
            $('#error-emailLogin').html('')
            $('#error-passwordLogin').html('')
            $('#activate').html('')
            formInputs = $('#formLogin').serialize();
            $.ajax({
                url: '/login',
                type: 'POST',
                data: formInputs,
                success: function (data) {
                    if (data.message) {
                        $('#activate').html(data.message)
                    } else {
                        $('#modalForm').modal("hide")
                        location.reload()
                    }
                },
                error: function (data) {
                    errors = data.responseJSON.errors
                    if (errors.email) {
                        $('#error-emailLogin').html(errors.email[0]);
                    }
                    if (errors.password) {
                        $('#error-passwordLogin').html(errors.password[0]);
                    }
                }
            });
        });
    })
</script>