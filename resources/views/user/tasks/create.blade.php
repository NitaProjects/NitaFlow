<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Añadir Nueva Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white">Nueva Tarea</h3>

                <form action="{{ route('user.tasks.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-white">Título</label>
                        <input type="text" name="title" required class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Descripción</label>
                        <textarea name="description" required class="w-full p-2 rounded bg-gray-700 text-white"></textarea>
                    </div>

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Crear Tarea</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
