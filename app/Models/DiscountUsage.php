<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountUsage extends Model
{
    use HasFactory;

    protected $table = 'discount_usage';

    protected $fillable = [
        'discount_id',
        'user_id',
        'order_id',
    ];
}
