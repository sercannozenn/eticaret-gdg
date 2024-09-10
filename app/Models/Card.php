<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(CardItem::class);
    }
}
