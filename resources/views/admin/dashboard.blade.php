<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Bienvenido Admin</h3>
                <p class="text-white">Desde aquí puedes gestionar usuarios, tareas y equipos.</p>

                <div class="mt-4">
                    <a href="{{ route('admin.users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Gestionar Usuarios</a>
                    <a href="{{ route('admin.teams.index') }}" class="bg-green-500 text-white px-4 py-2 rounded">Gestionar Equipos</a>
                    <a href="{{ route('admin.tasks.index') }}" class="bg-purple-500 text-white px-4 py-2 rounded">Gestionar Tareas</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
