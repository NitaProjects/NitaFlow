<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white">Editar Tarea</h3>

                <form action="{{ route('user.tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-white">Título</label>
                        <input type="text" name="title" value="{{ $task->title }}" required 
                            class="w-full p-2 rounded bg-gray-700 text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Descripción</label>
                        <textarea name="description" required 
                            class="w-full p-2 rounded bg-gray-700 text-white">{{ $task->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-white">Estado</label>
                        <select name="status" required class="w-full p-2 rounded bg-gray-700 text-white">
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>En Progreso</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completada</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Tarea</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
