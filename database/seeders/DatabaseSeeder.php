<?php

namespace Database\Seeders;

use Database\Seeders\Category\CategorySeeder;
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
            GeneralRolePermissionSeeder::class,
            UserInitializeUserSeeder::class
                    ]);
    }
}
