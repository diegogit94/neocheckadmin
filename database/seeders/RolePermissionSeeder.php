<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'leader']);
        Role::create(['name' => 'engineer']);
        Role::create(['name' => 'commercial-agent']);

        Permission::create(['name' => 'users.index'])->syncRoles(['admin']);
        Permission::create(['name' => 'users.show'])->syncRoles(['admin']);
        Permission::create(['name' => 'users.create'])->syncRoles(['admin']);
        Permission::create(['name' => 'users.store'])->syncRoles(['admin']);
        Permission::create(['name' => 'users.edit'])->syncRoles(['admin']);
        Permission::create(['name' => 'users.update'])->syncRoles(['admin']);
        Permission::create(['name' => 'users.destroy'])->syncRoles(['admin']);
        Permission::create(['name' => 'users.search'])->syncRoles(['admin']);

        Permission::create(['name' => 'roles.index'])->syncRoles(['admin']);
        Permission::create(['name' => 'roles.show'])->syncRoles(['admin']);
        Permission::create(['name' => 'roles.create'])->syncRoles(['admin']);
        Permission::create(['name' => 'roles.edit'])->syncRoles(['admin']);
        Permission::create(['name' => 'roles.destroy'])->syncRoles(['admin']);

        $users = User::all();

        $roles = [
            'admin' => 'admin', 
            'leader' => 'leader', 
            'engineer' => 'engineer', 
            'commercial-agent' => 'commercial-agent'
        ];

        foreach ($users as $user) {
                $user->assignRole(array_rand($roles));
        }

        $admin = User::first();

        $admin->syncRoles(['admin']);
    }
}
