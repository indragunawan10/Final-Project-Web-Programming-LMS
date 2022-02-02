@extends('layout')

@section('title')
    Profile
@endsection

@section('body')
@auth
    @if (Auth::user()->user_role === 'admin' || Auth::user()->user_role === 'member')
        <div class="d-flex justify-content-center align my-auto">
            <div class="align-item-center w-75">
                <div class="card rounded">
                    <div class="card-body d-flex">
                        <div class="flex-grow-1">
                            <h1 class="mb-3">Profile</h1>
                            @if ($errors)
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            @endif
                            <form class="p-2 flex-grow-q mt-auto" enctype="multipart/form-data" action="/update-name" method="POST">
                                @csrf
                                <div class="mb-3 d-flex justify-content-between">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control w-75" placeholder="Full Name" name="name" value="{{ Auth::user()->user_name }}">
                                </div>
                                <div class="mb-3 form-checkbox d-flex justify-content-between">
                                    <label class="form-label">Email</label>
                                    <div class="w-75">{{ Auth::user()->email }}</div>
                                </div>
                                <div class="col-12 mb-0 d-flex">
                                    <input class="btn btn-primary ms-auto" type="submit" value="Update">
                                </div>
                            </form>
                        </div>
                        <div class="d-flex">
                            <a class="btn btn-primary mt-auto mb-2" href="/change-password">Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endauth
@endsection
