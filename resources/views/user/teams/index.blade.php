<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Equipos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Equipos a los que pertenezco</h3>

                @if ($teams->isEmpty())
                    <p class="text-gray-400">No perteneces a ningún equipo todavía.</p>
                @else
                    <table class="w-full mt-4 border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200 dark:bg-gray-700">
                                <th class="p-2 border">ID</th>
                                <th class="p-2 border">Nombre</th>
                                <th class="p-2 border">Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr class="text-center border">
                                    <td class="p-2 border">{{ $team->id }}</td>
                                    <td class="p-2 border">{{ $team->name }}</td>
                                    <td class="p-2 border">{{ $team->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
