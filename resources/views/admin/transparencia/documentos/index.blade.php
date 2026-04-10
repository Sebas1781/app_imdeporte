@extends('admin.layout')
@section('page-title', $seccion->titulo . ' — Documentos')

@section('content')

{{-- Breadcrumb --}}
<nav class="flex items-center gap-2 text-sm text-gray-500 mb-5 flex-wrap">
    <a href="{{ route('admin.transparencia.index', $tipo) }}" class="hover:text-[#7B2D8E] transition">{{ $tipoLabel }}</a>
    <i class="fas fa-chevron-right text-xs text-gray-300"></i>
    <a href="{{ route('admin.transparencia.secciones.index', [$tipo, $grupo]) }}" class="hover:text-[#7B2D8E] transition">{{ $grupo->nombre_completo }}</a>
    <i class="fas fa-chevron-right text-xs text-gray-300"></i>
    <span class="text-gray-800 font-medium">{{ $seccion->titulo }}</span>
    <i class="fas fa-chevron-right text-xs text-gray-300"></i>
    <span class="text-gray-800 font-medium">Documentos</span>
</nav>

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-gray-800">{{ $seccion->titulo }}</h2>
    <a href="{{ route('admin.transparencia.documentos.create', [$tipo, $grupo, $seccion]) }}"
       class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Agregar Documento
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    @if($documentos->isEmpty())
    <div class="py-16 text-center text-gray-400">
        <i class="fas fa-file-pdf text-4xl mb-3 block text-gray-300"></i>
        <p class="font-medium">No hay documentos en esta sección.</p>
        <a href="{{ route('admin.transparencia.documentos.create', [$tipo, $grupo, $seccion]) }}"
           class="text-[#7B2D8E] hover:underline text-sm mt-2 inline-block">
            Agregar primer documento
        </a>
    </div>
    @else
    <table class="w-full">
        <thead class="bg-gray-50 text-xs text-gray-500 uppercase tracking-wider">
            <tr>
                <th class="px-6 py-3 text-left">#</th>
                <th class="px-6 py-3 text-left">Nombre</th>
                <th class="px-6 py-3 text-left">Tipo</th>
                <th class="px-6 py-3 text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($documentos as $i => $doc)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-sm text-gray-400">{{ $i + 1 }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2">
                        <i class="fas {{ $doc->tipo_archivo === 'pdf' ? 'fa-file-pdf text-red-500' : 'fa-link text-blue-500' }} text-base"></i>
                        <span class="text-sm font-medium text-gray-800">{{ $doc->nombre }}</span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    @if($doc->tipo_archivo === 'pdf')
                        <span class="inline-flex items-center gap-1 bg-red-50 text-red-600 text-xs font-semibold px-2.5 py-1 rounded-full">
                            <i class="fas fa-file-pdf text-xs"></i> PDF
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-600 text-xs font-semibold px-2.5 py-1 rounded-full">
                            <i class="fas fa-link text-xs"></i> Enlace
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ $doc->tipo_archivo === 'pdf' ? asset($doc->archivo) : $doc->archivo }}"
                           target="_blank"
                           class="inline-flex items-center gap-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold py-1.5 px-3 rounded-lg transition">
                            <i class="fas fa-eye text-xs"></i> Ver
                        </a>
                        <form action="{{ route('admin.transparencia.documentos.destroy', [$tipo, $grupo, $seccion, $doc]) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar «{{ addslashes($doc->nombre) }}»?')">
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
