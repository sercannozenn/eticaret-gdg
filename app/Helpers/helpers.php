<?php

if (!function_exists('getGender')){
    function getGender(\App\Enums\Gender $gender):string
    {
        $configTexts = config('genders');

        return $configTexts[$gender->value] ?? 'Bulunamadı';
    }
}
