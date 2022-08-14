<?php
namespace App\Services;

use App\Models\Investment;
use App\Models\UserInvestment;
use DateTime;
use Illuminate\Support\Facades\Log;

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
    public function get_investment(int $investment_id)
    {
        $investment = Investment::find($investment_id);

        return $investment;
    }

    /**
     * Get all user active investments
     * @param $user_id
     * @return
     */
    public function get_user_active_investments(int $user_id)
    {
        $user_investments = UserInvestment::where(['user_id' => $user_id, 'status' => '1'])->get();

        return $user_investments;
    }

    /**
     * Get a particular user investment
     * @param $investment_id
     * @return
     */
    public function get_user_investment(int $investment_id)
    {
        $user_investment = UserInvestment::find($investment_id);

        return $user_investment;
    }

    /**
     * Pays a user investment commissions if they are qualified to receive
     * @param $user_id
     * @param
     */
    public function pay_user_investment(int $user_id)
    {
        $active_investments = $this->get_user_active_investments($user_id);


        foreach($active_investments as $row)
        {
            $investment = $this->get_investment($row->investment_id);


            switch($investment?->type)
            {
                case 'Daily':
                    $this->daily_commission($user_id, $row->id);
                    break;
            }
 
        }

        return false;
    }

    /**
     * Gives daily commissions to a user
     * @param $user_id
     * @param $user_investment_id
     */
    function daily_commission(int $user_id, int $user_investment_id)
    {
        $user_investment = $this->get_user_investment($user_investment_id);
        $investment = $this->get_investment($user_investment->investment_id);


        if($user_investment->payout_times < $investment->times && !$user_investment->next_payout)
        {
            $date = new DateTime();
            $date2 = new DateTime($user_investment->last_payout);

            // day difference
            $interval = $date->diff($date2);
            $days = $interval->format('%a');

            if($days < 1)
            {
                return;
            }

            $commission = ($investment->commission_type == 0) ? ($investment->commission / 100) * $user_investment->amount : $investment->commission;

            $desc = currency_symbol() . $commission . ' daily commission for ' . currency_symbol() . $user_investment->amount . ' ' . $investment->name . ' plan';

            // determine the next payout date
            $next_payout = $date2->modify('+1 day');

            $this->credit_user($user_id, $commission, 5, $desc);

            $this->update_last_payout($user_investment->id, $date);
            $this->update_next_payout($user_investment->id, $next_payout);
            $this->add_payout_times($user_investment->id);

            // if this is the last payout, update investment as complete
            if(($user_investment->payout_times + 1) >= $investment->times)
            {
                $this->set_investment_status($user_investment->id, 2, $user_id);
            }

            $this->daily_commission($user_id, $user_investment->id);

           

            return;

        }

        if($user_investment->payout_times < $investment->times && $user_investment->next_payout)
        {
            $date = new DateTime();
            $date2 = new DateTime($user_investment->next_payout);

            // day difference
            $interval = $date->diff($date2);
            $days = $interval->format('%a');

            if($days < 1)
            {
                return;
            }

            $commission = ($investment->commission_type == 0) ? ($investment->commission / 100) * $user_investment->amount : $investment->commission;

            Log::info('commission: ' . $investment->commission . 'Type: ' . $investment->commission_type . ' User Investment: ' . $user_investment->amount
            . ' generated ' . $commission . 'commisiion id: ' . $investment->id . ' C$investment');
            $desc = currency_symbol() . $commission . ' daily commission for ' . currency_symbol() . $user_investment->amount . ' ' . $investment->name . ' plan';

            // determine the next payout date
            $next_payout = $date2->modify('+1 day');

            $this->credit_user($user_id, $commission, 5, $desc);

            $this->update_last_payout($user_investment->id, $date);
            $this->update_next_payout($user_investment->id, $next_payout);
            $this->add_payout_times($user_investment->id);
            
            // if this is the last payout, update investment as complete
            if(($user_investment->payout_times + 1) >= $investment->times)
            {
                $this->set_investment_status($user_investment->id, 2, $user_id);
            }

            $this->daily_commission($user_id, $user_investment->id);

        }
        
    }

    /**
     * Update last payout date
     * @param $investment_id
     * @param $date
     */
    public function update_last_payout(int $investment_id, DateTime $date)
    {
        UserInvestment::where('id', $investment_id)->update(['last_payout' => $date]);
    }

    /**
     * Update next payout date
     * @param $investment_id
     * @param $date
     */
    public function update_next_payout(int $investment_id, DateTime $date)
    {
        UserInvestment::where('id', $investment_id)->update(['next_payout' => $date]);
    }

    /**
     * Update last payout date
     * @param $investment_id
     * @param $date
     */
    public function add_payout_times(int $investment_id)
    {
        UserInvestment::where('id', $investment_id)->increment('payout_times');
    }

    /**
     * Set user investment status
     * @param $investment id
     * @param $status
     * @param $user_id
     */
    public function set_investment_status(int $investment_id, int $status, int $user_id)
    {
        $status = UserInvestment::where(['id' => $investment_id, 'user_id' => $user_id])
            ->update(['status' => $status]);
        
        return $status;
    }
}