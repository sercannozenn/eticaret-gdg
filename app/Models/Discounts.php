<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Discounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'value',
        'start_date',
        'end_date',
        'minimum_spend',
        'status',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'discount_products', 'discount_id', 'product_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'discount_categories');
    }
    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'discount_brands');
    }
}
