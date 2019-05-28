<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>


        <script src="{{ asset('js/app.js') }}" defer></script>   
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="" data-toggle="modal" data-target="#modalForm" onclick="showform('l')">Login</a>
                        @if (Route::has('register'))
                            <a href="" data-toggle="modal" data-target="#modalForm" onclick="showform('r')">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <script type="text/javascript">
                    function reset(){
                        $("#panelLogin").removeClass("show");
                        $("#panelLogin").removeClass("active");
                        $("#panelRegister").removeClass("show");
                        $("#panelRegister").removeClass("active");
                        $("#l").removeClass("active");
                        $("#r").removeClass("active");
                    };
                    function showform(id){
                        reset();
                        if(id=='l'){
                            var log = document.getElementById("panelLogin");
                            log.classList.add("show");
                            log.classList.add("active");
                        }
                        else{
                            var reg = document.getElementById("panelRegister");
                            reg.classList.add("show");
                            reg.classList.add("active");
                        }
                        document.getElementById(id).classList.add("active");
                    }
                </script>
                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>

                <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal" role="document">
                        <div class="modal-content">
                            <div class="modal-c-tabs">
                                <ul class="justify-content-center nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                                    <li class="nav-item">
                                        <a id="l" class="nav-link active" data-toggle="tab" href="#panelLogin" role="tab"><i
                                                    class="fas fa-user-plus mr-1"></i>
                                            Log In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="r" class="nav-link" data-toggle="tab" href="#panelRegister" role="tab"><i
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
                                                            <label>First name </label>
                                                            <input id="first_name" type="text"
                                                                   class="form-control"
                                                                   name="first_name"
                                                                   value="{{ old('first_name') }}" required
                                                                   autocomplete="first_name" autofocus>

                                                            <span class="text-danger">
                                                                <strong id="error-firstname"></strong>
                                                            </span>
                                                        </div>
                                                        <div class="col form-group">
                                                            <label>Last name</label>
                                                            <input id="last_name" type="text"
                                                                   class="form-control"
                                                                   name="last_name"
                                                                   value="{{ old('last_name') }}" required autocomplete="last_name"
                                                                   autofocus>

                                                            <span class="text-danger">
                                                                <strong id="error-lastname"></strong>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email address</label>
                                                        <input id="email" type="email"
                                                               class="form-control"
                                                               name="email"
                                                               value="{{ old('email') }}" required autocomplete="email">

                                                        <span class="text-danger">
                                                            <strong id="error-email"></strong>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Create password</label>
                                                        <input id="password" type="password"
                                                               class="form-control"
                                                               name="password"
                                                               required autocomplete="new-password">

                                                        <span class="text-danger">
                                                            <strong id="error-password"></strong>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm password</label>

                                                        <input id="password-confirm" type="password" class="form-control"
                                                               name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input id="phone" type="text"
                                                               class="form-control"
                                                               name="phone"
                                                               required value="{{ old('phone') }}"
                                                               autocomplete="phone">
                                                        <span class="text-danger">
                                                            <strong id="error-phone"></strong>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block" id="submitFormSignUp">GET STARTED</button>
                                                    </div>

                                                </form>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="panelLogin" role="tabpanel">
                                        <div class="card">
                                            <article class="card-body">
                                                <form method="POST" id="formLogin">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email address</label>
                                                        <input id="emailLogin" type="email"
                                                               class="form-control"
                                                               name="email"
                                                               value="{{ old('email') }}" required autocomplete="email">

                                                        <span class="text-danger">
                                                            <strong id="error-emailLogin"></strong>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input id="passwordLogin" type="password"
                                                               class="form-control"
                                                               name="password"
                                                               required autocomplete="new-password">

                                                        <span class="text-danger">
                                                            <strong id="error-passwordLogin"></strong>
                                                        </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block">GET STARTED</button>
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
            </div>
        </div>
    </body>
</html>