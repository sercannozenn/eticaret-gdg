<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discounts extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->belongsToMany(Product::class, 'discount_products', 'discount_id', 'product_id')
            ->withPivot('deleted_at');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'discount_categories', 'discount_id', 'category_id')
            ->withPivot('deleted_at');
    }
    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'discount_brands', 'discount_id', 'brand_id')
            ->withPivot('deleted_at');
    }
}
