<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountProducts extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps= false;
    protected $fillable = [
        'discount_id',
        'product_id',
    ];
}
