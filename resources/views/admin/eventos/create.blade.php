@extends('admin.layout')

@section('title', 'Crear Nuevo Evento')

@section('content')
    <div class="max-w-2xl mx-auto">
        <form action="{{ route('admin.eventos.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                <textarea name="descripcion" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" value="{{ old('fecha_inicio') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Fecha Fin</label>
                    <input type="date" name="fecha_fin" value="{{ old('fecha_fin') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Lugar</label>
                <input type="text" name="lugar" value="{{ old('lugar') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.eventos.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                    Cancelar
                </a>
                <button type="submit" class="px-6 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition">
                    Crear Evento
                </button>
            </div>
        </form>
    </div>
@endsection
