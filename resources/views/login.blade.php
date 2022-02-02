@extends('layout')

@section('title')
    Login
@endsection

@section('body')
{{-- @auth --}}
    @if (!Auth::check())
        <div class="d-flex justify-content-center align my-auto">
            <div class="align-item-center">
                <div class="card rounded" style="width: 18rem;">
                    <div class="card-body">
                        <h1 class="mb-3">Login</h1>
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        @endif
                        <form enctype="multipart/form-data" action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Email" name="email" value={{ Cookie::get('cookie-email') !== null ? Cookie::get('cookie-email') : "" }}>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password" value={{ Cookie::get('cookie-password') !== null ? Cookie::get('cookie-password') : "" }}>
                            </div>
                            <div class="mb-3 form-checkbox">
                                <input type="checkbox" class="form-check-input" name="rememberMe" checked={{ Cookie::get('cookie') !== null }}> Remember me
                            </div>
                            <div class="col-12 mb-0">
                                <input class="btn btn-primary w-100" type="submit" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
{{-- @endauth --}}
@endsection
