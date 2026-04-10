@extends('admin.layout')
@section('page-title', $grupo->nombre_completo . ' — Secciones')

@section('content')

{{-- Breadcrumb --}}
<nav class="flex items-center gap-2 text-sm text-gray-500 mb-5 flex-wrap">
    <a href="{{ route('admin.transparencia.index', $tipo) }}"
       class="hover:text-[#7B2D8E] transition">{{ $tipoLabel }}</a>
    <i class="fas fa-chevron-right text-xs text-gray-300"></i>
    <span class="text-gray-800 font-medium">{{ $grupo->nombre_completo }}</span>
    <i class="fas fa-chevron-right text-xs text-gray-300"></i>
    <span class="text-gray-800 font-medium">Secciones</span>
</nav>

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-gray-800">Secciones — {{ $grupo->nombre_completo }}</h2>
    <a href="{{ route('admin.transparencia.secciones.create', [$tipo, $grupo]) }}"
       class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Nueva Sección
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    @if($secciones->isEmpty())
    <div class="py-16 text-center text-gray-400">
        <i class="fas fa-layer-group text-4xl mb-3 block text-gray-300"></i>
        <p class="font-medium">No hay secciones todavía.</p>
        <a href="{{ route('admin.transparencia.secciones.create', [$tipo, $grupo]) }}"
           class="text-[#7B2D8E] hover:underline text-sm mt-2 inline-block">
            Crear primera sección
        </a>
    </div>
    @else
    <table class="w-full">
        <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
            <tr>
                <th class="px-6 py-3 text-left">#</th>
                <th class="px-6 py-3 text-left">Título</th>
                <th class="px-6 py-3 text-left">Documentos</th>
                <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($secciones as $i => $seccion)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-sm text-gray-400">{{ $i + 1 }}</td>
                <td class="px-6 py-4">
                    <p class="text-sm font-semibold text-gray-800">{{ $seccion->titulo }}</p>
                </td>
                <td class="px-6 py-4">
                    <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                        <i class="fas fa-file text-xs"></i>
                        {{ $seccion->documentos_count }} doc(s)
                    </span>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.transparencia.documentos.index', [$tipo, $grupo, $seccion]) }}"
                           class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold py-1.5 px-3 rounded-lg transition">
                            <i class="fas fa-file-pdf text-xs"></i> Documentos
                        </a>
                        <form action="{{ route('admin.transparencia.secciones.destroy', [$tipo, $grupo, $seccion]) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar la sección «{{ addslashes($seccion->titulo) }}» y todos sus documentos?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white text-xs font-semibold py-1.5 px-3 rounded-lg transition">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection
