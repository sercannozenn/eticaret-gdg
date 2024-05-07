<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('children');
    }
}
