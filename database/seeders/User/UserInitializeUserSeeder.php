<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserInitializeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('Abc12345*'),
            'email_verified_at' => now()
                     ]);
        $superAdmin->assignRole('super-admin');

        $categoryManager = User::create([
                                            'name' => 'Category Manager',
                                            'email' => 'category@gmail.com',
                                            'password' => bcrypt('Abc12345*'),
                                            'email_verified_at' => now()
                                        ]);
        $categoryManager->assignRole('category-manager');

        $orderManager = User::create([
                                         'name' => 'Order Manager',
                                         'email' => 'order@gmail.com',
                                         'password' => bcrypt('Abc12345*'),
                                         'email_verified_at' => now()
                                     ]);
        $orderManager->assignRole('order-manager');

        $userManager = User::create([
                                         'name' => 'User Manager',
                                         'email' => 'user@gmail.com',
                                         'password' => bcrypt('Abc12345*'),
                                         'email_verified_at' => now()
                                     ]);
        $userManager->assignRole('user-manager');

        $productManager = User::create([
                                        'name' => 'Product Manager',
                                        'email' => 'product@gmail.com',
                                        'password' => bcrypt('Abc12345*'),
                                        'email_verified_at' => now()
                                    ]);
        $productManager->assignRole('product-manager');


    }
}
