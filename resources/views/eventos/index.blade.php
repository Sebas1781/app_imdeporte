@extends('layouts.app')

@section('title', 'Eventos - IMDEPORTE Tecámac')

@section('content')

{{-- Hero Banner --}}
<section class="relative w-full overflow-hidden" style="height: 340px;">
    <img src="/images/EVENTOS.jpg" alt="Eventos" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold tracking-wide drop-shadow-lg">EVENTOS</h1>
    </div>
</section>

{{-- Descripción --}}
<section class="py-10 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-2xl font-extrabold text-gray-800 mb-4">¡Vive la emoción del deporte en Tecámac!</h2>
        <p class="text-gray-600 text-base leading-relaxed">
            Bienvenido a nuestra cartelera de eventos. Aquí encontrarás toda la información sobre nuestras próximas carreras, torneos, exhibiciones y clases
            magnas. Ya sea que quieras competir, apoyar a nuestros talentos locales o disfrutar de un fin de semana muy activo, este es el lugar para enterarte de todo.
            ¡Prepárate, pon a prueba tus límites y siente la adrenalina!
        </p>
    </div>
</section>

{{-- Cards carousel de eventos --}}
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="relative">
            <div id="eventos-container" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($eventos as $evento)
                    <a href="{{ route('eventos.show', $evento) }}" {{ $evento->url_externa ? 'target=_blank' : '' }}
                       class="bg-white rounded-xl shadow-lg overflow-hidden group border border-gray-100 evento-card hover:shadow-xl transition" style="display: none;">
                        <div class="h-48 overflow-hidden">
                            @if($evento->imagen)
                                <img src="{{ $evento->imagen }}" alt="{{ $evento->titulo }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-calendar-star text-gray-400 text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            @if($evento->fecha)
                                <span class="text-xs font-bold text-[#7B2D8E] bg-[#f3e8f7] px-2 py-1 rounded">{{ $evento->fecha->translatedFormat('d \d\e F') }}</span>
                            @endif
                            <h4 class="text-gray-800 font-bold mt-3 text-sm leading-snug">{{ $evento->titulo }}</h4>
                            <p class="text-gray-500 text-xs mt-2">{{ Str::limit($evento->descripcion, 100) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-400">
                        <i class="fas fa-calendar-alt text-3xl mb-2 block"></i>
                        <p>No hay eventos disponibles.</p>
                    </div>
                @endforelse
            </div>

            <button id="eventos-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="eventos-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div id="eventos-dots" class="flex justify-center gap-2 mt-6"></div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('eventos.index') }}" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-bold py-3 px-8 rounded-full shadow transition">
                <i class="fas fa-calendar-alt"></i> Ver todos los eventos
            </a>
        </div>
    </div>
</section>

{{-- Imagen pie --}}
<section class="relative">
    <img src="/images/pie.png" alt="IMDEPORTE Tecámac" class="w-full h-auto object-cover">
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    function initCardCarousel(containerId, dotsId, prevId, nextId, cardClass) {
        const container = document.getElementById(containerId);
        const dotsEl = document.getElementById(dotsId);
        const prevBtnEl = document.getElementById(prevId);
        const nextBtnEl = document.getElementById(nextId);
        if (!container) return;

        const cards = container.querySelectorAll('.' + cardClass);
        const perPage = 3;
        let page = 0;
        const totalPages = Math.ceil(cards.length / perPage);

        function showPage(p) {
            page = p;
            cards.forEach((card, i) => {
                card.style.display = (i >= p * perPage && i < (p + 1) * perPage) ? 'block' : 'none';
            });
            if (dotsEl) {
                Array.from(dotsEl.children).forEach((dot, i) => {
                    dot.className = 'w-3 h-3 rounded-full transition-all ' + (i === page ? 'bg-[#7B2D8E] scale-110' : 'bg-gray-300');
                });
            }
        }

        if (dotsEl && totalPages > 1) {
            for (let i = 0; i < totalPages; i++) {
                const dot = document.createElement('button');
                dot.className = 'w-3 h-3 rounded-full transition-all ' + (i === 0 ? 'bg-[#7B2D8E] scale-110' : 'bg-gray-300');
                dot.addEventListener('click', () => showPage(i));
                dotsEl.appendChild(dot);
            }
        }

        showPage(0);
        prevBtnEl?.addEventListener('click', () => showPage((page - 1 + totalPages) % totalPages));
        nextBtnEl?.addEventListener('click', () => showPage((page + 1) % totalPages));
    }

    initCardCarousel('eventos-container', 'eventos-dots', 'eventos-prev', 'eventos-next', 'evento-card');
});
</script>
@endpush
