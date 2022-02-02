@extends('layout')

@section('title')
View Details User
@endsection

@section('body')
<div class="container col-6 mt-5 w-75">
    <div class="card">
        <h5 class="ms-2 mt-2">{{$users->user_name}}'s User Detail</h5>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="/update-user/{{$users->id}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="user_name" class="mt-2">Name</label>
                        <div class="d-flex flex-column col-sm-6 col-md-8">
                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" id="user_name" value="{{$users->user_name}}">
                            @error('user_name')
                            <div class="col invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group mt-4">
                    <div class="d-flex justify-content-between">
                        <label for="email" class="mt-2">Email</label>
                        <div class="d-flex flex-column col-sm-6 col-md-8">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$users->email}}">
                            @error('email')
                            <div class="col invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>



                <div class="form-group mt-4">
                    <div class="d-flex justify-content-between">
                        <label for="description" class="mt-2">Role</label>
                        <div class="d-flex flex-column col-sm-6 col-md-8">
                            @if ($users->user_role == 'admin')
                            <select class="form-select" name="user_role">
                                <option value="member">member</option>
                                <option value="admin" selected>admin</option>
                            </select>
                            @else
                            <select class="form-select" name="user_role">
                                <option value="member" selected>member</option>
                                <option value="admin">admin</option>
                            </select>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-start mt-4">
                    <button type="submit" class="btn btn-primary col-5 ">Update</button>
                </div>
            </form>
        </div>
    </div>
    <br>
</div>
@endsection
