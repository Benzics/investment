<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\core\UserController;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class ProfileController extends UserController
{
    public function index()
    {
        $title = 'Profile';
        $page_title = $title;
        $user = auth()->user();
        $profile = $this->_user_service->get_profile($user->id);
        $ref_id = $profile->ref_id;

      
        $view_data = ['profile'];

        return view('user.profile', compact(array_merge($view_data, $this->_shared)));
    }

    public function profile()
    {

        $title = 'Edit Profile';
        $page_title = $title;
        $user = auth()->user();
        $profile = $this->_user_service->get_profile($user->id);
        $ref_id = $profile->ref_id;

      
        $view_data = ['profile'];

        return view('user.edit-profile', compact(array_merge($view_data, $this->_shared)));
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        $validate = $request->validate(['name' => 'required', 'phone' => 'required']);

        $attachment = '';

        if($request->has('photo'))
        {
            $attachment = $request->file('photo')->store('uploads');
        }
        $user_data = ['name' => $validate['name']];
        $profile_data = [
            'photo' => $attachment,
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

    public function photo(Request $request)
    {
        $validate = $request->validate(['image_upload_file' => 'required']);

        $upload = $request->file('image_upload_file')->store('uploads', 'public');

        if(!$upload)
        {
            $data = ['status' => false, 'error' => 'unable to upload your image'];

            return response()->json($data);
        }

        $data = ['status' => true, "image_small" => $upload, "success" => "Image uploaded successfully"];

        return response()->json($data);

    }
}
