@extends('layout')

@section('title')
    Register
@endsection

@section('body')
{{-- @auth --}}
    @if (!Auth::check())
        <div class="d-flex justify-content-center align my-auto">
            <div class="align-item-center">
                <div class="card rounded" style="width: 25rem;">
                    <div class="card-body">
                        <h1 class="mb-3">Register</h1>
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        @endif
                        <form enctype="multipart/form-data" action="/register" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Full Name" name="name">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Confirmation Password" name="password_confirmation">
                            </div>
                            <div class="col-12 mb-0">
                                <input class="btn btn-primary w-100" type="submit" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
{{-- @endauth --}}
@endsection
