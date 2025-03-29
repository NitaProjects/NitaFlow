<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Tareas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Lista de Tareas</h3>
                <table class="w-full border border-gray-700 text-white">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Título</th>
                            <th class="border px-4 py-2">Descripción</th>
                            <th class="border px-4 py-2">Asignado a</th>
                            <th class="border px-4 py-2">Equipo</th>
                            <th class="border px-4 py-2">Estado</th>
                            <th class="border px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="border">
                                <td class="border px-4 py-2">{{ $task->id }}</td>
                                <td class="border px-4 py-2">{{ $task->title }}</td>
                                <td class="border px-4 py-2">{{ $task->description }}</td>
                                <td class="border px-4 py-2">{{ $task->user->name }}</td>
                                <td class="border px-4 py-2">{{ $task->team->name }}</td>
                                <td class="border px-4 py-2">{{ $task->status }}</td>
                                <td class="border px-4 py-2 flex space-x-2">
                                    <a href="{{ route('admin.tasks.edit', $task->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Editar</a>
                                    <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta tarea?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('admin.tasks.create') }}" class="mt-4 bg-green-500 text-white px-4 py-2 rounded inline-block">Crear Nueva Tarea</a>
            </div>
        </div>
    </div>
</x-app-layout>
