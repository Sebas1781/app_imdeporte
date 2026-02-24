@extends('layouts.app')

@section('title', 'Todas las Convocatorias - IMDEPORTE Tecámac')

@section('content')

{{-- Header --}}
<section class="bg-linear-to-r from-[#7B2D8E] to-[#A855A0] py-12">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2">Convocatorias</h1>
        <p class="text-white/80 text-sm">Conoce las convocatorias y eventos de IMDEPORTE Tecámac</p>
    </div>
</section>

{{-- Convocatorias Grid --}}
<section class="py-10 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4">
        @if($convocatorias->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($convocatorias as $convocatoria)
                    <a href="{{ route('convocatorias.show', $convocatoria) }}" {{ $convocatoria->url_externa ? 'target=_blank' : '' }} class="bg-white rounded-xl shadow-lg overflow-hidden group border border-gray-100 hover:shadow-xl transition block">
                        <div class="h-48 overflow-hidden">
                            @if($convocatoria->imagen)
                                <img src="{{ $convocatoria->imagen }}" alt="{{ $convocatoria->titulo }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-bullhorn text-gray-400 text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <span class="text-xs font-bold text-[#7B2D8E] bg-[#f3e8f7] px-2 py-1 rounded">
                                {{ $convocatoria->fecha->translatedFormat('d F, Y') }}
                            </span>
                            <h4 class="text-gray-800 font-bold mt-3 text-sm leading-snug">{{ $convocatoria->titulo }}</h4>
                            <p class="text-gray-500 text-xs mt-2">{{ Str::limit($convocatoria->descripcion, 120) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-8 flex justify-center">
                {{ $convocatorias->links() }}
            </div>
        @else
            <div class="text-center py-16 text-gray-400">
                <i class="fas fa-bullhorn text-5xl mb-4 block"></i>
                <p class="text-lg">No hay convocatorias disponibles por el momento.</p>
            </div>
        @endif

        {{-- Back to home --}}
        <div class="flex justify-center mt-8">
            <a href="/" class="inline-flex items-center gap-2 text-[#7B2D8E] hover:text-[#5c1a6e] font-semibold transition">
                <i class="fas fa-arrow-left"></i> Volver al inicio
            </a>
        </div>
    </div>
</section>

@endsection
