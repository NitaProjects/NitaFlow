<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Ejecutar PermissionSeeder antes de crear usuarios
        $this->call([
            PermissionSeeder::class, // Asegurar permisos y roles primero
            UserSeeder::class,       // Crear usuarios antes de asignar tareas
            TeamSeeder::class,       // Crear equipos antes de asignar usuarios
            TaskSeeder::class,       // Crear tareas después de que haya usuarios y equipos
        ]);
        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $guestRole = Role::firstOrCreate(['name' => 'guest']); // Se añade el rol guest

        // Crear un usuario admin de prueba
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Asignar el rol de admin al usuario creado
        $admin->assignRole($adminRole);
    }
}
