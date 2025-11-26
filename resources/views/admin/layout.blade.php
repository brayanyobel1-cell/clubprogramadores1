<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Panel Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white">
            <div class="p-6">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">
                    Admin Panel
                </h1>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block px-6 py-3 hover:bg-gray-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 border-l-4 border-blue-500' : '' }}">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.miembros.index') }}" class="block px-6 py-3 hover:bg-gray-800 transition {{ request()->routeIs('admin.miembros.*') ? 'bg-gray-800 border-l-4 border-blue-500' : '' }}">
                    👥 Miembros
                </a>
                <a href="{{ route('admin.eventos.index') }}" class="block px-6 py-3 hover:bg-gray-800 transition {{ request()->routeIs('admin.eventos.*') ? 'bg-gray-800 border-l-4 border-blue-500' : '' }}">
                    📅 Eventos
                </a>
                <a href="{{ route('admin.proyectos.index') }}" class="block px-6 py-3 hover:bg-gray-800 transition {{ request()->routeIs('admin.proyectos.*') ? 'bg-gray-800 border-l-4 border-blue-500' : '' }}">
                    🚀 Proyectos
                </a>
                <hr class="my-4 border-gray-700">
                <a href="{{ route('home') }}" class="block px-6 py-3 hover:bg-gray-800 transition">
                    🏠 Ir al Sitio
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-6 py-3 hover:bg-gray-800 transition text-red-400">
                        🚪 Cerrar Sesión
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                <!-- Header -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <div class="flex justify-between items-center">
                        <h2 class="text-3xl font-bold text-gray-800">@yield('title')</h2>
                        <span class="text-gray-600">👤 {{ Auth::user()->us_nombre }}</span>
                    </div>
                </div>

                <!-- Alerts -->
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-6">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>❌ {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Content -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
