<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// 🏠 Ruta de bienvenida para cualquier usuario (página inicial)
Route::get('/', function () {
    return view('welcome');
});

// 🎭 Ruta para invitados (guest), pueden ver una página pero sin acceso al contenido protegido
Route::get('/guest', function () {
    return view('guest.welcome');
})->name('guest.view');

// 📌 Redirige al dashboard según el rol después del login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 👤 Rutas de perfil del usuario autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹
// 🔹             RUTAS PARA ADMINISTRADORES (admin)         🔹
// 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹

Route::middleware(['auth', 'role:admin'])->group(function () {

    // 👥 Gestión de Usuarios por admin
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

    // 🏢 Gestión de Equipos por admin
    Route::get('/admin/teams', [TeamController::class, 'adminIndex'])->name('admin.teams.index'); 
    Route::get('/admin/teams/create', [TeamController::class, 'create'])->name('admin.teams.create');
    Route::post('/admin/teams', [TeamController::class, 'store'])->name('admin.teams.store');
    Route::get('/admin/teams/{team}/edit', [TeamController::class, 'edit'])->name('admin.teams.edit');
    Route::put('/admin/teams/{team}', [TeamController::class, 'update'])->name('admin.teams.update');
    Route::delete('/admin/teams/{team}', [TeamController::class, 'destroy'])->name('admin.teams.destroy');

    // 📋 Gestión de Tareas por admin
    Route::get('/admin/tasks', [TaskController::class, 'adminIndex'])->name('admin.tasks.index'); 
    Route::get('/admin/tasks/create', [TaskController::class, 'create'])->name('admin.tasks.create');
    Route::post('/admin/tasks', [TaskController::class, 'store'])->name('admin.tasks.store');
    Route::get('/admin/tasks/{task}/edit', [TaskController::class, 'edit'])->name('admin.tasks.edit');
    Route::put('/admin/tasks/{task}', [TaskController::class, 'update'])->name('admin.tasks.update');
    Route::delete('/admin/tasks/{task}', [TaskController::class, 'destroy'])->name('admin.tasks.destroy');
});

// 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹
// 🔹             RUTAS PARA USUARIOS REGULARES (user)       🔹
// 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹 🔹

Route::middleware(['auth', 'role:user'])->group(function () {

    // 🏢 Equipos del usuario
    Route::get('/user/teams', [TeamController::class, 'userIndex'])->name('user.teams.index');

    // 📋 Tareas del usuario (solo propias)
    Route::get('/user/tasks', [TaskController::class, 'userIndex'])->name('user.tasks.index');
    Route::get('/user/tasks/create', [TaskController::class, 'createUserTask'])->name('user.tasks.create');
    Route::post('/user/tasks', [TaskController::class, 'storeUserTask'])->name('user.tasks.store');
    Route::get('/user/tasks/{task}/edit', [TaskController::class, 'editUserTask'])->name('user.tasks.edit');
    Route::put('/user/tasks/{task}', [TaskController::class, 'updateUserTask'])->name('user.tasks.update');
    Route::delete('/user/tasks/{task}', [TaskController::class, 'destroyUserTask'])->name('user.tasks.destroy');

});

// 🔑 Autenticación manejada por Laravel Breeze/Fortify
require __DIR__.'/auth.php';
