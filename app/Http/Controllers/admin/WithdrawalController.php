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
use App\Services\WithdrawalService;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public $service;

    public function __construct(WithdrawalService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $page_title = $title = 'Withdrawals';
        $withdrawals = $this->service->get_withdrawals();

        return view('admin.withdrawals', compact('page_title', 'title', 'withdrawals'));
    }
}
