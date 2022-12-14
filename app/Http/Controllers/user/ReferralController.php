<?php
/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers\user;

use App\Http\Controllers\core\UserController;
use Illuminate\Contracts\View\View;


class ReferralController extends UserController
{
    public function index() : View
    {
        $title = 'My Referrals';
        $page_title = $title;
        $user = auth()->user();
        $ref_id = $this->_user_service->get_profile($user->id)?->ref_id;

        $users = $this->_user_service->get_referral_list($user->id);
        $currency = $this->_currency;

        $reward = setting('referral-bonus');
        
        $view_data = ['title', 'page_title', 'user', 'ref_id', 'users', 'currency', 'reward'];

        return view('user.referrals', compact($view_data));
    }
}
