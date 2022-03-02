<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function userLoginView()
    {
        return view('auth.login');
    }

    public function userLoginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email'          => 'required|email',
            'password'       => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if (auth()->user()->account_status == "active") {
                $request->session()->regenerate();
                return redirect()->route('user.dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['Your account is block!']);
            }
        } else {
            return redirect()->back()->withErrors(['The provided credentials do not match our records.']);
        }
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
