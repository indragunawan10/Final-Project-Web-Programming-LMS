@extends('layout')

@section('title')
Transaction History
@endsection

@section('body')
@auth
    @if (Auth::user()->user_role === 'member')
        <div class="justify-content-center align mx-auto w-75 mt-5">
            <table class="table w-100 mt-5">
                <thead>
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td scope="row">{{ $transaction->transaction_id }}</td>
                            <td>{{ Carbon\Carbon::parse($transaction->updated_at)->isoFormat('ddd, MMM D, YYYY h:mm A') }}</td>
                            <td>
                                <a href="{{ url('/transaction-details/'.$transaction->transaction_id) }}" class="btn btn-secondary">View Transaction Detail</a>
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
        </div>
    @endif
@endauth
@endsection
