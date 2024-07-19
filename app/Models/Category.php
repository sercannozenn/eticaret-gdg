<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'slug',
        'short_description',
        'description',
        'parent_id'
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('children');
    }

    public function subCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function subCategoriesActive(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->where('status', 1);
    }

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discounts::class, 'discount_categories', 'category_id', 'discount_id')
                    ->withPivot(['id', 'deleted_at']);
    }
}
