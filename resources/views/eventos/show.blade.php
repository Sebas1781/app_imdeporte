@extends('layouts.app')

@section('title', $evento->titulo . ' - IMDEPORTE Tecámac')

@section('content')

<section class="py-10 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <a href="{{ route('eventos.index') }}" class="inline-flex items-center gap-1 text-sm text-[#7B2D8E] hover:text-[#5c1a6e] mb-6 transition">
            <i class="fas fa-arrow-left"></i> Volver a eventos
        </a>

        @if($evento->imagen)
            <img src="{{ $evento->imagen }}" alt="{{ $evento->titulo }}" class="w-full h-64 object-cover rounded-xl mb-6">
        @endif

        <h1 class="text-3xl font-extrabold text-gray-800 mb-4">{{ $evento->titulo }}</h1>

        @if($evento->fecha)
            <span class="text-xs font-bold text-[#7B2D8E] bg-[#f3e8f7] px-3 py-1 rounded">{{ $evento->fecha->translatedFormat('d F, Y') }}</span>
        @endif

        <div class="mt-6 text-gray-600 leading-relaxed">
            {!! nl2br(e($evento->descripcion)) !!}
        </div>

        @if($recientes->count())
            <hr class="my-10">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Otros eventos</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($recientes as $item)
                    <a href="{{ route('eventos.show', $item) }}" class="bg-white rounded-xl shadow-lg overflow-hidden group border border-gray-100 hover:shadow-xl transition">
                        <div class="h-36 overflow-hidden">
                            @if($item->imagen)
                                <img src="{{ $item->imagen }}" alt="{{ $item->titulo }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-calendar-alt text-gray-400 text-2xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            @if($item->fecha)
                                <span class="text-xs font-bold text-[#7B2D8E] bg-[#f3e8f7] px-2 py-1 rounded">{{ $item->fecha->translatedFormat('d F, Y') }}</span>
                            @endif
                            <h4 class="text-gray-800 font-bold text-sm mt-2">{{ $item->titulo }}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection
