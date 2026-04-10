@extends('admin.layout')
@section('page-title', 'REMTYS - Categorías')

@section('content')

<div class="flex items-center justify-between mb-6 overflow-visible">
    <div class="flex items-center gap-2">
        <i class="fas fa-tags text-[#7B2D8E] text-xl"></i>
        <h2 class="text-xl font-bold text-gray-800">Categorías REMTYS</h2>
    </div>
    <a href="{{ route('admin.remtys.create') }}"
       class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Nueva Categoría
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-max">
    @forelse($categorias as $categoria)
        <x-remtys-card 
            :titulo="$categoria->nombre"
            :slug="$categoria->slug"
            :orden="$categoria->orden"
            :numDocumentos="$categoria->documentos_count"
            :color="$categoria->color"
            :enlaceEditar="route('admin.remtys.edit', $categoria)"
            :enlaceDocumentos="route('admin.remtys.documentos.index', $categoria)" />
    @empty
    <div class="col-span-3 bg-white rounded-xl border border-gray-200 py-16 text-center text-gray-400">
        <i class="fas fa-folder-open text-4xl mb-3 block text-gray-300"></i>
        <p class="font-medium">No hay categorías todavía.</p>
        <a href="{{ route('admin.remtys.create') }}" class="text-[#7B2D8E] hover:underline text-sm mt-1 inline-block">
            Crear primera categoría
        </a>
    </div>
    @endforelse
</div>

@endsection
