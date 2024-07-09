<?php

if (!function_exists('getGender')){
    function getGender(\App\Enums\Gender $gender):string
    {
        $configTexts = config('genders');

        return $configTexts[$gender->value] ?? 'Bulunamadı';
    }
}

if (!function_exists('getDiscountType')){
    function getDiscountType(\App\Enums\DiscountType $discountType):string
    {
        $configTexts = config('discount_types');

        return $configTexts[$discountType->value] ?? 'Bulunamadı';
    }
}

if (!function_exists('pathEditor')){
    function pathEditor(string $path): string
    {
        $path = str_replace('storage', '', $path);

        return "public" . $path;

    }
}
