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

                    {{-- Panel de Administrador --}}
                    @role('admin')
                        <div class="mt-6 p-6 bg-gray-700 text-white rounded-lg">
                            <h3 class="text-lg font-bold">Panel de Administrador</h3>
                            <p>Bienvenido Admin, aquí puedes gestionar usuarios y configuraciones.</p>
                            <a href="{{ route('admin.users.index') }}" class="text-blue-400 underline">Gestionar Usuarios</a>
                            <br>
                            <a href="{{ route('admin.teams.index') }}" class="text-blue-400 underline">Gestionar Equipos</a>
                            <br>
                            <a href="{{ route('admin.tasks.index') }}" class="text-blue-400 underline">Gestionar Tareas</a>
                        </div>
                    @endrole

                    {{-- Panel de Usuario --}}
                    @role('user')
                        <div class="mt-6 p-6 bg-gray-600 text-white rounded-lg">
                            <h3 class="text-lg font-bold">Panel de Usuario</h3>
                            <p>Bienvenido a tu panel, aquí puedes ver tus tareas y proyectos.</p>
                            <a href="{{ route('user.tasks.index') }}" class="text-blue-400 underline">Mis Tareas</a>
                            <br>
                            <a href="{{ route('user.teams.index') }}" class="text-blue-400 underline">Mis Equipos</a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
