@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <div>
                <div class="col-lg-6 float-left">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 float-right">
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalAdd">
                        Create
                    </button>
                </div>
            </div>
            <div class="user-list">
                @component('components.users.list', ['users' => $users])
                @endcomponent
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center modalWrapper">
        <div class="modal fade addNewInputs" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Create New User form</h4>
                        <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <form method="POST" id="">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Full name </label>
                                    <input id="fullname" type="text"
                                           class="form-control"
                                           name="fullname"
                                           value="{{ old('fullname') }}" required
                                           autocomplete="fullname">
                                    <span class="text-danger">
                                        <strong id="error-fullname"></strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}" required autocomplete="email">
                                <span class="text-danger">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control"
                                       name="password"
                                       required autocomplete="new-password">
                                <span class="text-danger">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text"
                                       class="form-control"
                                       name="phone"
                                       required value="{{ old('phone') }}"
                                       autocomplete="phone">
                                <span class="">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"
                                >GET STARTED
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function deleteUser(id) {
            Swal.fire({
                title: 'Are you sure delete it?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    console.log('toi dong y xoa')
                    $.ajax({
                        url: '/user/delete',
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function (data) {
                            $('.user-list').html(data);
                        },
                        error: function (data) {
                            console.log(data)
                        }
                    });
                }
            })
        }


    </script>
@endsection