<?php

if (!function_exists('getGender')){
    function getGender(\App\Enums\Gender $gender):string
    {
        $configTexts = config('genders');

        return $configTexts[$gender->value] ?? 'Bulunamadı';
    }
}

if (!function_exists('pathEditor')){
    function pathEditor(string $path): string
    {
        $path = str_replace('storage', '', $path);

        return "public" . $path;

    }
}
