<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definir permisos
        $permissions = [
            'manage users',      // Admin
            'manage teams',      // Admin
            'view tasks',        // User
            'create tasks',      // User
            'edit tasks',        // User/Admin
            'delete tasks',      // Admin
        ];

        // Crear permisos en la BD
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Asignar permisos a los roles
        $admin = Role::where('name', 'admin')->first();
        $user = Role::where('name', 'user')->first();

        if ($admin) {
            $admin->givePermissionTo([
                'manage users',
                'manage teams',
                'view tasks',
                'create tasks',
                'edit tasks',
                'delete tasks',
            ]);
        }

        if ($user) {
            $user->givePermissionTo([
                'view tasks',
                'create tasks',
                'edit tasks',
            ]);
        }
    }
}
