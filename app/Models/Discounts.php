<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
