<?php
/**
 * Our custom registration service
 */
namespace App\Services;

use Illuminate\Support\Facades\DB;

class RegistrationService {

    /**
     * Generate a referal id for a user
     * @param $user_id 
     * @param $prefix
     * @return string
     */
    public function newRefId(int $user_id, string $prefix) : string
    {
        return $prefix . '-' . mt_rand(10000, 99999) . $user_id;
    }

    /**
     * Get a user associated with a referral id
     * @param $ref_id
     */
    public function getRefUser(string $ref_id) : int 
    {
        $user = DB::table('profiles')->where('ref_id', $ref_id)->first();

        if (!$user)
        {
            return 0;
        }

        return $user->user_id;
    }
}