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
        $this->v = '';
    }
    public function index()
    {
        $title = 'Home';
        $investment_service = new UserInvestmentService;

        $investments = $investment_service->get_active_plans();

        return view('index' . $this->v, compact('title', 'investments'));
    }
}
