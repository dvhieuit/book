<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
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
    @component('components.login-register')
    @endcomponent
    <main class="py-4">
        @yield('content')
    </main>
</div>

<!-- Scripts -->
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $("#formRegister").validate({
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                phone: {
                    required: true,
                    number: true
                }
            },
        });

        $("#formLogin").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                },
            },
        });

        $('#formRegister').submit(function (e) {
            e.preventDefault()
            $('#error-firstname').html('')
            $('#error-lastname').html('')
            $('#error-email').html('')
            $('#error-password').html('')
            $('#error-phone').html('')
            if ($('#formRegister').valid()) {
                console.log('ok register');
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
            } else {
                console.log('error register');
            }
        });

        $('#formLogin').submit(function (e) {
            e.preventDefault()
            $('#error-emailLogin').html('')
            $('#error-passwordLogin').html('')
            $('#activate').html('')
            if ($('#formLogin').valid()) {
                console.log('ok Login')
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
            } else {
                console.log('error Login')
            }
        });
    })
</script>