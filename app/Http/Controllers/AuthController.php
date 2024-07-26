<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('dashboard.pages.login.loginForm');
    }

    public function login(Request $request)
    {
        // validate the form data
        // check email exists and password match with the email
        // if email and password match then redirect to dashboard
        // if email and password not match then redirect to log in form with error message

       $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'remember' => 'boolean'
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::guard('web')->attempt($credentials, $request->remember)){
            return redirect()->route('dashboard.index');
        }
        return redirect()->route('login.form')->withInput()
            ->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }


}
