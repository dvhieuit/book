@extends('layouts.app')

@section('content')
    <li>
        <a href="#" data-toggle="modal" data-target="#SigIn">LogIn</a>
    </li>
    <div id="SigIn" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3 class="modal-title text-center primecolor">Log In</h3>
                </div>
                <div class="modal-body" style="overflow: hidden;">
                    <div id="success-msg" class="hide">
                        <div class="alert alert-info alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> Check your mail for login confirmation!!
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-10">
                        <form method="POST" id="LogIn">
                            @csrf
                            <spans class="text-center" id="active-error"></spans>
                            <spans class="text-center" id="failure-error"></spans>
                            <div class="form-group has-feedback">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                       placeholder="Email">
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                <span class="text-danger">
                                    <strong id="email-error"></strong>
                                </span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                <span class="text-danger">
                                    <strong id="password-error"></strong>
                                </span>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <button type="button" id="loginForm"
                                            class="btn btn-primary btn-prime white btn-flat">LogIn
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $('body').on('click', '#loginForm', function () {
            var loginForm = $("#LogIn");
            var formData = loginForm.serialize();
            $('#email-error').html("");
            $('#password-error').html("");
            $('#active-error').html("");
            $('#failure-error').html("");
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
                        if(data.errors.active){
                            $('#email-error').html(data.errors.active);
                        }
                        if(data.errors.failure){
                            $('#email-error').html(data.errors.failure);
                        }
                        if (data.errors.email) {
                            $('#email-error').html(data.errors.email[0]);
                        }
                        if (data.errors.password) {
                            $('#password-error').html(data.errors.password[0]);
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
    </script>
@endsection
