<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request, User $u)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $remember = $request->remember ? TRUE : FALSE;

        if (Auth::attempt($credentials, $remember))
        {
            $request->session()->regenerate();

            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }
}
