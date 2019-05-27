@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <header class="card-header">
                        <a href="{{ route('register') }}" class="float-right btn btn-outline-primary mt-1">Sign up</a>
                        <h4 class="card-title mt-2">Login</h4>
                    </header>
                    <article class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <h2 class="heading-title">Sign In</h2>
                            </div>

                            <div class="form-group">
                                <label>Email address</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">GET STARTED</button>
                            </div>

                        </form>
                    </article> <!-- card-body end .// -->
                   <div class="border-top card-body text-center">Don't have an account? <a href="{{ route('register') }}">Sign up</a></div>
                </div> <!-- card.// -->
            </div>
        </div>
    </div>
@endsection
