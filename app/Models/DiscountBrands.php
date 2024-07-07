<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountBrands extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount_id',
        'brand_id',
    ];
}
