@extends('layout')

@section('title')

@endsection

@section('body')
<div class="d-flex justify-content-center align my-auto">
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
                                        <td></td>
                                        <td>
                                            <div class="col-12 d-flex justify-content-end">
                                                <a href="{{asset('storage/' . $course->material_path)}}" download
                                                    class="btn btn-success text-white">
                                                        Download Material
                                                </a>
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
</div>
@endsection