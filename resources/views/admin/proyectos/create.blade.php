@extends('admin.layout')

@section('title', 'Crear Nuevo Proyecto')

@section('content')
    <div class="max-w-2xl mx-auto">
        <form action="{{ route('admin.proyectos.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nombre del Proyecto</label>
                <input type="text" name="us_nombre" value="{{ old('us_nombre') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                <textarea name="descripcion" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">URL del Repositorio</label>
                <input type="url" name="repositorio_url" value="{{ old('repositorio_url') }}"
                    placeholder="https://github.com/usuario/proyecto"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Fecha de Creación</label>
                <input type="date" name="fecha_creacion" value="{{ old('fecha_creacion') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Creador</label>
                <select name="creador_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    <option value="">Selecciona un creador</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->us_id }}" {{ old('creador_id') == $usuario->us_id ? 'selected' : '' }}>
                            {{ $usuario->us_nombre }} {{ $usuario->us_apellido }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Equipo</label>
                <select name="id_equipo" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    <option value="">Selecciona un equipo</option>
                    @foreach($equipos as $equipo)
                        <option value="{{ $equipo->id_equipo }}" {{ old('id_equipo') == $equipo->id_equipo ? 'selected' : '' }}>
                            {{ $equipo->nombre_equipo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.proyectos.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                    Cancelar
                </a>
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                    Crear Proyecto
                </button>
            </div>
        </form>
    </div>
@endsection

