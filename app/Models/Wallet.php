<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'credit',
        'debit',
        'balance',
        'type',
        'description',
        'created_at'
    ];
}
