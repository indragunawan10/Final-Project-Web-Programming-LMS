@extends('layout')

@section('title')
Insert Category Form
@endsection

@section('body')
@auth
    @if (Auth::user()->user_role === 'admin')
        <div class="container col-6 mt-5">
            <div class="card mt-5">
             @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                     {{ Session::get('message') }}
                </div>
                @endif
                <h5 class="ms-2 mt-2">Insert Category Form</h5>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="/insert-category">
                        @csrf
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="category_name" class="mt-2">Name</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name">
                                    @error('category_name')
                                    <div class="col invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-start mt-4">
                            <button type="submit" class="btn btn-primary col-5 ">Insert</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name
                        </th>
                        <th scope="col">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td scope="row">
                            <a style="text-decoration:none;color:black;">{{$category->category_name}}
                            </a>
                        </td>
                        <td scope="row" class="d-flex">
                            <a href="/view-details-category/{{$category->id}}">
                                <button class="btn btn-secondary">View Detail</button>
                            </a>
                            <form method="post" action="{{route('category.delete',$category->id)}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger ms-2">Delete</button>
                            </form>
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
    @endif
@endauth
@endsection
