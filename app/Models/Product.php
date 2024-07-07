<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable = [
      'main_product_id',
      'name',
      'variant_name',
      'slug',
      'additional_price',
      'final_price',
      'extra_description',
      'status',
      'publish_date'
    ];
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function variantImages(): HasMany
    {
        return $this->hasMany(ProductImages::class);
    }

    public function featuredImage(): HasOne
    {
        return $this->hasOne(ProductImages::class)->where('is_featured', 1);
    }

    public function sizeStock(): HasMany
    {
        return $this->hasMany(SizeStock::class);
    }

    public function activeProductsMain(): BelongsTo
    {
        return $this->belongsTo(ProductsMain::class, 'main_product_id', 'id')->where('status', 1);
    }

    public function productsMain(): BelongsTo
    {
        return $this->belongsTo(ProductsMain::class, 'main_product_id', 'id');
    }

    public function scopeWithRelations($query)
    {
        return $query->with(['productsMain', 'productsMain.category', 'productsMain.brand', 'variantImages']);
    }

    protected static function booted()
    {
//        static::addGlobalScope('activeProductsMain', function (Builder $builder){
//            $builder->with(['productsMain', 'productsMain.category', 'productsMain.brand', 'variantImages']);
//        });
    }
}
