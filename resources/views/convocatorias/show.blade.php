@extends('layouts.app')

@section('title', $convocatoria->titulo . ' - IMDEPORTE Tecámac')

@section('content')

{{-- Header --}}
<section class="bg-linear-to-r from-[#7B2D8E] to-[#A855A0] py-10">
    <div class="max-w-4xl mx-auto px-4">
        <a href="{{ route('convocatorias.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-white text-sm mb-4 transition">
            <i class="fas fa-arrow-left"></i> Todas las convocatorias
        </a>
        <span class="inline-block text-xs font-bold text-white bg-white/20 px-3 py-1 rounded-full mb-3">
            {{ $convocatoria->fecha->translatedFormat('d F, Y') }}
        </span>
        <h1 class="text-2xl md:text-3xl font-extrabold text-white leading-snug">{{ $convocatoria->titulo }}</h1>
    </div>
</section>

{{-- Article content --}}
<section class="py-10 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <article class="bg-white rounded-xl overflow-hidden">
            @if($convocatoria->imagen)
                <div class="w-full max-h-[500px] overflow-hidden rounded-xl mb-8">
                    <img src="{{ $convocatoria->imagen }}" alt="{{ $convocatoria->titulo }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="prose prose-gray max-w-none">
                <div class="text-gray-700 text-base leading-relaxed whitespace-pre-line">{{ $convocatoria->descripcion }}</div>
            </div>

            @if($convocatoria->url_externa && trim($convocatoria->url_externa) !== '')
                <div class="mt-8 p-4 bg-[#f3e8f7] rounded-lg border border-[#7B2D8E]/20">
                    <p class="text-sm text-gray-600 mb-2">
                        <i class="fas fa-external-link-alt text-[#7B2D8E] mr-1"></i>
                        Esta convocatoria tiene un enlace externo:
                    </p>
                    <a href="{{ $convocatoria->url_externa }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-5 rounded-lg text-sm transition">
                        <i class="fas fa-external-link-alt"></i> Ver enlace completo
                    </a>
                </div>
            @endif
        </article>

        {{-- Related convocatorias --}}
        @if($recientes->count() > 0)
            <div class="mt-12 border-t pt-8">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Más convocatorias</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($recientes as $item)
                        <a href="{{ route('convocatorias.show', $item) }}" class="bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition">
                            <span class="text-xs text-[#7B2D8E] font-semibold">{{ $item->fecha->translatedFormat('d F, Y') }}</span>
                            <h4 class="text-sm font-bold text-gray-800 mt-1">{{ $item->titulo }}</h4>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="flex justify-center mt-8">
            <a href="{{ route('convocatorias.index') }}" class="inline-flex items-center gap-2 text-[#7B2D8E] hover:text-[#5c1a6e] font-semibold transition">
                <i class="fas fa-arrow-left"></i> Ver todas las convocatorias
            </a>
        </div>
    </div>
</section>

@endsection
