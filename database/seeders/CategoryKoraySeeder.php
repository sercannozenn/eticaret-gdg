<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use RoachPHP\Roach;

class CategoryKoraySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roach::startSpider(\App\Spiders\KoraySporSpider::class);
    }
}
