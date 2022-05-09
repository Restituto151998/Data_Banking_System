<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resort;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'resort_id',
        'title',
        'image_description',
        'image',
    ];

    public function resort(){
        return $this->belongsTo(Resort::class);
    }
}
