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
