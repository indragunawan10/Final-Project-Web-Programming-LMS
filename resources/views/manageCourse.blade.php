@extends('layout')

@section('title')
Insert Course Form
@endsection

@section('body')
@auth
    @if (Auth::user()->user_role === 'admin')
        <div class="container col-6 mt-5 w-75 mt-5">
            <div class="card mt-5">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                     {{ Session::get('message') }}
                </div>
                @endif
                <h5 class="ms-2 mt-2">Insert Course Form</h5>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="/insert-course">
                        @csrf

                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="course_name" class="mt-2">Name</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <input type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" id="course_name">
                                    @error('course_name')
                                    <div class="col invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <div class="d-flex justify-content-between">
                                <label for="course_author" class="mt-2">Author</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <input type="text" class="form-control @error('course_author') is-invalid @enderror" name="course_author" id="course_author">
                                    @error('course_author')
                                    <div class="col invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="form-group mt-4">
                            <div class="d-flex justify-content-between">
                                <label for="description" class="mt-2">Description</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="20" rows="5"></textarea>
                                    @error('description')
                                    <div class="col invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group mt-4">
                            <div class="d-flex justify-content-between">
                                <label for="category_id" class="mt-2">Category</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    @forelse($categories as $category)
                                    <div class="mb-3 form-checkbox">
                                        <input class="form-check-input @error('category') is-invalid @enderror" type="checkbox" value="{{$category->id}}" id="{{$category->category_name}}" name="category[]" />
                                        <label class="form-check-label" for="{{$category->category_name}}">{{$category->category_name}}</label>
                                    </div>

                                    @empty
                                    <p style="text-decoration:none;color:black;" class="mt-2">No data...</p>
                                    @endforelse

                                    @error('category')
                                    <p style="text-decoration:none;color:red;" class="mt-2">The category field is required</p>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="form-group mt-4">
                            <div class="d-flex justify-content-between">
                                <label for="course_price" class="mt-2">Price</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <input type="number" class="form-control @error('course_price') is-invalid @enderror" name="course_price" id="course_price">
                                    @error('course_price')
                                    <div class="col invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="d-flex justify-content-between">
                                <label for="cover" class="mt-2">Cover</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <input class="form-control @error('cover') is-invalid @enderror" name="cover" type="file" id="cover">
                                    @error('cover')
                                    <div class="col invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="d-flex justify-content-between">
                                <label for="material" class="mt-2">Material</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <input class="form-control @error('material') is-invalid @enderror" name="material" type="file" id="material">
                                    @error('material')
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
                        <th scope="col">Author
                        </th>
                        <th scope="col">Description
                        </th>
                        <th scope="col">Category
                        </th>
                        <th scope="col">Price
                        </th>
                        <th scope="col">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                    <tr>
                        <td scope="row" class="w-40">
                            <a style="text-decoration:none;color:black;">{{$course->course_name}}
                            </a>
                        </td>
                        <td scope="row">
                            <a style="text-decoration:none;color:black;">{{$course->course_author}}
                            </a>
                        </td>
                        <td scope="row" class="w-40">
                            <a style="text-decoration:none;color:black;">{{$course->description}}
                            </a>
                        </td>
                        <td>
                            @foreach($course->category as $key=>$category)
                                @if ($key+1 === count($course->category))
                                    {{$category->category_name}}
                                @elseif ($key+1 !== count($course->category))
                                    {{$category->category_name}} ,
                                @endif
                            @endforeach
                        </td>
                        <td scope="row">
                            <a style="text-decoration:none;color:black;">IDR {{$course->course_price}}
                            </a>
                        </td>
                        <td scope="row" class="d-flex">
                            <a href="/course-details/{{$course->id}}">
                                <button class="btn btn-secondary">View Detail</button>
                            </a>
                            <form method="post" action="{{route('course.delete',$course->id)}}">
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
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif
@endauth
@endsection
