<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    {{-- Contenido específico para administradores --}}
                    @can('manage users')
                        <div class="mt-6 p-6 bg-gray-700 text-white rounded-lg">
                            <h3 class="text-lg font-bold">Panel de Administrador</h3>
                            <p>Bienvenido Admin, aquí puedes gestionar usuarios y configuraciones.</p>
                            <a href="{{ route('admin.users.index') }}" class="text-blue-400 underline">Gestionar Usuarios</a>
                        </div>
                    @endcan

                    {{-- Contenido específico para usuarios normales --}}
                    @if(Auth::user()->hasRole('user'))
                        <div class="mt-6 p-6 bg-gray-600 text-white rounded-lg">
                            <h3 class="text-lg font-bold">Panel de Usuario</h3>
                            <p>Bienvenido a tu panel, aquí puedes ver tus tareas y proyectos.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
