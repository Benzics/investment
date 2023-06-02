<?php
/**
 * 
 * Investment script by Benzics
 * Author: Benjamin Ojobo
 * https://github.com/benzics
 * 
 */
namespace App\Http\Controllers\admin;

use App\Events\WithdrawalApproved;
use App\Http\Controllers\Controller;
use App\Services\WithdrawalService;
use App\Services\UserService;
use Throwable;

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

        try
        {
            event(new WithdrawalApproved($withdrawal));
        }
        catch (Throwable $e)
        {
            report($e);
        }

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

         // when we decline a withdrawal, we refund the user
         $userService = new UserService();
         $userService->credit_user($withdrawal->user_id, $withdrawal->amount, 9, 'Refund for rejected withdrawal');

        return redirect('/admin/withdrawals')->with('success', 'Withdrawal successfully declined.');
    }
}
