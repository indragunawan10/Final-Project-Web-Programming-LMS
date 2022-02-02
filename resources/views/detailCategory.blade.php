@extends('layout')

@section('title')
View Category Detail
@endsection

@section('body')
<div class="container col-6 mt-5">
    <div class="card mt-5">
        <h5 class="ms-2 mt-2">{{$category->category_name}}'s Category Detail</h5>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{route('category.update',$category->id)}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="category_name" class="mt-2">Category Name</label>
                        <div class="d-flex flex-column col-sm-6 col-md-8">
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name" value="{{$category->category_name}}">
                            @error('category_name')
                                <div class="col invalid-feedback">
                                    {{ $message }}
                                </div>
                        @enderror
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
    <h5 class="ms-2 mt-2">Course List</h5>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($category->course as $course)
                <tr>
                    <td scope="row">
                        <a style="text-decoration:none;color:black;">{{$course->course_name}}</a>
                    </td>
                    <td scope="row" class="d-flex">
                        <a href="/course-details/{{$course->id}}">
                            <button class="btn btn-secondary">View Detail</button>
                        </a>
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
