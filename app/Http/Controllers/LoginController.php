<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage ()
    {
        return view('frontend.pages.auth.login');
    }

    public function login (Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credential, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
            // echo "hello";
        }

        // return error message
        return back()->withErrors([
            'email' => 'Wrong Credentials found!'
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

}
