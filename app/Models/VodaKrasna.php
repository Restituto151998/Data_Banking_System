<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VodaKrasna extends Model
{
    protected $guarded = [];

    use HasFactory;
    protected $fillable = [
        'full_name',
        'gender',
        'address',
        'phone_number',
        'nationality',
        'temperature',
        'time_use',
        'purpose',
    ];
}
