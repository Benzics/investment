<?php
/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Services\UserInvestmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Throwable;

class HomeController extends Controller
{
    /**
     * the view version to render
     */
    public $v;
    
    public function __construct()
    {
        $this->v = config('site.version');
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

        $site_name = ucwords(setting('site-name'));
        return view('faq' . $this->v, compact('title', 'site_name'));
    }

    public function affiliate()
    {
        $title = 'Affiliate';

        $site_name = ucwords(setting('site-name'));
        return view('affiliate' . $this->v, compact('title', 'site_name'));
    }

    public function contact()
    {
        $title = 'Contact';
        $email = setting('support-mail');
        $address = setting('address');

        return view('contact' . $this->v, compact('title', 'address', 'email'));
    }

    public function terms()
    {
        $title = 'Terms';
        $site_name = ucwords(setting('site-name'));

        return view('terms' . $this->v, compact('title', 'site_name'));
    }

    public function message(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required',
        ]);

        $data = [
            'name' => $validate['name'],
            'email' => $validate['email'],
            'text' => $validate['text']
        ];

        // send mail to admin
        try
        {
            Mail::to(setting('admin-mail'))->send(new ContactForm($data));
        }
        catch(Throwable $e)
        {
            report($e);
            return back()->withErrors(['email' => 'An internal server error occured, please try again later.']);
        }

        return redirect('/contact')->with('success', 'Message successfully sent');
    }

    
}
