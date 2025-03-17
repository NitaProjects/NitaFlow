<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            ['name' => 'Desarrollo', 'description' => 'Equipo de desarrollo de software'],
            ['name' => 'Marketing', 'description' => 'Equipo de marketing y publicidad'],
            ['name' => 'Recursos Humanos', 'description' => 'Gestión del talento humano'],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }

        // Asignar usuarios aleatorios a equipos
        $users = User::all();
        foreach ($users as $user) {
            $user->teams()->attach(rand(1, count($teams)));
        }
    }
}
