<?php

namespace Database\Seeders\RolePermissions;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GeneralRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();

        $permissions = [
            //personal
            [
                'name'        => 'personal.profile.view',
                'description' => 'Kullanıcı bu izne sahipse profilini görüntüleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'personal.profile.edit',
                'description' => 'Kullanıcı bu izne sahipse profilini düzenleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'personal.password.change',
                'description' => 'Kullanıcı bu izne sahipse parolasını düzenleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            // Order
            [
                'name'        => 'order.view',
                'description' => 'Kullanıcı bu izne sahipse siparişleri görüntüleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'order.cancel',
                'description' => 'Kullanıcı bu izne sahipse siparişleri iptal edebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'order.change-address',
                'description' => 'Kullanıcı bu izne sahipse siparişlerin adresini değiştirebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            //user
            [
                'name'        => 'user.view',
                'description' => 'Kullanıcı bu izne sahipse kullanıcıları görüntüleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'user.create',
                'description' => 'Kullanıcı bu izne sahipse kullanıcı oluşturabilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'user.edit',
                'description' => 'Kullanıcı bu izne sahipse kullanıcıları düzenleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'user.delete',
                'description' => 'Kullanıcı bu izne sahipse kullanıcıları silebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            //category
            [
                'name'        => 'category.view',
                'description' => 'Kullanıcı bu izne sahipse kategori görüntüleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'category.create',
                'description' => 'Kullanıcı bu izne sahipse kategori oluşturabilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'category.edit',
                'description' => 'Kullanıcı bu izne sahipse kategori düzenleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'category.delete',
                'description' => 'Kullanıcı bu izne sahipse kategori silebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            //product
            [
                'name'        => 'product.view',
                'description' => 'Kullanıcı bu izne sahipse ürün görüntüleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'product.create',
                'description' => 'Kullanıcı bu izne sahipse ürün oluşturabilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'product.edit',
                'description' => 'Kullanıcı bu izne sahipse ürün düzenleyebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'name'        => 'product.delete',
                'description' => 'Kullanıcı bu izne sahipse ürün silebilir.',
                'guard_name'  => 'web',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ];


        //        DB::table('permissions')->insert($permissions);
        Permission::insert($permissions);

        $superAdmin = Role::create(['name' => 'super-admin']);
        $member = Role::create(['name' => 'member']);
        $categoryManager = Role::create(['name' => 'category-manager']);
        $orderManager = Role::create(['name' => 'order-manager']);
        $productManager = Role::create(['name' => 'product-manager']);
        $userManager = Role::create(['name' => 'user-manager']);

        $categoryManagerPermissions = Permission::query()
            ->where('name', 'LIKE', "category.%")
            ->orWhere('name', 'LIKE', "personal.%")
            ->get();

        $categoryManager->givePermissionTo($categoryManagerPermissions);

        $orderManagerPermissions = Permission::query()
                                                ->where('name', 'LIKE', "order.%")
                                                ->orWhere('name', 'LIKE', "personal.%")
                                                ->get();
        $orderManager->givePermissionTo($orderManagerPermissions);

        $userManagerPermissions = Permission::query()
                                             ->where('name', 'LIKE', "user.%")
                                             ->orWhere('name', 'LIKE', "personal.%")
                                             ->get();
        $userManager->givePermissionTo($userManagerPermissions);

        $productManagerPermissions = Permission::query()
                                            ->where('name', 'LIKE', "product.%")
                                            ->orWhere('name', 'LIKE', "personal.%")
                                            ->get();
        $productManager->givePermissionTo($productManagerPermissions);

        $personalManagerPermissions = Permission::query()
                                               ->orWhere('name', 'LIKE', "personal.%")
                                               ->get();
        $member->givePermissionTo($personalManagerPermissions);



        $allPermissions = Permission::all();
        $superAdmin->givePermissionTo($allPermissions);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
