<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

    public function account()
    {
        $user = Auth::user();
        return view('admin.account', compact('user'));
    }

    public function accountUpdate(Request $request)
    {
        $id = $request->get('id');
        $input = $request->all();
        $validator = Validator::make($input, [
            'email' => 'email|max:50|unique:users,email,' . $id,
            'password' => 'min:5',
            're-password' => 'required_with:password|same:password|min:5',
        ]);

        if ($validator->fails()) {
            session()->flash('result', [
                'message' => 'Validation Error..!',
                'type' => 'danger',
            ]);
            return redirect()->back();
        }

        try {

            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::findOrFail($id)->first();
            $user->email = $email;
            $user->password = Hash::make($password);
            $result = $user->save();

            if ($result) {
                session()->flash('result', [
                    'message' => 'User Update Successfully..!',
                    'type' => 'success',
                ]);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            session()->flash('result', [
                'message' => 'Operation Failed..!',
                'type' => 'danger',
            ]);
            Log::info($e->getMessage());
            return redirect()->back();
        }
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
            ->route('index')
            ->with('status', 'Logout successfully...!');
    }
}
