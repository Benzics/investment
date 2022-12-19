<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvestment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'investment_id',
        'amount',
        'last_payout',
        'next_payout',
        'payout_times',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
