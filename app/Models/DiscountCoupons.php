<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCoupons extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_id',
        'usage_limit',
        'used_count',
        'expiry_date',
    ];
}
