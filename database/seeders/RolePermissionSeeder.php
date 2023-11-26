<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissions = PermissionEnum::getAllPermissions();

        Permission::upsert(
            array_map(fn ($permission) => [
                'name' => $permission,
                'guard_name' => 'web',
            ], $permissions),
            ['name', 'guard_name'],
            []
        );
        // reset cached values
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $role = Role::findOrCreate(RoleEnum::admin);
        $role->syncPermissions(
            PermissionEnum::adminDashboard,

        );

        $user = User::whereEmail('admin@gmail.com')->first();
        $user?->assignRole(RoleEnum::admin);

    }
}
