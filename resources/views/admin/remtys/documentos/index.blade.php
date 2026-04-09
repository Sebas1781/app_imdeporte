@extends('admin.layout')
@section('page-title', 'Documentos REMTYS')

@section('content')

{{-- Header --}}
<div class="flex items-center justify-between mb-6">
    <div class="flex items-center gap-3">
        <div class="flex items-center gap-2">
            <i class="fas fa-folder text-2xl text-amber-500"></i>
            <h2 class="text-2xl font-bold text-gray-800">Documentos REMTYS</h2>
        </div>
    </div>
    <a href="{{ route('admin.remtys.documentos.create', $categoria) }}"
       class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Agregar Documento
    </a>
</div>

{{-- Breadcrumb + Categoría --}}
<div class="mb-6 flex items-center gap-3">
    <a href="{{ route('admin.remtys.index') }}"
       class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-[#7B2D8E] transition">
        <i class="fas fa-arrow-left"></i> Volver a Categorías
    </a>
    <span class="text-gray-300">/</span>
    <span class="inline-block text-white text-xs font-bold px-4 py-2 rounded-lg"
          style="background-color: {{ $categoria->color }}">
        {{ $categoria->nombre }}
    </span>
</div>

{{-- Filtros --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <div class="flex items-end gap-4">
        <div class="flex-1">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Buscar</label>
            <input type="text" id="search-input" placeholder="Título del documento..."
                   class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
        </div>
        <button onclick="filterDocuments()"
                class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition flex items-center gap-2">
            <i class="fas fa-filter"></i> Filtrar
        </button>
        <button onclick="clearFilters()"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg text-sm transition">
            Limpiar
        </button>
    </div>
</div>

{{-- Tabla de Documentos --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-800 border-b border-gray-200">
            <tr>
                <th class="text-center px-6 py-4 font-semibold text-white text-sm">#</th>
                <th class="text-left px-6 py-4 font-semibold text-white text-sm">Categoría</th>
                <th class="text-left px-6 py-4 font-semibold text-white text-sm">Título</th>
                <th class="text-center px-6 py-4 font-semibold text-white text-sm">Tipo</th>
                <th class="text-center px-6 py-4 font-semibold text-white text-sm">Ver</th>
                <th class="text-right px-6 py-4 font-semibold text-white text-sm">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100" id="documentos-tbody">
            @forelse($documentos as $index => $doc)
            <tr class="hover:bg-gray-50 transition documento-row">
                {{-- # --}}
                <td class="text-center px-6 py-4 text-gray-600 font-semibold text-sm">
                    {{ $index + 1 }}
                </td>

                {{-- Categoría --}}
                <td class="text-left px-6 py-4">
                    <span class="inline-block text-white text-xs font-bold px-2.5 py-1 rounded-md"
                          style="background-color: {{ $categoria->color }}">
                        {{ $categoria->nombre }}
                    </span>
                </td>

                {{-- Título --}}
                <td class="text-left px-6 py-4">
                    <p class="font-medium text-gray-800 text-sm">{{ $doc->nombre }}</p>
                    @if(!$doc->activo)
                        <p class="text-gray-400 text-xs mt-1 flex items-center gap-1">
                            <i class="fas fa-eye-slash"></i> Inactivo
                        </p>
                    @endif
                </td>

                {{-- Tipo --}}
                <td class="text-center px-6 py-4">
                    @if($doc->tipo_archivo === 'pdf')
                        <span class="inline-flex items-center justify-center w-10 h-10 bg-amber-100 rounded-lg text-amber-600 font-semibold text-xs">
                            <i class="fas fa-file-pdf"></i>
                        </span>
                    @else
                        <span class="inline-flex items-center justify-center w-10 h-10 bg-blue-100 rounded-lg text-blue-600 font-semibold text-xs">
                            <i class="fas fa-link"></i>
                        </span>
                    @endif
                </td>

                {{-- Ver (Abrir) --}}
                <td class="text-center px-6 py-4">
                    <a href="{{ $doc->archivo }}" target="_blank"
                       class="inline-flex items-center justify-center text-blue-600 hover:text-blue-800 hover:bg-blue-50 px-3 py-2 rounded-md transition text-sm">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                </td>

                {{-- Acciones --}}
                <td class="text-right px-6 py-4">
                    <div class="flex items-center justify-end gap-2">
                        {{-- Editar (próximamente) --}}
                        <button title="Editar"
                                class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2 px-3 rounded-lg text-sm transition">
                            <i class="fas fa-edit text-sm"></i> Editar
                        </button>

                        {{-- Eliminar --}}
                        <form action="{{ route('admin.remtys.documentos.destroy', [$categoria, $doc]) }}"
                              method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                    onclick="confirmDelete(this.closest('form'), '¿Estás seguro de eliminar este documento?')"
                                    class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-3 rounded-lg text-sm transition"
                                    title="Eliminar">
                                <i class="fas fa-trash text-sm"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-16 text-center">
                    <div class="text-gray-400">
                        <i class="fas fa-file text-4xl mb-3 block"></i>
                        <p class="font-medium mb-2">No hay documentos en esta categoría.</p>
                        <a href="{{ route('admin.remtys.documentos.create', $categoria) }}"
                           class="inline-flex items-center gap-2 text-[#7B2D8E] hover:underline font-semibold">
                            <i class="fas fa-plus"></i> Agregar documento
                        </a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Script para búsqueda y filtros --}}
<script>
    const searchInput = document.getElementById('search-input');
    const documentosRows = document.querySelectorAll('.documento-row');

    function filterDocuments() {
        const searchTerm = searchInput.value.toLowerCase();
        documentosRows.forEach(row => {
            const title = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            if (title.includes(searchTerm) || searchTerm === '') {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function clearFilters() {
        searchInput.value = '';
        documentosRows.forEach(row => row.style.display = '');
    }

    // Buscar en tiempo real
    searchInput.addEventListener('keyup', filterDocuments);
</script>

@endsection
