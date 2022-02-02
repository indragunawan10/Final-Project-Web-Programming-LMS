<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function addToCart(Request $request, $id) {
            $transactionHeader = TransactionHeader::where('user_id', Auth::user()->id)->orderBy('transaction_id', 'desc')->first();
            $transactionDetail = TransactionDetail::where([['transaction_id', $transactionHeader->transaction_id], ['course_id', $id]])->first();
            if ($transactionDetail === null) {
                $transactionDetail = new TransactionDetail;

                $transactionDetail->transaction_id = $transactionHeader->transaction_id;
                $transactionDetail->course_id = $id;

                $transactionDetail->save();

                return back();
            }
            return back()->withErrors('Course already in cart');
    }

    public function deleteItem($id) {
        $item = TransactionDetail::find($id);

        $item->delete();

        return back();

    }

    public function checkout($id) {
        $transaction = TransactionHeader::find($id);

        $transaction->status = 'checkout';

        $transaction->save();

        $transactionHeader = new TransactionHeader;

        $transactionHeader->user_id = Auth::user()->id;
        $transactionHeader->save();

        return redirect('/');
    }

    public function transactionDetailsPage($id) {
        $transaction = TransactionDetail::with('course', 'transactionHeader')
                    ->join('transaction_headers', 'transaction_headers.transaction_id', '=', 'transaction_details.transaction_id')
                    ->where([['transaction_headers.user_id', Auth::user()->id], ['transaction_headers.status', 'checkout'], ['transaction_details.transaction_id', $id]])
                    ->get();
        return view('transactionDetail', ['transaction' => $transaction]);
    }
}
