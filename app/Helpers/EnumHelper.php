<?php

namespace App\Helpers;

use App\Enums\Gender;

class EnumHelper
{
    public static function getGenders(Gender $gender): string
    {
        $configTexts = config('genders');

        return $configTexts[$gender->value] ?? 'Bulunamadı';
    }
}
