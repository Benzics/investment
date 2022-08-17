<?php
/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\RegistrationService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View
     */
    public function index() : View
    {
        $title = $page_title = 'Users';

        $users = $this->service->get_users();

        return view('admin.users', compact('title', 'page_title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = $title = 'Users';

        return view('admin.users-create', compact('page_title', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:5',
        ]);

        $reg_service = new RegistrationService();

       
        // create user
        $user = $this->service->create_user([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
        ]);

         // generate user ref_id
         $ref_id = $reg_service->newRefId($user->id, 'ZFX');

        // create profile
        $this->service->create_profile([
            'user_id' => $user->id,
            'referrer' => '1',
            'ref_id' => $ref_id,
        ]);

        return redirect('/admin/users')->with('success', 'User successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
