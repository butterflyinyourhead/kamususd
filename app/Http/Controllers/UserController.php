<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        $credetials = [
            'name' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/home')->with('success', 'Login berhasil');
        }
        return back()->with('error', 'Username or Password Wrong');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
