<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
}
