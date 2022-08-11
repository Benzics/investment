<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'commission',
        'commission_type',
        'minimum',
        'maximum',
        'type',
        'times',
        'status',
    ];
}
