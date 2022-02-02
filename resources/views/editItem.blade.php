@extends('layout')

@section('title')
Course Details
@endsection

@section('body')
@auth
    @if (Auth::user()->user_role === 'member')
        <div class="d-flex justify-content-center align my-auto">
            <div class="border w-75">
                <h1>{{ $detailTransaction->course_name }}'s Course Detail</h1>
                <div class="mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($detailTransaction->cover_path) }}" class="img-fluid rounded-start" alt="{{ $detailTransaction->course_name }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="align-middle col-md-4">Name</td>
                                            <td>{{ $detailTransaction->course_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle col-md-4">Author</td>
                                            <td>{{ $detailTransaction->course_author }}</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle col-md-4">Description</td>
                                            <td>{{ $detailTransaction->description }}</td>
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
                                            <td>IDR {{ $detailTransaction->course_price }}</td>
                                        </tr>
                                        <tr>
                                            <form class="p-2 flex-grow-q mt-auto" enctype="multipart/form-data" action="{{ url('/edit-cart-item/'.$id) }}" method="POST">
                                                @csrf
                                                <td class="align-middle col-md-4">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label class="input-group-text" for="inputGroupSelect01">Quantity</label>
                                                        </div>
                                                        <input type="number" class="form-control" name="quantity"  value="1" disabled>
                                                        @if ($errors)
                                                        @foreach ($errors->all() as $error)
                                                            <li class="text-danger">{{ $error }}</li>
                                                        @endforeach
                                                    @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <input class="btn btn-primary" type="submit" value="Update">
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
    @endif
@endauth
@endsection
