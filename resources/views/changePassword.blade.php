@extends('layout')

@section('title')
    Change Password
@endsection

@section('body')
@auth
    @if (Auth::user()->user_role === 'admin' || Auth::user()->user_role === 'member')
        <div class="d-flex justify-content-center align my-auto">
            <div class="align-item-center w-75">
                <div class="card rounded">
                    <div class="card-body d-flex">
                        <div class="w-100">
                            <h1 class="mb-3">Change Password</h1>
                            @if ($errors)
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            @endif
                            <form class="p-2 flex-grow-q mt-auto" enctype="multipart/form-data" action="/update-password" method="POST">
                                @csrf
                                <div class="mb-3 d-flex justify-content-between">
                                    <label class="form-label">Old Password</label>
                                    <input type="password" class="form-control w-75" placeholder="" name="old_password">
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control w-75" placeholder="" name="password">
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <label class="form-label">New Confirmation Password</label>
                                    <input type="password" class="form-control w-75" placeholder="" name="password_confirmation">
                                </div>
                                <div class="col-12 mb-0">
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endauth
@endsection
