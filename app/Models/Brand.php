<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'logo',
        'is_featured',
        'order'
    ];

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discounts::class, 'discount_brands', 'brand_id', 'discount_id')
                    ->withPivot(['id', 'deleted_at']);
    }
}
