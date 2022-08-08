<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('register', ['title' => 'Registration']);
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


        // generate user ref_id
        $ref_id = 'ZFX-'. mt_rand(111111, 999999) . $user->id;

        // determine if user referal id is valid 
        if(isset($request->input('g_id')))
        {
            $referer = Profile::where('ref_id', $request->input('g_id'))->get();

            if($referer)
            {
                
            }
        }

        // create user profile
        $profile = Profile::create([
            'user_id' => $user->id,
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
            'ref_id' => $ref_id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.dashboard');

    }
}
