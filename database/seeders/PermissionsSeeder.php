<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);

        Permission::create(['name' => 'create teacher']);
        Permission::create(['name' => 'read teacher']);
        Permission::create(['name' => 'update teacher']);
        Permission::create(['name' => 'delete teacher']);

        Permission::create(['name' => 'blocked users']);

        Permission::create(['name' => 'send sms']);

        $admin->syncPermissions(Permission::all());

        // Super-admin

        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'super_admin']);

        $superadmin->syncPermissions(Permission::all());

        $user = User::query()->where('id', 1)->get()->first();
        $user->assignRole($superadmin);
        $user->save();
    }
}
