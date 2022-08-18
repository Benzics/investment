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

    public function approve(int $id)
    {
        $withdrawal = $this->service->get_withdrawal($id);

        if(!$withdrawal)
        {
            return back()->with(['error' => 'Invalid withdrawal ID.']);
        }

        $this->service->approve($id);

        return redirect('/admin/withdrawals')->with('success', 'Withdrawal successfully marked as paid.');
    }

    public function decline(int $id)
    {
        $withdrawal = $this->service->get_withdrawal($id);

        if(!$withdrawal)
        {
            return back()->with(['error' => 'Invalid withdrawal ID.']);
        }

        $this->service->decline($id);

        return redirect('/admin/withdrawals')->with('success', 'Withdrawal successfully declined.');
    }
}
