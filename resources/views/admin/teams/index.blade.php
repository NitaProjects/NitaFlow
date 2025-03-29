<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Equipos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-white">Lista de Equipos</h3>
                    <a href="{{ route('admin.teams.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                        Crear Nuevo Equipo
                    </a>
                </div>

                @if ($teams->isEmpty())
                    <p class="text-white text-center py-4">No hay equipos disponibles.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full border border-gray-700 text-white text-left">
                            <thead>
                                <tr class="bg-gray-700">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">Nombre</th>
                                    <th class="border px-4 py-2">Descripción</th>
                                    <th class="border px-4 py-2 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr class="border hover:bg-gray-600 transition">
                                        <td class="border px-4 py-2">{{ $team->id }}</td>
                                        <td class="border px-4 py-2">{{ $team->name }}</td>
                                        <td class="border px-4 py-2">{{ $team->description }}</td>
                                        <td class="border px-4 py-2 flex justify-center space-x-2">
                                            <a href="{{ route('admin.teams.edit', $team->id) }}" 
                                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                                Editar
                                            </a>
                                            <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" 
                                                onsubmit="return confirm('¿Seguro que quieres eliminar este equipo?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
