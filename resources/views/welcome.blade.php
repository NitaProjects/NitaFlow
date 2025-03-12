<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 text-gray-900">

    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-3xl font-bold mb-6">Bienvenido</h1>
        
        @if (Route::has('login'))
            <div class="space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600">
                        Iniciar sesión
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2 bg-yellow-500 text-white rounded-lg shadow-md hover:bg-yellow-600">
                            Registrarse
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

</body>
</html>
