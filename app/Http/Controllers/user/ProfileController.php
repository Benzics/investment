<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\core\UserController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends UserController
{
    public function index() : View
    {
        $title = 'Profile';
        $page_title = $title;
        $user = auth()->user();
        $profile = $this->_user_service->get_profile($user->id);
        $ref_id = $profile->ref_id;

      
        $view_data = ['profile'];

        return view('user.profile', compact(array_merge($view_data, $this->_shared)));
    }

    public function profile() : View
    {

        $title = 'Edit Profile';
        $page_title = $title;
        $user = auth()->user();
        $profile = $this->_user_service->get_profile($user->id);
        $ref_id = $profile->ref_id;

      
        $view_data = ['profile'];

        return view('user.edit-profile', compact(array_merge($view_data, $this->_shared)));
    }

    public function store(Request $request) : RedirectResponse
    {

        $user = auth()->user();
        $validate = $request->validate(['name' => 'required', 'phone' => 'required']);

        // $attachment = '';

        // if($request->has('photo'))
        // {
        //     $attachment = $request->file('photo')->store('uploads');
        // }
        $user_data = ['name' => $validate['name']];
        $profile_data = [
            // 'photo' => $attachment,
            'phone' => $validate['phone'],
            'gender' => $request->gender,
            'address' => $request->address,
            'country' => $request->country,
            'zip' => $request->zip,
        ];

        $this->_user_service->update_user($user_data, $user->id);
        $this->_user_service->update_profile($profile_data, $user->id);

        return redirect('/user/profile')->with('success', 'Profile successfully updated');
    }

    public function photo(Request $request) : JsonResponse
    {
        $request->validate(['image_upload_file' => 'required']);

        $upload = $request->file('image_upload_file')->store('uploads', 'public');

        $user = auth()->user();
        if(!$upload)
        {
            $data = ['status' => false, 'error' => 'unable to upload your image'];

            return response()->json($data);
        }

        $this->_user_service->save_profile_photo($upload, $user->id);

        $data = ['status' => true, "image_small" => $upload, "success" => "Image uploaded successfully"];

        return response()->json($data);

    }

    public function password() : View
    {
        $title = 'Change Password';
        $page_title = $title;
        $user = auth()->user();
        $profile = $this->_user_service->get_profile($user->id);
        $ref_id = $profile->ref_id;

        $view_data = [];

        return view('users.password', compact(array_merge($view_data, $this->_shared)));
    }
}
