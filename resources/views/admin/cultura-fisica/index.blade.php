@extends('admin.layout')

@section('page-title', 'Cultura Física – Actividades y Servicios')

@section('content')

@if(session('success'))
    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
        {{ session('success') }}
    </div>
@endif

{{-- ===== ACTIVIDADES ===== --}}
<div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-bold text-gray-800">Actividades</h2>
    <a href="{{ route('admin.cultura-fisica.create', ['tipo' => 'actividad']) }}"
       class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Agregar Actividad
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-10">
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
            @forelse($actividades as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-600">{{ $item->orden }}</td>
                    <td class="px-6 py-4">
                        @if($item->imagen)
                            <img src="{{ $item->imagen }}" alt="{{ $item->titulo }}" class="w-14 h-14 object-contain rounded border bg-gray-50">
                        @else
                            <span class="text-gray-400 text-xs">Sin imagen</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $item->titulo }}</td>
                    <td class="px-6 py-4">
                        @if($item->activo)
                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full"><i class="fas fa-check-circle"></i> Activo</span>
                        @else
                            <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 text-xs font-semibold px-2 py-1 rounded-full"><i class="fas fa-minus-circle"></i> Inactivo</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.cultura-fisica.edit', $item) }}" class="text-blue-600 hover:text-blue-800 transition" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.cultura-fisica.destroy', $item) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="button"
                                    onclick="confirmDelete(this.closest('form'), '¿Eliminar esta actividad?')"
                                    class="text-red-500 hover:text-red-700 transition" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                        No hay actividades. <a href="{{ route('admin.cultura-fisica.create', ['tipo' => 'actividad']) }}" class="text-[#7B2D8E] hover:underline">Agregar una</a>.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- ===== SERVICIOS DE SALUD ===== --}}
<div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-bold text-gray-800">Servicios de Salud</h2>
    <a href="{{ route('admin.cultura-fisica.create', ['tipo' => 'servicio']) }}"
       class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Agregar Servicio
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
            @forelse($servicios as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-600">{{ $item->orden }}</td>
                    <td class="px-6 py-4">
                        @if($item->imagen)
                            <img src="{{ $item->imagen }}" alt="{{ $item->titulo }}" class="w-14 h-14 object-contain rounded border bg-gray-50">
                        @else
                            <span class="text-gray-400 text-xs">Sin imagen</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $item->titulo }}</td>
                    <td class="px-6 py-4">
                        @if($item->activo)
                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full"><i class="fas fa-check-circle"></i> Activo</span>
                        @else
                            <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 text-xs font-semibold px-2 py-1 rounded-full"><i class="fas fa-minus-circle"></i> Inactivo</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.cultura-fisica.edit', $item) }}" class="text-blue-600 hover:text-blue-800 transition" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.cultura-fisica.destroy', $item) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="button"
                                    onclick="confirmDelete(this.closest('form'), '¿Eliminar este servicio?')"
                                    class="text-red-500 hover:text-red-700 transition" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                        No hay servicios. <a href="{{ route('admin.cultura-fisica.create', ['tipo' => 'servicio']) }}" class="text-[#7B2D8E] hover:underline">Agregar uno</a>.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
