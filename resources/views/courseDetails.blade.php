@extends('layout')

@section('title')
Course Details
@endsection

@section('body')
<div class="d-flex justify-content-center align my-auto">
    @auth
        @if (Auth::user()->user_role === 'admin')
        <div class="container col-6 mt-5 w-75 mt-5">
            <div class="card">
                <h5 class="ms-2 mt-2">{{$course->course_name}} series's Course Detail</h5>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{route('course.update',$course->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="course_name" class="mt-2">Name</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <input type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" id="course_name" value="{{$course->course_name}}">
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
                                    <input type="text" class="form-control @error('course_author') is-invalid @enderror" name="course_author" id="course_author" value="{{$course->course_author}}">
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
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="20" rows="5">{{$course->description}}</textarea>
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
                                        <input class="form-check-input @error('category') is-invalid @enderror" type="checkbox" value="{{$category->id}}" id="{{$category->category_name}}" name="category[]"
                                        @foreach($course->category as $g)
                                        @if($g->id == $category->id)
                                            checked
                                        @endif
                                        @endforeach
                                        />
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
                                    <input type="number" class="form-control @error('course_price') is-invalid @enderror" name="course_price" id="course_price" value="{{$course->course_price}}">
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
                                <label for="cover_path" class="mt-2">Cover</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <img src="{{asset('storage/' . $course->cover_path)}}" alt="" class="mb-2 ms-2" width="200" />
                                    <input class="form-control @error('cover_path') is-invalid @enderror" name="cover_path" type="file" id="cover_path">
                                    @error('cover_path')
                                    <div class="col invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <div class="d-flex justify-content-between">
                                <label for="material_path" class="mt-2">Material</label>
                                <div class="d-flex flex-column col-sm-6 col-md-8">
                                    <a href="{{asset('storage/' . $course->material_path)}}" download
                                        class="btn btn-success text-white">
                                        Download
                                    </a>
                                    <input class="form-control @error('material_path') is-invalid @enderror" name="material_path" type="file" id="material_path">
                                    @error('material_path')
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
        </div>
        @elseif (Auth::user()->user_role === 'member')
            <div class="border w-75">
                <h1>{{ $course->course_name }}'s Course Detail</h1>
                <div class="mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($course->cover_path) }}" class="img-fluid rounded-start" alt="{{ $course->course_name }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="align-middle col-md-4">Name</td>
                                            <td>{{ $course->course_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle col-md-4">Author</td>
                                            <td>{{ $course->course_author }}</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle col-md-4">Description</td>
                                            <td>{{ $course->description }}</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle col-md-4">Category</td>
                                            <td>
                                                @foreach($course->category as $key=>$category)
                                                    @if ($key+1 === count($course->category))
                                                        {{$category->category_name}}
                                                    @elseif ($key+1 !== count($course->category))
                                                        {{$category->category_name}} ,
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle col-md-4">Price</td>
                                            <td>IDR {{ $course->course_price }}</td>
                                        </tr>
                                        <tr>
                                            <form class="p-2 flex-grow-q mt-auto" enctype="multipart/form-data" action="{{ url('/add-to-cart/'.$course->id) }}" method="POST">
                                                @csrf
                                                <td class="align-middle col-md-4">
                                                </td>
                                                <td>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <input class="btn btn-primary" type="submit" value="Add to Cart">
                                                    </div> 
                                                </td>
                                            </form>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
    <div class="border w-75">
        <h1>{{ $course->course_name }}'s Course Detail</h1>
        <div class="mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ Storage::url($course->cover_path) }}" class="img-fluid rounded-start" alt="{{ $course->course_name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="align-middle col-md-4">Name</td>
                                    <td>{{ $course->course_name }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle col-md-4">Author</td>
                                    <td>{{ $course->course_author }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle col-md-4">Description</td>
                                    <td>{{ $course->description }}</td>
                                </tr>
                                <tr>
                                    <td class="align-middle col-md-4">Category</td>
                                    <td>
                                        @foreach($course->category as $key=>$category)
                                            @if ($key+1 === count($course->category))
                                                {{$category->category_name}}
                                            @elseif ($key+1 !== count($course->category))
                                                {{$category->category_name}} ,
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="align-middle col-md-4">Price</td>
                                    <td>IDR {{ $course->course_price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
</div>
@endsection
