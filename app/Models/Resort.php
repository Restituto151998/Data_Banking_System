<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guest;

class Resort extends Model
{
    protected $guarded = [];

    use HasFactory;
    protected $fillable = [
        'resort_name',
        'imagePath',
        'resort_description',
    ];

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
   
}
