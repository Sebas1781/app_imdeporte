@extends('layouts.app')

@section('title', 'PADA — IMDEPORTE Tecámac')
@section('meta_description', 'Programa Anual de Adquisiciones, Arrendamientos y Servicios del Instituto Municipal de Cultura Física y Deporte de Tecámac.')
@section('og_title', 'PADA — IMDEPORTE Tecámac')
@section('og_description', 'Programa Anual de Adquisiciones, Arrendamientos y Servicios del IMDEPORTE Tecámac.')
@section('og_type', 'article')
@section('canonical', route('transparencia.pada'))

@section('content')

{{-- Header --}}
<section class="bg-linear-to-r from-[#7B2D8E] to-[#A855A0] py-10">
    <div class="max-w-5xl mx-auto px-4">
        <a href="{{ route('transparencia.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-white text-sm mb-4 transition">
            <i class="fas fa-arrow-left"></i> Transparencia
        </a>
        <div class="flex items-center gap-3">
            <i class="fas fa-file-contract text-white/80 text-2xl"></i>
            <div>
                <h1 class="text-2xl md:text-3xl font-extrabold text-white leading-snug">PADA</h1>
                <p class="text-white/80 text-sm mt-1">Programa Anual de Adquisiciones, Arrendamientos y Servicios</p>
            </div>
        </div>
    </div>
</section>

{{-- Contenido --}}
<section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-4">

        @if($existe)
            {{-- Botón de descarga --}}
            <div class="flex justify-end mb-4">
                <a href="{{ $url }}" download
                   class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-5 rounded-lg text-sm transition">
                    <i class="fas fa-download"></i> Descargar PDF
                </a>
            </div>

            {{-- Visor PDF --}}
            <div class="rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                <iframe src="{{ $url }}"
                        class="w-full"
                        style="height: 85vh; min-height: 600px;"
                        title="PADA — IMDEPORTE Tecámac">
                    <p class="p-6 text-gray-600 text-sm">
                        Tu navegador no puede mostrar el PDF directamente.
                        <a href="{{ $url }}" class="text-[#7B2D8E] underline font-semibold">Haz clic aquí para descargarlo</a>.
                    </p>
                </iframe>
            </div>
        @else
            <div class="text-center py-20 text-gray-400">
                <i class="fas fa-file-pdf text-5xl mb-4 block text-gray-300"></i>
                <p class="text-lg font-semibold text-gray-500">Documento no disponible</p>
                <p class="text-sm mt-1">El documento PADA aún no ha sido publicado. Consulta más tarde.</p>
            </div>
        @endif

    </div>
</section>

@endsection
