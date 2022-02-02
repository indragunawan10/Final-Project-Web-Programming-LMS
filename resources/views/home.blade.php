@extends('layout')

@section('title')
Home
@endsection

@section('body')

@if (Auth::user() === null)
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="display-2 fw-bold text-dark mt-5">Learning Easier with LMS</h1>
            <p>Our Learning Management System will support your skill for gaining knowledge
                of learning process
            </p>
            <button class="btn btn-primary"><a class="nav-link" href="/register" style="color: white;">Register Now</a></button>
        </div>
        <div class="col-md-6 mt-5">
            <img src="/home/home.png" alt="" class="w-100">
        </div>
    </div>
</div>
@else
    @if (Auth::user()->user_role === 'admin')
<div class="d-flex justify-content-between align my-auto mt-5">
    <div class="container mt-5">
        <div class="container row">
            <form class="d-flex w-100" enctype="multipart/form-data" action="/search" method="POST">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="courseName">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <div class="mt-2">
                <button class="btn btn-primary" type="submit"><a href="/" class="text-decoration-none btn-primary">Clear filter</a></button>
            </div>
        </div>
        <div class="card-group mt-2">
            @forelse ($courses as $course)
            <div class="card" style="max-width: 20%;">
                <img src="{{ Storage::url($course->cover_path) }}" class="card-img-top" alt="{{ $course->course_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->course_name }}</h5>
                    <div class="mt-auto">
                        <p class="card-text">By: {{ $course->course_author }}</p>
                        <p class="card-text">IDR {{ $course->course_price }}</p>
                        <a class="btn btn-primary" href="{{ url('/course-details/'.$course->id) }}">View details</a>
                    </div>
                </div>
            </div>
            @empty
                    <h5 class="card-title mt-5">Course is empty..</h5>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $courses->links() }}
        </div>
    </div>
</div>
@elseif (Auth::user()->user_role === 'member')
    <div class="container mt-5">

        <h1 class="mt-3 text-center mt-5">Popular Course</h1>
        <p class="text-center">Towards success with a variety of selected quality practical learning materials</p>
        <div class="card-group mt-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            @forelse ($courses as $course)
            <div class="card" style="max-width: 20%;">
                <img src="{{ Storage::url($course->cover_path) }}" class="card-img-top" alt="{{ $course->course_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->course_name }}</h5>
                    <div class="mt-auto">
                        <p class="card-text">By: {{ $course->course_author }}</p>
                        <p class="card-text">IDR {{ $course->course_price }}</p>
                        <a class="btn btn-primary" href="{{ url('/course-details/'.$course->id) }}">View details</a>
                    </div>
                </div>
            </div>
            @empty
                    <h5 class="card-title mt-5">Course is empty..</h5>
            @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <a class="btn btn-primary" href="/course">View All Courses</a>
        </div>
    </div>
</div>
@endif
@endif
@endsection