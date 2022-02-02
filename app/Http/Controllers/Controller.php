<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homePage() {
        $courses = DB::table('courses')->paginate(5);
        return view('home', ['courses' => $courses]);
    }

    public function allCourse() {
        $courses = DB::table('courses')->paginate(5);
        return view('viewAllCourse', ['courses' => $courses]);
    }

    public function search(Request $request) {
        $courses = DB::table('courses')->where('course_name', 'LIKE', '%'.$request->courseName.'%')->paginate(5);
        return view('home', ['courses' => $courses]);
    }

    public function searchCourse(Request $request) {
        $courses = DB::table('courses')->where('course_name', 'LIKE', '%'.$request->courseName.'%')->paginate(5);
        return view('viewAllCourse', ['courses' => $courses]);
    }

    public function loginPage() {
        return view('login');
    }

    public function registerPage() {
        return view('register');
    }

    public function profilePage() {
        return view('profile');
    }

    public function changePasswordPage() {
        return view('changePassword');
    }

    public function cartPage() {
        $cart = TransactionDetail::with('course', 'transactionHeader')
                    ->join('transaction_headers', 'transaction_headers.transaction_id', '=', 'transaction_details.transaction_id')
                    ->where([['transaction_headers.user_id', Auth::user()->id], ['transaction_headers.status', 'cart']])
                    ->get();

        return view('cart', ['cart' => $cart]);
    }

    public function transactionHistoryPage() {
        $transactionHistory = TransactionHeader::where([['transaction_headers.user_id', Auth::user()->id], ['transaction_headers.status', 'checkout']])->get();
        return view('transactionHistory', ['transactions' => $transactionHistory]);
    }
}
