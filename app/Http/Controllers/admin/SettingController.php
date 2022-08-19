<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $service;
    public $settings;

    public function __construct(SettingService $service)
    {
        $this->service = $service;

        $this->settings = [
            'admin-mail',
            'site-name',
            'minimum-withdrawal',
            'maximum-withdrawal',
            'withdrawal-charges',
            'withdrawal-time',
            'deposit-charges',
            'support-mail',
            'deposit-notification',
            'investment-notification',
            'withdrawal-notification',
            'referral-bonus',
            'site-logo-1',
            'site-logo-2',
            'site-logo-3',
            'currency',
        ];
    }

    public function index()
    {
        $title = $page_title = 'Settings'; 

        $settings = [];

        $currencies = $this->service->get_currencies();

        foreach($this->settings as $key => $value)
        {
            $settings[$value] = setting($value);
        }

        $settings['withdrawal-charges'] = json_decode($settings['withdrawal-charges']);
        $settings['deposit-charges'] = json_decode($settings['deposit-charges']);

        $view_data = ['title', 'page_title', 'settings', 'currencies'];

        return view('admin.settings', compact($view_data));
    }

    public function store(Request $request)
    {
        $new_set = $this->settings;
        
        // unset fields we won't be needing in the validation

        $unset_items = ['site-logo-1', 'site-logo-2', 'site-logo-3', 'withdrawal-charges', 
        'deposit-charges', 'deposit-notification', 'withdrawal-notification', 'investment-notification'];

        for($i = 0; $i < count($unset_items); $i++)
        {
            $returned_key = array_search($unset_items[$i], $new_set);

            unset($new_set[$returned_key]);
        }

        // add extra validation fiels
        $new_set[] = 'withdrawal-charge';
        $new_set[] = 'deposit-charge';


        $validation_array = [];

        foreach($new_set as $key => $value)
        {
            $validation_array[$value] = 'required';
        }

        $validated = $request->validate($validation_array);

        // check if files were uploaded with the request
        if($request->hasFile('site-logo-1'))
        {
            $site_logo_1 = $request->file('site-logo-1')->store('uploads', 'public');
        }

        if($request->hasFile('site-logo-2'))
        {
            $site_logo_2 = $request->file('site-logo-2')->store('uploads', 'public');
        }

        if($request->hasFile('site-logo-3'))
        {
            $site_logo_3 = $request->file('site-logo-3')->store('uploads', 'public');
        }

        // store our settings
        foreach($this->settings as $key => $value)
        {
            if($value == 'withdrawal-charges')
            {
                $new_arr = [
                    'amount' => $request->input('withdrawal-charge'),
                    'type' => $request->input('withdrawal-charge-type'),
                ];

                $new_json = json_encode($new_arr);

                $this->service->update_setting($new_json, 'withdrawal-charges');

                continue;
            }

            if($value == 'deposit-charges')
            {
                $new_arr = [
                    'amount' => $request->input('deposit-charge'),
                    'type' => $request->input('deposit-charge-type'),
                ];

                $new_json = json_encode($new_arr);

                $this->service->update_setting($new_json, 'deposit-charges');

                continue;
            }

            if($value == 'site-logo-1')
            {
                $logo_val = isset($site_logo_1) ? "/storage/$site_logo_1" : setting('site-logo-1');

                $this->service->update_setting($logo_val, 'site-logo-1');

                continue;
            }

            if($value == 'site-logo-2')
            {
                $logo_val = isset($site_logo_2) ? "/storage/$site_logo_2" : setting('site-logo-2');

                $this->service->update_setting($logo_val, 'site-logo-2');

                continue;
            }

            if($value == 'site-logo-3')
            {
                $logo_val = isset($site_logo_3) ? "/storage/$site_logo_3" : setting('site-logo-3');

                $this->service->update_setting($logo_val, 'site-logo-3');

                continue;
            }

            if($value == 'deposit-notification')
            {
                $noti_val = ($request->has('deposit-notification')) ? '1' : '0';

                $this->service->update_setting($noti_val, 'deposit-notification');
                continue;
            }

            if($value == 'withdrawal-notification')
            {
                $noti_val = ($request->has('withdrawal-notification')) ? '1' : '0';

                $this->service->update_setting($noti_val, 'withdrawal-notification');
                continue;
            }

            if($value == 'investment-notification')
            {
                $noti_val = ($request->has('investment-notification')) ? '1' : '0';

                $this->service->update_setting($noti_val, 'investment-notification');
                continue;
            }

            $this->service->update_setting($request->input($value), $value);
        }

        return redirect('/admin/settings')->with('success', 'Settings updated successfully.');
    }
}
