<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountBrands extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'discount_id',
        'brand_id',
    ];

    public $timestamps= false;
}
