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
            session()->flash('result', [
                'message' => 'You Are Login Successfully',
                'type' => 'success',
            ]);
            return redirect()->route('admin.index');
        }
        //Authentication failed...
        session()->flash('result', [
            'message' => 'Login failed, please try again..!',
            'type' => 'danger',
        ]);
        return redirect()
            ->back();
    }

    public function logout()
    {
        Session::flush();
        session()->flash('result', [
            'message' => 'You Are Logout..!',
            'type' => 'danger',
        ]);
        Auth::logout();
        return redirect()
            ->route('login')
            ->with('status', 'Logout successfully...!');
    }
}
