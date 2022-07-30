<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'phone' => 'required',
            'password' => 'required|min:5|confirmed'

        ]);

        // create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // create user profile
        $profile = Profile::create([
            'user_id' => $user->id,
            'gender' => $validated['gender'],
            'phone' => $validated['phone']
        ]);

        event(new Registered($user));

    }
}
