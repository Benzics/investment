<?php
namespace App\Services;

use App\Models\UserInvestment;
use App\Models\Deposit;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Testimony;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService {

    /**
     * Get the user balance
     * @param $user_id
     * @return
     */
    public function get_balance(int $user_id)
    {
        $wallet = Wallet::where('user_id', $user_id)->latest('id')->first();

        $balance = ($wallet) ? $wallet->balance : 0;

        return $balance;
    }

    /**
     * Get the total deposits of a user
     * @param $user_id
     * @return
     */
    public function get_total_deposits(int $user_id)
    {
        $deposits = Deposit::where(['user_id' => $user_id, 'status' => '1'])->sum('amount');

        return $deposits;
    }

    /**
     * Get user total withdrawals
     * @param $user_id
     * @return
     */
    public function get_total_withdrawals(int $user_id)
    {
        $withdrawals = Withdrawal::where('user_id', $user_id)->sum('amount');
        
        return $withdrawals;
    }

    public function getLastWithdrawal(int $user_id)
    {
        $withdrawals = Withdrawal::where('user_id', $user_id)->orderBy('id', 'DESC')->first();
        $lastWithdrawal = ($withdrawals) ? $withdrawals->amount : 0;
        return $lastWithdrawal;
    }

    /**
     * Get the total investments of a user
     * @param $user_id
     * @return
     */
    public function get_total_investments(int $user_id)
    {
        $investments = UserInvestment::where('user_id', $user_id)->sum('amount');

        return $investments;
    }

    /**
     * Get the number of referrals a user has
     * @param $user_id
     * @return
     */
    public function get_referrals(int $user_id)
    {
        $user_ref = Profile::where('referrer', $user_id)->count();

        return $user_ref;
    }

    /**
     * Get the total investment profit
     * @param $user_id
     * @return
     */
    public function get_total_investment_profit(int $user_id)
    {
        $profit = Wallet::where(['user_id' => $user_id, 'type' => '5'])->sum('credit');
        
        return $profit;
    }

    /**
     * Get latest investments from a user
     * @param $user_id
     * @param? $limit
     * @return
     */
    public function get_latest_investments(int $user_id, int $limit = 5)
    {
        $investments = DB::table('user_investments')
            ->where('user_id', $user_id)
            ->join('investments', 'user_investments.investment_id', '=', 'investments.id')
            ->select('user_investments.*', 'investments.name')
            ->latest()
            ->limit($limit)
            ->get();
        
        return $investments;
    }

    /**
     * Get all investments from a user
     * @param $user_id
     * @return
     */
    public function get_user_investments(int $user_id, int $limit = 15)
    {
        $investments = DB::table('user_investments')
            ->where('user_id', $user_id)
            ->join('investments', 'user_investments.investment_id', '=', 'investments.id')
            ->select('user_investments.*', 'investments.name')
            ->latest()
            ->paginate($limit);
        
        return $investments;
    }

     /**
     * Get all investments from a user
     * @param $user_id
     * @return
     */
    public function get_user_deposits(int $user_id, int $limit = 15)
    {
        $deposits = DB::table('deposits')
            ->where('user_id', $user_id)
            ->join('payments', 'deposits.payment_id', '=', 'payments.id')
            ->select('deposits.*', 'payments.name')
            ->latest()
            ->paginate($limit);
        
        return $deposits;
    }

    /**
     * Returns the user profile
     * @param $user_id
     */
    public function get_profile(int $user_id)
    {
        $user = User::findOrFail($user_id)->profile;

        return $user;
    }

     /**
     * Retrieve a setting from the settings database
     * @param $setting the setting name you want to retrieve
     * @return
     */
    public function get_setting(string $setting)
    {
        $get_setting = Setting::where('name', $setting)->first();

        return $get_setting?->value;
    }

    /**
     * Debits a user
     * @param $user_id
     * @param $amount
     * @param $type
     * @param? $description
     */
    public function debit_user(int $user_id, float $amount, int $type, string $description = '')
    {
        $balance = $this->get_balance($user_id);
        
        $debit = Wallet::create([
            'user_id' => $user_id,
            'debit' => $amount,
            'description' => $description,
            'balance' => $balance - $amount,
            'type' => $type,
            ]);
        
        return $debit;
    }

    /**
     * credits a user
     * @param $user_id
     * @param $amount
     * @param $type
     * @param? $description
     */
    public function credit_user(int $user_id, float $amount, int $type, string $description = '')
    {
        $balance = $this->get_balance($user_id);
        
        $credit = Wallet::create([
            'user_id' => $user_id,
            'credit' => $amount,
            'description' => $description,
            'balance' => $balance + $amount,
            'type' => $type,
            ]);
        
        return $credit;
    }

    /**
     * credits user for referral
     * @param $user_id
     * @param $referral_id
     */
    public function reward_referral(int $user_id, int $referral_id)
    {
        $referral_bonus = setting('referral-bonus');

        if(!$referral_bonus)
        {
            return;
        }

        $user = $this->get_user($user_id);

        $description = currency_symbol() . num_format($referral_bonus) . ' referral bonus from ' . $user?->email;

        $this->credit_user($referral_id, $referral_bonus, 2, $description);
    }

    /**
     * Get a user
     * @param $user_id
     */
    public function get_user(int $user_id)
    {
        $user = User::find($user_id);

        return $user;
    }

    /**
     * Create a user
     * @param $data
     */
    public function create_user(array $data)
    {
        $user = User::create($data);

        return $user;
    }

    /**
     * Create a user profile
     * @param $data
     */
    public function create_profile(array $data)
    {
        $profile = Profile::create($data);

        return $profile;
    }

    /**
     * Get users referral list
     * @param $user_id
     * @return
     */
    public function get_referral_list(int $user_id, int $limit = 15)
    {
        $users = DB::table('profiles')
        ->where('referrer', $user_id)
        ->join('users', 'profiles.user_id', '=', 'users.id')
        ->select(['profiles.*', 'users.name', 'users.email', 'users.email_verified_at'])
        ->latest()
        ->paginate($limit);

        return $users;
    }

    /**
     * creates a new testimony
     * @param $testimony
     * @param $user_id
     */
    public function write_testimony(string $testimony, int $user_id)
    {
        $testimony = Testimony::create(['testimony' => $testimony, 'user_id' => $user_id]);

        return $testimony;
    }

    /**
     * Update user profile
     * @param $data
     * @param $user_id
     */
    public function update_profile(array $data, int $user_id)
    {
        $profile = Profile::where('user_id', $user_id)->update($data);

        return $profile;
    }

    /**
     * Update user data
     * @param $data
     * @param $user_id
     */
    public function update_user(array $data, int $user_id)
    {
        $user = User::where('id', $user_id)->update($data);

        return $user;
    }

    /**
     * Save uploaded user photo to database
     * @param $photo
     * @param $user_id
     * @return
     */
    public function save_profile_photo(string $photo, int $user_id)
    {
        $photo = Profile::where('user_id', $user_id)->update(['photo' => $photo]);

        return $photo;
    }

    /**
     * Changes a user password
     * @param string $old_password
     * @param string $new_password
     * @param int $user_id
     * @return mixed
     */
    public function change_user_pass(string $old_password, string $new_password, int $user_id) : mixed
    {
        $user = $this->get_user($user_id);

        if(!Hash::check($old_password, $user->password))
        {
            return false;
        }

        $new_pass = $this->update_user(['password' => Hash::make($new_password)], $user_id);

        return $new_pass;
    }

    /**
     * Get all users in db
     * @return
     */
    public function get_users()
    {
        $users = User::latest()
        ->get();

        return $users;
    }

    /**
     * Deletes a user and his profile
     * @param int $user_id
     * @return
     */
    public function delete_user(int $user_id)
    {
        User::where('id', $user_id)->delete();
        Profile::where('user_id', $user_id)->delete();

        return $this;
    }

    /**
     * Get the total users in the site
     * @return int
     */
    public function get_users_count()
    {
        $users = User::count();

        return $users;
    }

    /**
     * Get the total number of active user investments
     * @return int
     */
    public function get_investments_count()
    {
        $investments = UserInvestment::where('status', 1)->count();

        return $investments;
    }

    /**
     * Get total number of pending withdrawals
     * @return int
     */
    public function get_withdrawals_count()
    {
        $withdrawals = Withdrawal::where('status', '0')->count();

        return $withdrawals;
    }

    /**
     * Get total number of unprocessed deposits
     * @return int
     */
    public function get_deposits_count()
    {
        $deposits = Deposit::where('status', '0')->count();

        return $deposits;
    }

    /**
     * Gets all transactions
     * @return
     */
    public function get_transactions()
    {
        $transactions = Wallet::latest('id')->get();

        return $transactions;
    }

    /**
     * Get total deposit amount
     * @return
     */
    public function total_deposits()
    {
        $deposits = Deposit::where('status', '1')->sum('amount');

        return $deposits;
    }

    /**
     * Get total investment amount
     * @return
     */
    public function total_investments()
    {
        $investments = UserInvestment::sum('amount');

        return $investments;
    }
}
