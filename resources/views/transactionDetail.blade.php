@extends('layout')

@section('title')
Cart
@endsection

@section('body')
@auth
    @if (Auth::user()->user_role === 'member')
        <div class="justify-content-center align mx-auto w-75 mt-5">
            @php $grandTotal = 0; @endphp
            <table class="table w-100 mt-5">
                <thead>
                <tr>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course Author</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($transaction as $item)
                        @php $grandTotal = $grandTotal + ($item->course->course_price); @endphp
                        <tr>
                            <td scope="row">{{ $item->course->course_name }}</td>
                            <td>{{ $item->course->course_author }}</td>
                            <td>{{ $item->course->course_price }}</td>
                            <td>
                                <a href="{{ url('/my-course-details/'.$item->course_id) }}" class="btn btn-secondary">View My Course</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="fs-2 fw-bold">IDR {{ $grandTotal }}</p>
        </div>
    @endif
@endauth
@endsection
