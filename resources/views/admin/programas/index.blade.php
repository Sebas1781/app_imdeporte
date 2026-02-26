@extends('admin.layout')

@section('page-title', 'Programas')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Administra los programas que aparecen en la sección de Programas</p>
    <a href="{{ route('admin.programas.create') }}" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Agregar Programa
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Orden</th>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Imagen</th>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Título</th>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Estado</th>
                <th class="text-right px-6 py-3 font-semibold text-gray-600">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($programas as $programa)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-600">{{ $programa->orden }}</td>
                    <td class="px-6 py-4">
                        @if($programa->imagen)
                            <img src="{{ $programa->imagen }}" alt="{{ $programa->titulo }}" class="w-20 h-12 object-cover rounded-lg border">
                        @else
                            <span class="text-gray-400 text-xs">Sin imagen</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $programa->titulo }}</td>
                    <td class="px-6 py-4">
                        @if($programa->activo)
                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">
                                <i class="fas fa-check-circle"></i> Activo
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 text-xs font-semibold px-2 py-1 rounded-full">
                                <i class="fas fa-minus-circle"></i> Inactivo
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.programas.edit', $programa) }}" class="text-blue-600 hover:text-blue-800 transition" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.programas.destroy', $programa) }}" method="POST" class="inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete(this.closest('form'), '¿Estás seguro de eliminar este programa?')" class="text-red-500 hover:text-red-700 transition" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                        <i class="fas fa-running text-3xl mb-2 block"></i>
                        No hay programas. <a href="{{ route('admin.programas.create') }}" class="text-[#7B2D8E] hover:underline">Agregar uno</a>.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
