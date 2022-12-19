<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'charges',
        'payment_id',
        'user_id',
        'address',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
