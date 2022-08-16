<?php
/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Services\RegistrationService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class RegistrationController extends Controller
{
    public function index(Request $request) : View
    {
        $ref = $request->ref;
        
        return view('register', ['title' => 'Registration', 'ref' => $ref]);
    }

    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'phone' => 'required',
            'password' => 'required|min:5|confirmed'

        ]);

        $reg_service = new RegistrationService();
        $user_service = new UserService();

        // create user
        $user = $user_service->create_user([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);


        // generate user ref_id
        $ref_id = $reg_service->newRefId($user->id, 'ZFX');

        // determine if user referal id is valid 
        if($request->input('g_id'))
        {
            $referer = $reg_service->getRefUser($request->input('g_id'));
        }

        // create user profile
        $user_service->create_profile([
            'user_id' => $user->id,
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
            'ref_id' => $ref_id,
            'referrer' => $referer ?? 0,
        ]);

        try {
            event(new Registered($user));
        } catch (Throwable $e) {
            report($e);
            // return back()->withErrors(['email' => 'Sorry there is an internal server issue. Please contact the admin.']);
        }

        Auth::login($user);

        return redirect()->route('user.dashboard');

    }
}
