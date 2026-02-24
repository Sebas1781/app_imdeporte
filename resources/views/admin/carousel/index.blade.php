@extends('admin.layout')

@section('page-title', 'Carrusel de Inicio')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Administra las imágenes del carrusel principal</p>
    <a href="{{ route('admin.carousel.create') }}" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Agregar Imagen
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
            @forelse($items as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-600">{{ $item->orden }}</td>
                    <td class="px-6 py-4">
                        @if($item->imagen)
                            <img src="{{ $item->imagen }}" alt="{{ $item->titulo }}" class="w-20 h-12 object-cover rounded-lg border">
                        @else
                            <span class="text-gray-400 text-xs">Sin imagen</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $item->titulo }}</td>
                    <td class="px-6 py-4">
                        @if($item->activo)
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
                            <a href="{{ route('admin.carousel.edit', $item) }}" class="text-blue-600 hover:text-blue-800 transition" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.carousel.destroy', $item) }}" method="POST" class="inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete(this.closest('form'), '¿Estás seguro de eliminar esta imagen del carrusel?')" class="text-red-500 hover:text-red-700 transition" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                        <i class="fas fa-images text-3xl mb-2 block"></i>
                        No hay imágenes en el carrusel. <a href="{{ route('admin.carousel.create') }}" class="text-[#7B2D8E] hover:underline">Agregar una</a>.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
