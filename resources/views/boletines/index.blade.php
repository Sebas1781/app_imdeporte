@extends('layouts.app')

@section('title', 'Todos los Boletines - ODAPAS Tecámac')

@section('content')

{{-- Header --}}
<section class="bg-linear-to-r from-[#00839B] to-[#45c6e0] py-12">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2">Boletines de Interés</h1>
        <p class="text-white/80 text-sm">Mantente informado sobre las noticias y actividades de ODAPAS Tecámac</p>
    </div>
</section>

{{-- Boletines Grid --}}
<section class="py-10 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        @if($boletines->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($boletines as $boletin)
                    <a href="{{ route('boletines.show', $boletin) }}" {{ $boletin->url_externa ? 'target=_blank' : '' }} class="bg-white rounded-xl shadow-lg overflow-hidden group border border-gray-100 hover:shadow-xl transition block">
                        <div class="h-48 overflow-hidden">
                            @if($boletin->imagen)
                                <img src="{{ $boletin->imagen }}" alt="{{ $boletin->titulo }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-newspaper text-gray-400 text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <span class="text-xs font-bold text-[#00839B] bg-[#e8f7fa] px-2 py-1 rounded">
                                {{ $boletin->fecha->translatedFormat('d F, Y') }}
                            </span>
                            <h4 class="text-gray-800 font-bold mt-3 text-sm leading-snug">{{ $boletin->titulo }}</h4>
                            <p class="text-gray-500 text-xs mt-2">{{ Str::limit($boletin->descripcion, 120) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8 flex justify-center">
                {{ $boletines->links() }}
            </div>
        @else
            <div class="text-center py-16 text-gray-400">
                <i class="fas fa-newspaper text-5xl mb-4 block"></i>
                <p class="text-lg">No hay boletines disponibles por el momento.</p>
            </div>
        @endif

        {{-- Back to home --}}
        <div class="flex justify-center mt-8">
            <a href="/" class="inline-flex items-center gap-2 text-[#00839B] hover:text-[#006d82] font-semibold transition">
                <i class="fas fa-arrow-left"></i> Volver al inicio
            </a>
        </div>
    </div>
</section>

@endsection
