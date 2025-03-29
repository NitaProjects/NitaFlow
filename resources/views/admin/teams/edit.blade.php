<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Equipo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Modificar Equipo</h3>
                
                <form action="{{ route('admin.teams.update', $team->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-white">Nombre del Equipo</label>
                        <input type="text" name="name" value="{{ $team->name }}" required class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Descripción</label>
                        <textarea name="description" required class="w-full p-2 rounded bg-gray-700 text-white">{{ $team->description }}</textarea>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Equipo</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
