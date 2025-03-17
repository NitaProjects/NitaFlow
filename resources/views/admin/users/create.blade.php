<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Añadir Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white">Crear Nuevo Usuario</h3>

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-white">Nombre</label>
                        <input type="text" name="name" required autocomplete="off" class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Email</label>
                        <!-- Campo oculto para evitar autocompletar -->
                        <input type="email" name="fake-email" style="display: none;">
                        <input type="email" name="email" autocomplete="new-email" required class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Contraseña</label>
                        <!-- Campo oculto para evitar autocompletar -->
                        <input type="password" name="fake-password" style="display: none;">
                        <input type="password" name="password" autocomplete="new-password" required class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Rol</label>
                        <select name="role" autocomplete="off" required class="w-full p-2 rounded bg-gray-700 text-white">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Crear Usuario</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
