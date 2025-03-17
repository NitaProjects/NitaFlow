<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a NitaFlow</title>

    <!-- Cargar estilos y scripts con Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .article-card {
            transition: transform 0.3s ease-in-out;
        }

        .article-card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <h1 class="text-4xl font-bold text-blue-600">Bienvenido a NitaFlow</h1>
        <p class="mt-4 text-lg text-gray-700">Explora nuestra plataforma sin necesidad de registrarte.</p>

        <!-- Botones de Login y Registro -->
        <div class="mt-6 flex gap-4">
            <a href="{{ route('login') }}" class="px-5 py-2 bg-blue-500 text-white rounded shadow-lg hover:bg-blue-700">
                Iniciar sesión
            </a>
            <a href="{{ route('register') }}" class="px-5 py-2 bg-green-500 text-white rounded shadow-lg hover:bg-green-700">
                Registrarse
            </a>
        </div>

        <!-- Sección de artículos de muestra -->
        <div class="mt-10 w-full max-w-4xl">
            <h2 class="text-2xl font-semibold text-gray-800">Últimos artículos</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div class="article-card bg-white shadow-md rounded-lg overflow-hidden p-4">
                    <h3 class="text-xl font-bold text-gray-900">Guía para gestionar proyectos con NitaFlow</h3>
                    <p class="mt-2 text-gray-600">Aprende cómo optimizar la gestión de tareas y equipos con nuestra plataforma.</p>
                    <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Leer más</a>
                </div>

                <div class="article-card bg-white shadow-md rounded-lg overflow-hidden p-4">
                    <h3 class="text-xl font-bold text-gray-900">Consejos para mejorar la productividad</h3>
                    <p class="mt-2 text-gray-600">Descubre cómo aumentar tu productividad con herramientas y estrategias eficientes.</p>
                    <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Leer más</a>
                </div>

                <div class="article-card bg-white shadow-md rounded-lg overflow-hidden p-4">
                    <h3 class="text-xl font-bold text-gray-900">Cómo trabajar en equipo de manera efectiva</h3>
                    <p class="mt-2 text-gray-600">Estrategias clave para mejorar la colaboración y comunicación en tu equipo.</p>
                    <a href="https://www.bitrix24.es/articles/12-claves-para-un-trabajo-en-equipo-eficiente.php" class="mt-4 inline-block text-blue-500 hover:underline">Leer más</a>
                </div>

                <div class="article-card bg-white shadow-md rounded-lg overflow-hidden p-4">
                    <h3 class="text-xl font-bold text-gray-900">Automatización de tareas con NitaFlow</h3>
                    <p class="mt-2 text-gray-600">Descubre cómo NitaFlow puede ayudarte a automatizar procesos repetitivos.</p>
                    <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">Leer más</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
