<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            Session::put('userType', 'admin');
            return redirect()->route('admin.index');
        }
        //Authentication failed...
        session()->flash('message', 'Login failed, please try again!');
        return redirect()
            ->back();
    }
}
