<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeStock extends Model
{
    protected $table = 'size_stock';

    protected $fillable = [
        'product_id',
        'size',
        'stock',
        'remaining_stock'
    ];


}
