<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function variantImages(): HasMany
    {
        return $this->hasMany(ProductImages::class);
    }

    public function sizeStock(): HasMany
    {
        return $this->hasMany(SizeStock::class);
    }
}
