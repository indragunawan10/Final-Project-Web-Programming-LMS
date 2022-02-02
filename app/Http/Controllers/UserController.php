<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function register(Request $request) {
        $rules = [
            'email' => 'unique:users|required|email',
            'name' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $user = new User;
            $transactionHeader = new TransactionHeader;

            $user->email = $request->email;
            $user->user_name = $request->name;
            $user->password = bcrypt($request->password);

            $user->save();

            $transactionHeader->user_id = $user->id;
            $transactionHeader->save();

            Auth::login($user);

            return redirect('/');
        }
    }

    public function login(Request $request) {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if ($request->rememberMe) {
                Cookie::queue('cookie-email', $request->email, 10080);
                Cookie::queue('cookie-password', $request->password, 10080);
            }
            if (Auth::attempt($credentials, true)) {
                return redirect('/');
            } else {
                return back()->withErrors('Invalid email or password');
            }
        }
    }

    public function updateName(Request $request) {
        $rules = [
            'name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            $user = User::find(Auth::User()->id);

            $user->user_name = $request->name;

            $user->save();

            return redirect('/profile');
        }
    }

    public function updatePassword(Request $request) {
        $rules = [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $user = User::find(Auth::User()->id);
                $user->password = bcrypt($request->password);

                $user->save();

                return redirect('/profile');
            } else {
                return back()->withErrors('Current password is invalid');
            }
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function viewListUser()
    {
        $users = User::all();
        return view('manageUser', ['users' => $users]);
    }

    public function deleteUser($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect('/view-user');
    }

    public function getDetailUser($id)
    {
        $users = User::where('id','=',$id )->first();
        return view('userDetail', ['users' => $users]);
    }

    public function updateUser(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $inputValid =  $this->validate($request, [
            'user_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$users->id
        ]);

        User::findOrFail($id)->update([
            'user_name' => $inputValid['user_name'],
            'email' => $inputValid['email'],
            'user_role' => $request->user_role
        ]);

        if(Auth::user()->id === $users->id && $request->user_role === 'member') {
            return redirect('/');
        }

        return redirect('/view-user');
    }
}
