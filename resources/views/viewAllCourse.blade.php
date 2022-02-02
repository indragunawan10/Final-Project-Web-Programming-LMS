@extends('layout')

@section('title')
Home
@endsection

@section('body')


<div class="d-flex justify-content-center align my-auto mt-5">
    <div class="container mt-5">
        <div class="container row">
            <form class="d-flex w-100" enctype="multipart/form-data" action="/searchCourse" method="POST">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search by Course Name" aria-label="Search" name="courseName">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <div class="mt-2">
                <button class="btn btn-primary" type="submit"><a href="/course" class="text-decoration-none btn-primary">Clear filter</a></button>
            </div>
        </div>

        <div class="container mt-5">
                @forelse ($courses as $course)


                <div class="card mb-3" style="width: 1250px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="{{ Storage::url($course->cover_path) }}" class="card-img-top" alt="{{ $course->course_name }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">{{ $course->course_name }}</h5>
                            <p class="card-text">By: {{ $course->course_author }}</p>
                            <p class="card-text">IDR {{ $course->course_price }}</p>
                            <a class="btn btn-primary" href="{{ url('/course-details/'.$course->id) }}">View details</a>
                            </div>
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

@endsection