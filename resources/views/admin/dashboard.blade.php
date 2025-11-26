@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Miembros -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80">Total Miembros</p>
                    <h3 class="text-4xl font-bold mt-2">{{ $totalMiembros }}</h3>
                </div>
                <div class="text-5xl opacity-50">👥</div>
            </div>
        </div>

        <!-- Total Eventos -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80">Total Eventos</p>
                    <h3 class="text-4xl font-bold mt-2">{{ $totalEventos }}</h3>
                </div>
                <div class="text-5xl opacity-50">📅</div>
            </div>
        </div>

        <!-- Total Proyectos -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80">Total Proyectos</p>
                    <h3 class="text-4xl font-bold mt-2">{{ $totalProyectos }}</h3>
                </div>
                <div class="text-5xl opacity-50">🚀</div>
            </div>
        </div>

        <!-- Total Contactos -->
        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80">Mensajes</p>
                    <h3 class="text-4xl font-bold mt-2">{{ $totalContactos }}</h3>
                </div>
                <div class="text-5xl opacity-50">✉️</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Próximos Eventos -->
        <div>
            <h3 class="text-xl font-bold mb-4 text-gray-800">📅 Próximos Eventos</h3>
            <div class="space-y-3">
                @forelse($proximosEventos as $evento)
                    <div class="border-l-4 border-purple-500 bg-gray-50 p-4 rounded">
                        <h4 class="font-semibold text-gray-800">{{ $evento->titulo }}</h4>
                        <p class="text-sm text-gray-600">📍 {{ $evento->lugar }}</p>
                        <p class="text-sm text-gray-500">🗓️ {{ \Carbon\Carbon::parse($evento->fecha_inicio)->format('d/m/Y') }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">No hay eventos próximos</p>
                @endforelse
            </div>
        </div>

        <!-- Últimos Contactos -->
        <div>
            <h3 class="text-xl font-bold mb-4 text-gray-800">✉️ Últimos Mensajes</h3>
            <div class="space-y-3">
                @forelse($ultimosContactos as $contacto)
                    <div class="border-l-4 border-blue-500 bg-gray-50 p-4 rounded">
                        <h4 class="font-semibold text-gray-800">{{ $contacto->Nombre }}</h4>
                        <p class="text-sm text-gray-600">📧 {{ $contacto->correo }}</p>
                        <p class="text-sm text-gray-500">{{ $contacto->Asunto }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">No hay mensajes recientes</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
