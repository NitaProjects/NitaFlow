<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Vista para usuarios (sus propios equipos)
    public function index()
    {
        $teams = auth()->user()->teams;
        return view('user.teams.index', compact('teams'));
    }

    // Vista para admin (todos los equipos)
    public function adminIndex()
{
    $teams = Team::all(); 
    return view('admin.teams.index', compact('teams'));
}


    public function userIndex()
    {
        $teams = auth()->user()->teams; // Relación entre usuario y equipos
        return view('user.teams.index', compact('teams'));
    }

    // Creación de equipos (solo admin)
    public function create()
    {
        $users = User::all(); // Obtener todos los usuarios disponibles para asignar
        return view('admin.teams.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id' // Asignar un usuario al equipo
        ]);

        $team = Team::create([
            'name' => $request->name,
        ]);

        // Asignar el usuario al equipo
        $team->users()->attach($request->user_id);

        return redirect()->route('admin.teams.index')->with('success', 'Equipo creado correctamente.');
    }

    // Editar equipo (solo admin)
    public function edit(Team $team)
    {
        $users = User::all();
        return view('admin.teams.edit', compact('team', 'users'));
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id' // Puede o no cambiar el usuario asignado
        ]);

        $team->update(['name' => $request->name]);

        // Si hay un usuario seleccionado, actualizar la relación
        if ($request->user_id) {
            $team->users()->sync([$request->user_id]);
        }

        return redirect()->route('admin.teams.index')->with('success', 'Equipo actualizado correctamente.');
    }

    // Eliminar equipo (solo admin)
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('admin.teams.index')->with('success', 'Equipo eliminado correctamente.');
    }

    // Ver detalles de un equipo
    public function show(Team $team)
    {
        return view('admin.teams.show', compact('team'));
    }
}
