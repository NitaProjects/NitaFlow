<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Lista de Mis Tareas</h3>

                <a href="{{ route('user.tasks.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Añadir Tarea</a>

                @if ($tasks->isEmpty())
                    <p class="text-gray-400">No tienes tareas asignadas.</p>
                @else
                    <table class="w-full mt-4 border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="p-2 border">ID</th>
                                <th class="p-2 border">Título</th>
                                <th class="p-2 border">Descripción</th>
                                <th class="p-2 border">Estado</th>
                                <th class="p-2 border">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr class="text-center border">
                                    <td class="p-2 border">{{ $task->id }}</td>
                                    <td class="p-2 border">{{ $task->title }}</td>
                                    <td class="p-2 border">{{ $task->description }}</td>
                                    <td class="p-2 border">{{ $task->status }}</td>
                                    <td class="p-2 border">
                                        <a href="{{ route('user.tasks.edit', $task->id) }}" class="bg-blue-500 text-white px-4 py-1 rounded">Editar</a>
                                        <form action="{{ route('user.tasks.destroy', $task->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar esta tarea?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
