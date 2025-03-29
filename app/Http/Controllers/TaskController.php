<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Vista para usuarios (sus propias tareas)
    public function index()
    {
        $tasks = Task::where('assigned_to', Auth::id())->get();
        return view('user.tasks.index', compact('tasks'));
    }

    // Vista para admin (todas las tareas)
    public function adminIndex()
    {
        $tasks = Task::all();
        return view('admin.tasks.index', compact('tasks'));
    }

    // Creación de tareas (solo admin)
    public function create()
    {
        $users = User::all(); // Obtener todos los usuarios
        $teams = Team::all(); // Obtener todos los equipos
        return view('admin.tasks.create', compact('users', 'teams'));
    }

    public function edit(Task $task)
    {
        // Obtener todos los usuarios para la asignación de tareas
        $users = User::all();

        return view('admin.tasks.edit', compact('task', 'users'));
    }


    public function update(Request $request, Task $task)
    {
        // Validar los datos de entrada
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to' => 'required|exists:users,id',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // Asegurar que la tarea tenga un team_id asignado
        if (!$task->team_id) {
            $user = User::find($request->assigned_to);
            $team = $user ? $user->teams()->first() : null;

            if (!$team) {
                return redirect()->back()->with('error', 'El usuario asignado no pertenece a ningún equipo.');
            }

            $task->team_id = $team->id;
        }

        // Actualizar la tarea
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
            'status' => $request->status, // Agregamos status
            'team_id' => $task->team_id, // Aseguramos que tenga un equipo
        ]);

        return redirect()->route('admin.tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }




    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'assigned_to' => 'required|exists:users,id',
            'team_id' => 'required|exists:teams,id' // Agregamos la validación de equipo
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
            'team_id' => $request->team_id, // Asegurar que el equipo se guarde
            'status' => 'pending', // Establecer estado inicial
        ]);

        return redirect()->route('admin.tasks.index')->with('success', 'Tarea creada correctamente.');
    }


    // Vista de creación de tareas para usuarios
    public function createUserTask()
    {
        return view('user.tasks.create');
    }

    // Guardar tarea creada por un usuario
    public function storeUserTask(Request $request)
    {
        // Validar los datos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Obtener el team_id del usuario autenticado
        $user = Auth::user();
        $team = $user->teams()->first(); // Asigna el primer equipo del usuario

        if (!$team) {
            return redirect()->back()->with('error', 'No perteneces a ningún equipo.');
        }

        // Crear la tarea asociada al usuario y su equipo
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $user->id,
            'team_id' => $team->id,
            'status' => 'pending',
        ]);

        return redirect()->route('user.tasks.index')->with('success', 'Tarea creada correctamente.');
    }

    // Editar tarea de usuario
    public function editUserTask(Task $task)
    {
        if ($task->assigned_to !== Auth::id()) {
            return redirect()->route('user.tasks.index')->with('error', 'No tienes permiso para editar esta tarea.');
        }

        return view('user.tasks.edit', compact('task'));
    }

    public function userIndex()
    {
        $tasks = Task::where('assigned_to', Auth::id())->get();
        return view('user.tasks.index', compact('tasks'));
    }


    // Actualizar tarea de usuario
    public function updateUserTask(Request $request, Task $task)
    {
        if ($task->assigned_to !== Auth::id()) {
            return redirect()->route('user.tasks.index')->with('error', 'No tienes permiso para editar esta tarea.');
        }

        // Validar los datos
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed', // Validar estado permitido
        ]);

        // Actualizar la tarea
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('user.tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    // Eliminar tarea de usuario
    public function destroyUserTask(Task $task)
    {
        if ($task->assigned_to !== Auth::id()) {
            return redirect()->route('user.tasks.index')->with('error', 'No tienes permiso para eliminar esta tarea.');
        }

        $task->delete();
        return redirect()->route('user.tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
