<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'image_url',  
        'price',
        'stock',
    ];

public function getImageUrlAttribute($value)
{
    if (!$value) {
        return null;
    }

    return asset($value);  
}

}


