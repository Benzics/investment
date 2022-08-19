<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $title = $page_title = 'Settings';
        
        $settings_arr = [
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

        $settings = [];

        $currencies = $this->service->get_currencies();

        foreach($settings_arr as $key => $value)
        {
            $settings[$value] = setting($value);
        }

        $settings['withdrawal-charges'] = json_decode($settings['withdrawal-charges']);
        $settings['deposit-charges'] = json_decode($settings['deposit-charges']);

        $view_data = ['title', 'page_title', 'settings', 'currencies'];

        return view('admin.settings', compact($view_data));
    }
}
