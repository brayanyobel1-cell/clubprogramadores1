@extends('admin.layout')

@section('title', 'Gestión de Proyectos')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold text-gray-800">Lista de Proyectos</h3>
        <a href="{{ route('admin.proyectos.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition">
            ➕ Nuevo Proyecto
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Creador</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Equipo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($proyectos as $proyecto)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $proyecto->proyectos_id }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $proyecto->us_nombre }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">{{ Str::limit($proyecto->descripcion, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $proyecto->creador->us_nombre ?? 'N/A' }} {{ $proyecto->creador->us_apellido ?? '' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $proyecto->equipo->nombre_equipo ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <a href="{{ route('admin.proyectos.edit', $proyecto->proyectos_id) }}" class="text-blue-600 hover:text-blue-900">✏️ Editar</a>
                            <form action="{{ route('admin.proyectos.destroy', $proyecto->proyectos_id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este proyecto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No hay proyectos registrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $proyectos->links() }}
    </div>
@endsection
