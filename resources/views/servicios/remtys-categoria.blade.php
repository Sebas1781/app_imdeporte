@extends('layouts.app')

@section('title', $categoria->nombre . ' - REMTYS - IMDEPORTE Tecámac')

@section('content')

{{-- Banner --}}
<section class="relative w-full overflow-hidden" style="height: 260px;">
    <div class="absolute inset-0" style="background: linear-gradient(135deg, {{ $categoria->color }}, {{ $categoria->color }}cc);"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: url('/images/fondo1.jpg'); background-size: cover; background-position: center;"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6">
        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-4">
            <i class="fas {{ $categoria->icono }} text-white text-3xl"></i>
        </div>
        <h1 class="text-white text-3xl md:text-4xl font-extrabold drop-shadow-lg">{{ $categoria->nombre }}</h1>
        <a href="{{ route('servicios.remtys') }}"
           class="mt-4 inline-flex items-center gap-1 text-white/70 hover:text-white text-sm transition">
            <i class="fas fa-arrow-left text-xs"></i> Volver a REMTYS
        </a>
    </div>
</section>

{{-- Documentos --}}
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4">

        {{-- Header de la categoría --}}
        <div class="mb-8">
            <x-remtys-category-header
                :nombre="$categoria->nombre"
                :color="$categoria->color"
                :icono="$categoria->icono"
                :numDocumentos="$documentos->count()" />
        </div>

        {{-- Tabla de documentos pública --}}
        <x-remtys-table-public
            :documentos="$documentos"
            :categoria="$categoria"
            :color="$categoria->color" />

    </div>
</section>

@endsection
