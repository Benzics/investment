<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'referrer',
        'ref_id',
        'gender',
        'phone',
        'address',
        'zip',
        'country',
        'photo',
        'additional',

    ];
}
