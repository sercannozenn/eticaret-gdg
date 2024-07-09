<?php

namespace App\Enums;

enum DiscountType: string
{
    case Percentage = 'percentage';
    case Amount = 'amount';
}
