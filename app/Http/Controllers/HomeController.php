<?php
/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers;

use App\Services\UserInvestmentService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * the view version to render
     */
    public $v;
    
    public function __construct()
    {
        $this->v = env('SITE_VERSION');
    }
    public function index()
    {
        $title = 'Home';
        $investment_service = new UserInvestmentService;

        $investments = $investment_service->get_active_plans();

        return view('index' . $this->v, compact('title', 'investments'));
    }

    public function about()
    {
        $title = 'About';
        $site_name = ucwords(setting('site-name'));

        return view('about' . $this->v, compact('title', 'site_name'));
    }

    public function faq()
    {
        $title = 'FAQ';

        return view('faq' . $this->v, compact('title'));
    }

    public function contact()
    {
        $title = 'Contact';

        return view('contact' . $this->v, compact('title'));
    }

    public function terms()
    {
        $title = 'Terms';
        $site_name = ucwords(setting('site-name'));

        return view('terms' . $this->v, compact('title', 'site_name'));
    }

    
}
