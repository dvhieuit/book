@extends('layouts.app')

@section('content')
    <li>
        <a href="#" data-toggle="modal" data-target="#SignUp">Register</a>
    </li>
    <div id="SignUp" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3 class="modal-title text-center primecolor">Sign Up</h3>
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
                        <form method="POST" id="Register">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
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
                            <div class="form-group has-feedback">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <button type="button" id="submitForm" class="btn btn-primary btn-prime white btn-flat">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $('body').on('click', '#submitForm', function(){
            var registerForm = $("#Register");
            var formData = registerForm.serialize();
            $( '#name-error' ).html( "" );
            $( '#email-error' ).html( "" );
            $( '#password-error' ).html( "" );

            $.ajax({
                url:'/register',
                type:'POST',
                data:formData,
                success:function(data) {
                    console.log(data);
                    if(data.errors) {
                        if(data.errors.name){
                            $( '#name-error' ).html( data.errors.name[0] );
                        }
                        if(data.errors.email){
                            $( '#email-error' ).html( data.errors.email[0] );
                        }
                        if(data.errors.password){
                            $( '#password-error' ).html( data.errors.password[0] );
                        }

                    }
                    if(data.success) {
                        $('#success-msg').removeClass('hide');
                        setInterval(function(){
                            $('#SignUp').modal('hide');
                            $('#success-msg').addClass('hide');
                        }, 1000);
                        window.location.href = "http://campaignads.local/home";
                    }
                },
            });
        });
    </script>
@endsection
