<?php
namespace App\Services;

use App\Models\Investment;
use App\Models\UserInvestment;

class UserInvestmentService
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

}