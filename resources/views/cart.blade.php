@extends('layout')

@section('title')
Cart
@endsection

@section('body')
@auth
    @if (Auth::user()->user_role == 'member')
        <div class="justify-content-center align mx-auto w-75 mt-5">
            <?php $grandTotal = 0; ?>
            <table class="table w-100 mt-5">
                <thead>
                <tr>
                    <th scope="col">Course Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($cart as $item)
                        <?php $grandTotal = $grandTotal + ($item->course->course_price); ?>
                        <tr>
                            <td> <scope="row">{{ $item->course->course_name }}</td>
                            <td>{{ $item->course->course_price }}</td>
                            <td>{{ $item->course->course_author }}</td>
                            <td>IDR {{$item->course->course_price}}</td>
                            <td>
                                <a href="{{ url('/course-details/'.$item->course_id) }}" class="btn btn-secondary">View Course Detail</a>
                                <a href="{{ url('/delete-cart-item/'.$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                    <tr>
                            <td>
                            <p style="color:black;" class="mt-2">No data...</p>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
    
                    @endforelse
                </tbody>
            </table>
            <p class="fs-2 fw-bold">Total Price : IDR {{ $grandTotal }}</p>
            @if (!$cart->isEmpty())

            <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-dark text-white text-center">
                <h5>CONFIRM YOUR PAYMENT</h5>
            </div>
            <div class="card-body my-3">
                    <div class="row">
                        <div class="col-md-6 my-3">
                            <h5 class="fw-bold">Transfer via BCA</h5>
                            <ul>
                                <li>Bank Account Number: 5987654321</li>
                                <li>Bank Account Name: LMS</li>
                                <li>Nominal: Based On Total Price</li>
                            </ul>
                            <div class="alert alert-info">
                                After you submit the transfer proof and validated by our system, you can access your course in view transaction history -> detail -> view course
                            </div>
                        </div>
                        <div class="col-md-6 my-3">
                            <h5 class="fw-bold">Upload your transfer proof below</h5>
                            <div class="my-3">
                                <label for="proof">Transfer Proof
                                    <br>
                                    <small>Format: JPG,PNG,JPEG | Max Size: 1MB</small>
                                </label>
                                <input type="file" class="form-control" name="transfer_proof" required>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid mt-2">
                    <a href="{{ url('/checkout/'.$cart->first()->transaction_id) }}" class="btn btn-primary">Checkout</a>
                    </div>
            </div>
        </div>
            @else
                <p></p>
            @endif
        </div>
    @endif
@endauth
@endsection
