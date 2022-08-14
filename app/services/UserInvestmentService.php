<?php
namespace App\Services;

use App\Models\Investment;
use App\Models\UserInvestment;

class UserInvestmentService extends UserService
{
    /**
     * Creates a new user investment
     * @param $data
     * @return
     */
    public function create(array $data)
    {
        $investment = UserInvestment::create($data);

        return $investment;
    }

    /**
     * Returns the active investment plans
     * @return
     */
    public function get_active_plans()
    {
        $plans = Investment::where('status', '1')->get();

        return $plans;
    }

    /**
     * Use to render user readable plans to user in a blade
     * @param $plans
     * @return
     */
    public function get_user_readable_plans()
    {
        $plans = $this->get_active_plans();

        $investments = [];

        foreach($plans as $row)
        {
            // if commission type is 1 it means its a flat fee, otherwise it is a percentage
            $commission = ($row->commission_type == 1) ? currency_short() . ' ' . num_format($row->commission) : $row->commission . '%';
            
            $investments[] = (object) [
                'id' => $row->id,
                'name' => $row->name,
                'commission' => $commission,
                'times' => $row->times,
                'type' => $row->type,
                'minimum' => num_format($row->minimum),
                'maximum' => num_format($row->maximum),
            ];
        }

        return $investments;
    }

    /**
     * Get an investment
     * @param $investment_id
     * @return
     */
    public function get_investment($investment_id)
    {
        $investment = Investment::find($investment_id);

        return $investment;
    }

    /**
     * Get all user active investments
     * @param $user_id
     * @return
     */
    public function get_user_active_investments($user_id)
    {
        $user_investments = UserInvestment::where(['user_id' => $user_id, 'status' => '1'])->get();

        return $user_investments;
    }

    /**
     * Get a particular user investment
     * @param $investment_id
     * @return
     */
    public function get_user_investment($investment_id)
    {
        $user_investment = UserInvestment::find($investment_id);

        return $user_investment;
    }

    /**
     * Pays a user investment commissions if they are qualified to receive
     * @param $user_id
     * @param
     */
    public function pay_user_investment($user_id)
    {
        $active_investments = $this->get_user_active_investments($user_id);

        foreach($active_investments as $row)
        {
            $investment = $this->get_investment($row->investment_id);

            if($row->payout_times < $investment->times)
            {
                
            }
        }
        return false;
    }
}