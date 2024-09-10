<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CardItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'product_id',
        'size_id',
        'quantity',
        'price',
        'discounted_price'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function sizeStock():BelongsTo
    {
        return $this->belongsTo(SizeStock::class, 'size_id', 'id');
    }
}
