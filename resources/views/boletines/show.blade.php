@extends('layouts.app')

@section('title', $boletin->titulo . ' - IMDEPORTE Tecámac')

@section('content')

{{-- Header --}}
<section class="bg-linear-to-r from-[#7B2D8E] to-[#A855A0] py-10">
    <div class="max-w-4xl mx-auto px-4">
        <a href="{{ route('boletines.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-white text-sm mb-4 transition">
            <i class="fas fa-arrow-left"></i> Todos los boletines
        </a>
        <span class="inline-block text-xs font-bold text-white bg-white/20 px-3 py-1 rounded-full mb-3">
            {{ $boletin->fecha->translatedFormat('d F, Y') }}
        </span>
        <h1 class="text-2xl md:text-3xl font-extrabold text-white leading-snug">{{ $boletin->titulo }}</h1>
    </div>
</section>

{{-- Article content --}}
<section class="py-10 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <article class="bg-white rounded-xl overflow-hidden">
            {{-- Image --}}
            @if($boletin->imagen)
                <div class="w-full max-h-[500px] overflow-hidden rounded-xl mb-8">
                    <img src="{{ $boletin->imagen }}" alt="{{ $boletin->titulo }}" class="w-full h-full object-cover">
                </div>
            @endif

            {{-- Body --}}
            <div class="prose prose-gray max-w-none">
                <div class="text-gray-700 text-base leading-relaxed whitespace-pre-line">{{ $boletin->descripcion }}</div>
            </div>

            {{-- External link if available --}}
            @if($boletin->url_externa && trim($boletin->url_externa) !== '')
                <div class="mt-8 p-4 bg-[#f3e8f7] rounded-lg border border-[#7B2D8E]/20">
                    <p class="text-sm text-gray-600 mb-2">
                        <i class="fas fa-external-link-alt text-[#7B2D8E] mr-1"></i>
                        Este boletín tiene un enlace externo:
                    </p>
                    <a href="{{ $boletin->url_externa }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-5 rounded-lg text-sm transition">
                        <i class="fas fa-external-link-alt"></i> Ver enlace completo
                    </a>
                </div>
            @endif
        </article>

        {{-- Navigation --}}
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-10 pt-8 border-t border-gray-200">
            <a href="{{ route('boletines.index') }}" class="inline-flex items-center gap-2 text-[#7B2D8E] hover:text-[#5c1a6e] font-semibold transition">
                <i class="fas fa-arrow-left"></i> Ver todos los boletines
            </a>
            <a href="/" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 text-sm transition">
                <i class="fas fa-home"></i> Volver al inicio
            </a>
        </div>
    </div>
</section>

{{-- Related boletines --}}
@if($recientes->count() > 0)
<section class="py-10 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        <h3 class="text-xl font-extrabold text-gray-800 mb-6 text-center">Más boletines recientes</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($recientes as $reciente)
                <a href="{{ route('boletines.show', $reciente) }}" {{ $reciente->url_externa ? 'target=_blank' : '' }}
                   class="bg-white rounded-xl shadow-lg overflow-hidden group border border-gray-100 hover:shadow-xl transition block">
                    <div class="h-48 overflow-hidden">
                        @if($reciente->imagen)
                            <img src="{{ $reciente->imagen }}" alt="{{ $reciente->titulo }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-newspaper text-gray-400 text-3xl"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-5">
                        <span class="text-xs font-bold text-[#7B2D8E] bg-[#f3e8f7] px-2 py-1 rounded">
                            {{ $reciente->fecha->translatedFormat('d F, Y') }}
                        </span>
                        <h4 class="text-gray-800 font-bold mt-3 text-sm leading-snug">{{ $reciente->titulo }}</h4>
                        <p class="text-gray-500 text-xs mt-2">{{ Str::limit($reciente->descripcion, 100) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
