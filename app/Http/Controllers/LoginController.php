<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $userInfo = Admin::where('username', '=', $request->username)->first();

        if (!$userInfo) {
            return back()->with('fail', 'username salah');
        } else {
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('loggedUser', $userInfo->id);
                return back()->with('success', 'Login berhasil');
            }
            return back()->with('fail', 'password salah');
        }
    }

    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->pull('loggedUser');
            return redirect('/')->with('success', 'Logout Berhasil');
        }
    }
}
