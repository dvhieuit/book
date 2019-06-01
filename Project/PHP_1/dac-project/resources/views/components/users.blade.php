@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <?php dump($userInfor) ?>
                    <h1>Users Management</h1>
                </div>
            </div>
        </div>
    </div>
@endsection