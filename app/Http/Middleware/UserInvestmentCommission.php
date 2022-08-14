<?php

namespace App\Http\Middleware;

use App\Services\UserInvestmentService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInvestmentCommission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $user_investment_service = new UserInvestmentService();
        $user = Auth::id();

        $user_investment_service->pay_user_investment($user);

        return $response;
    }
}
