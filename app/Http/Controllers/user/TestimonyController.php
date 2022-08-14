<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\core\UserController;
use Illuminate\Http\Request;

class TestimonyController extends UserController
{
    public function index()
    {
        $title = 'Testimony';
        $page_title = $title;
        $user = auth()->user();
        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;

        return view('user.testimony', compact('title', 'page_title', 'user', 'ref_id',));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $validate = $request->validate(['testimony' => 'required']);

        $this->_user_service->write_testimony($validate['testimony'], $user->id);

        return redirect('/user/testimony')->with('success', 'Your testimony was submitted successfully. It will be reviewed shortly');

    }
}
