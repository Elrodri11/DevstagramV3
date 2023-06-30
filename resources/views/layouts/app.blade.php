<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @stack('styles')
</head>
<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black" href="/">Devstagram</h1>
            @auth
                <!-- Sección de navegación para usuarios autenticados -->
                <nav class="flex gap-2 items-center">
                    <a href="{{ route('post.create') }}" class="flex items-center gap-2 bg-white border p-2 text-gray-500 rounded text-sm uppercase font-bold cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>
                        Crear
                    </a>
                    <!-- Enlace al perfil del usuario autenticado -->
                    <a class="font-bold text-gray-600 text-sm" href="{{ route('post.index', auth()->user()->username) }}">Hola:
                        <span class="font-normal">{{ auth()->user()->username }}</span>
                    </a>
                    <!-- Formulario de cierre de sesión -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                            Cerrar sesión
                        </button>
                    </form>
                    <!-- Sección adicional para registros de alumnos y grupos -->
                    <div class="flex justify-center mt-5">
                        <form method="GET" action="{{ route('alumnos') }}">
                            <button type="submit" class="flex items-center gap-2 bg-white border p-2 text-gray-500 rounded text-sm uppercase font-bold cursor-pointe">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <!-- Icono de registro de alumnos -->
                                Registrar alumnos
                            </button>
                        </form>
                        <form method="GET" action="{{ route('grupos') }}">
                            <button type="submit" class="flex items-center gap-2 bg-white border p-2 text-gray-500 rounded text-sm uppercase font-bold cursor-pointe">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                                <!-- Icono de registro de grupos -->
                                Registrar grupos
                            </button>
                        </form>
                    </div>
                </nav>
            @endauth
            @guest
                <!-- Sección de navegación para usuarios no autenticados -->
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear cuenta</a>
                </nav>
            @endguest
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="text-3xl font-black text-center mb-10">@yield('titulo')</h2>
        @yield('contenido')
    </main>
    <footer class="text-center p-5 text-gray-500 font-bold">
        Devstagram UPV - Derechos Reservados {{ now()->year }}
    </footer>
</body>
</html>
