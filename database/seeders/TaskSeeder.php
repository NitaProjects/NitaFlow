<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;
use App\Models\Team;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['pending', 'in_progress', 'completed'];
        $users = User::all();
        $teams = Team::all();

        for ($i = 1; $i <= 10; $i++) {
            Task::create([
                'title' => "Tarea $i",
                'description' => "Descripción de la tarea $i",
                'status' => $statuses[array_rand($statuses)],
                'due_date' => Carbon::now()->addDays(rand(1, 30)),
                'assigned_to' => $users->random()->id ?? null,
                'team_id' => $teams->random()->id ?? null,
            ]);
        }
    }
}
