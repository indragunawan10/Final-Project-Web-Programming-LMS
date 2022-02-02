@extends('layout')

@section('title')
Manage User
@endsection

@section('body')
<div class="container col-6 mb-5 mt-5">
    <table class="table table-hover mb-5 mt-5">
        <thead>
            <tr>
                <th scope="col">Name
                </th>
                <th scope="col">Email
                </th>
                <th scope="col">Role
                </th>
                <th scope="col">Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td scope="row">
                    <a style="text-decoration:none;color:black;">{{$user->user_name}}
                    </a>
                </td>
                <td scope="row">
                    <a style="text-decoration:none;color:black;">{{$user->email}}
                    </a>
                </td>
                <td scope="row">
                    <a style="text-decoration:none;color:black;">{{$user->user_role}}
                    </a>
                </td>
                <td scope="row" class="d-flex">
                    <a href="/view-details-user/{{$user->id}}">
                        <button class="btn btn-secondary">View Detail</button>
                    </a>
                    @if ($user->user_role == 'member')
                    <form method="post" action="{{route('user.delete',$user->id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger ms-2">Delete</button>
                    </form>
                    @endif
                </td>
                @empty
                <td scope="row">
                    <a style="text-decoration:none;color:black;" class="dropdown-item">No data...</a>
                </td>
                <td></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
