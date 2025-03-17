<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestió de Tasques per Equips</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <header class="w-full bg-white shadow-md p-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">Gestió de Tasques per Equips</h1>
            <nav>
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-blue-600 hover:underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-blue-600 hover:underline">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 text-blue-600 hover:underline">Registrarse</a>
                    @endif
                @endauth
            </nav>
        </header>

        <main class="flex-1 flex flex-col items-center justify-center text-center p-6">
            <h2 class="text-3xl font-semibold mb-4">Bienvenido a la gestión de tareas</h2>
            <p class="text-lg text-gray-700 mb-6">Colabora en equipo, organiza tareas y gestiona proyectos con facilidad.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-4xl">
                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-xl font-bold">Para Invitados</h3>
                    <p class="text-gray-600">Explora recursos y obtén una vista previa sin necesidad de registrarte.</p>
                    <a href="{{ route('guest.view') }}" class="mt-4 inline-block text-blue-500 hover:underline">Ver más</a>
                </div>

                <div class="p-6 bg-white shadow rounded-lg">
                    <h3 class="text-xl font-bold">Para Usuarios Registrados</h3>
                    <p class="text-gray-600">Accede al panel de control para gestionar tareas y colaborar en equipo.</p>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="mt-4 inline-block text-blue-500 hover:underline">Ir al Dashboard</a>
                    @else
                        <a href="{{ route('register') }}" class="mt-4 inline-block text-blue-500 hover:underline">Registrarse</a>
                    @endauth
                </div>
            </div>
        </main>

        <footer class="py-4 text-center text-sm text-gray-500">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </div>
</body>
</html>
