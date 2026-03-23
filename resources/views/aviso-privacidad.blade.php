@extends('layouts.app')

@section('title', 'Aviso de Privacidad - IMDEPORTE Tecámac')

@section('content')

{{-- Hero Banner --}}
<section class="relative w-full overflow-hidden" style="height: 280px;">
    <img src="/images/INSTITUTO.jpg" alt="Aviso de Privacidad" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h1 class="text-white text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg">AVISO DE PRIVACIDAD</h1>
        <p class="text-white/90 text-lg mt-2 drop-shadow">IMDEPORTE Tecámac · Protección de datos personales</p>
    </div>
</section>

{{-- PDF Viewer --}}
<section class="py-10 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            {{-- Toolbar --}}
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-gray-50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-pdf text-[#7B2D8E] text-xl"></i>
                    </div>
                    <div>
                        <p class="font-bold text-gray-800 text-sm">Aviso de Privacidad Integral</p>
                        <p class="text-xs text-gray-500">Instituto Municipal de Cultura Física y Deporte – Tecámac</p>
                    </div>
                </div>
                <a href="{{ asset('documents/AvisoPrivacidad.pdf') }}"
                   download="Aviso-Privacidad-IMDEPORTE.pdf"
                   class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-sm font-semibold py-2 px-5 rounded-full shadow transition">
                    <i class="fas fa-download"></i> Descargar PDF
                </a>
            </div>

            {{-- Embedded PDF --}}
            <div class="w-full" style="height: 80vh; min-height: 600px;">
                <iframe
                    src="{{ asset('documents/AvisoPrivacidad.pdf') }}#toolbar=1&navpanes=0&scrollbar=1"
                    class="w-full h-full border-0"
                    title="Aviso de Privacidad IMDEPORTE"
                    loading="lazy">
                    <div class="flex flex-col items-center justify-center h-full py-20 text-gray-500">
                        <i class="fas fa-exclamation-circle text-4xl mb-4 text-yellow-500"></i>
                        <p class="text-lg font-semibold mb-2">Tu navegador no puede mostrar el PDF directamente.</p>
                        <a href="{{ asset('documents/AvisoPrivacidad.pdf') }}"
                           class="mt-4 inline-flex items-center gap-2 bg-[#7B2D8E] text-white font-bold py-3 px-8 rounded-full shadow transition hover:bg-[#5c1a6e]">
                            <i class="fas fa-download"></i> Descargar Aviso de Privacidad
                        </a>
                    </div>
                </iframe>
            </div>
        </div>

        {{-- Back link --}}
        <div class="mt-6 text-center">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-[#7B2D8E] hover:text-[#5c1a6e] font-semibold text-sm transition">
                <i class="fas fa-arrow-left"></i> Regresar al inicio
            </a>
        </div>

    </div>
</section>

@endsection
