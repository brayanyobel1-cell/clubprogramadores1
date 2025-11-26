@extends('admin.layout')

@section('title', 'Crear Nuevo Miembro')

@section('content')
    <div class="max-w-2xl mx-auto">
        <form action="{{ route('admin.miembros.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                <input type="text" name="us_nombre" value="{{ old('us_nombre') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Apellido</label>
                <input type="text" name="us_apellido" value="{{ old('us_apellido') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="us_email" value="{{ old('us_email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                <input type="password" name="us_password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Rol</label>
                <select name="rol_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Selecciona un rol</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->rol_id }}" {{ old('rol_id') == $rol->rol_id ? 'selected' : '' }}>
                            {{ $rol->us_nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.miembros.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                    Cancelar
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    Crear Miembro
                </button>
            </div>
        </form>
    </div>
@endsection
