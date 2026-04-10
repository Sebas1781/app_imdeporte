@extends('admin.layout')
@section('page-title', $tipoLabel . ' — Periodos')

@section('content')

<div class="flex items-center justify-between mb-6">
    <div class="flex items-center gap-3">
        @if($tipo === 'sevac')
            <i class="fas fa-table-list text-[#7B2D8E] text-xl"></i>
        @elseif($tipo === 'conac')
            <i class="fas fa-landmark text-[#7B2D8E] text-xl"></i>
        @else
            <i class="fas fa-coins text-[#7B2D8E] text-xl"></i>
        @endif
        <h2 class="text-xl font-bold text-gray-800">{{ $tipoLabel }} — Periodos</h2>
    </div>
    <a href="{{ route('admin.transparencia.grupos.create', $tipo) }}"
       class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Nuevo Año
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($grupos as $grupo)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-[#7B2D8E] px-5 py-5 text-white text-center">
            <p class="text-4xl font-black">{{ $grupo->anio }}</p>
            <p class="text-sm text-white/80 mt-1">{{ $grupo->nombre_completo }}</p>
        </div>
        <div class="p-5">
            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-600 px-2.5 py-1 rounded-full text-xs font-medium">
                    <i class="fas fa-layer-group text-xs"></i>
                    {{ $grupo->secciones_count }} sección(es)
                </span>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('admin.transparencia.secciones.index', [$tipo, $grupo]) }}"
                   class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold py-2 px-3 rounded-lg transition">
                    <i class="fas fa-layer-group mr-1"></i> Secciones
                </a>
                <a href="{{ route('admin.transparencia.grupos.edit', [$tipo, $grupo]) }}"
                   class="bg-amber-500 hover:bg-amber-600 text-white text-xs font-semibold py-2 px-3 rounded-lg transition">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.transparencia.grupos.destroy', [$tipo, $grupo]) }}" method="POST"
                      onsubmit="return confirm('¿Eliminar {{ $grupo->nombre_completo }} y todo su contenido? Esta acción no se puede deshacer.')">
                    @csrf @method('DELETE')
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold py-2 px-3 rounded-lg transition">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-3 bg-white rounded-xl border border-gray-200 py-16 text-center text-gray-400">
        <i class="fas fa-calendar-times text-4xl mb-3 block text-gray-300"></i>
        <p class="font-medium">No hay periodos registrados.</p>
        <a href="{{ route('admin.transparencia.grupos.create', $tipo) }}"
           class="text-[#7B2D8E] hover:underline text-sm mt-2 inline-block">
            Agregar primer año
        </a>
    </div>
    @endforelse
</div>

@endsection
