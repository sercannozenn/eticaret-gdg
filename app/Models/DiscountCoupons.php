<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountCoupons extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'discount_id',
        'usage_limit',
        'used_count',
        'expiry_date',
    ];
}
