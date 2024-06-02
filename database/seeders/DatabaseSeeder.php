<?php

namespace Database\Seeders;

use Database\Seeders\Brand\BrandSeeder;
use Database\Seeders\Category\CategorySeeder;
use Database\Seeders\Products\ProductTypesSeeder;
use Database\Seeders\RolePermissions\GeneralRolePermissionSeeder;
use Database\Seeders\User\UserInitializeUserSeeder;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
                        ProductTypesSeeder::class,
                        BrandSeeder::class,
                        CategorySeeder::class,
                        GeneralRolePermissionSeeder::class,
                        UserInitializeUserSeeder::class
                    ]);
    }
}
