<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resort;

class Date extends Model
{
    use HasFactory;
    protected $fillable = [
        'resort_id',
        'from',
        'to',
    ];

    public function resort(){
        return $this->belongsTo(Resort::class);
    }
}
