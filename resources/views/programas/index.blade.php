@extends('layouts.app')

@section('title', 'Programas - IMDEPORTE Tecámac')

@section('content')

{{-- Hero Banner --}}
<section class="relative w-full overflow-hidden" style="height: 340px;">
    <img src="/images/PROGRAMAS.jpg" alt="Programas" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold tracking-wide drop-shadow-lg">PROGRAMAS</h1>
    </div>
</section>

{{-- Descripción --}}
<section class="py-10 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <p class="text-gray-600 text-base leading-relaxed">
            Te damos la bienvenida a la sección de programas de Imdeporte Tecámac. Nuestro objetivo es acercar el deporte a cada rincón de nuestro municipio,
            ofreciéndote espacios seguros y entrenadores capacitados para que alcances tus metas. No importa si eres principiante o un atleta experimentado,
            tenemos un lugar para ti.
        </p>
        <p class="text-gray-600 text-base leading-relaxed mt-4 font-semibold">
            ¡Revisa nuestros programas y descubre todo lo que puedes lograr!
        </p>
    </div>
</section>

{{-- Cards carousel de programas --}}
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="relative">
            <div id="programas-container" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($programas as $programa)
                    <a href="{{ route('programas.show', $programa) }}" {{ $programa->url_externa ? 'target=_blank' : '' }}
                       class="bg-white rounded-xl shadow-lg overflow-hidden group border border-gray-100 programa-card hover:shadow-xl transition" style="display: none;">
                        <div class="h-48 overflow-hidden">
                            @if($programa->imagen)
                                <img src="{{ $programa->imagen }}" alt="{{ $programa->titulo }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-running text-gray-400 text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <h4 class="text-gray-800 font-bold mt-1 text-sm leading-snug">{{ $programa->titulo }}</h4>
                            <p class="text-gray-500 text-xs mt-2">{{ Str::limit($programa->descripcion, 120) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-400">
                        <i class="fas fa-running text-3xl mb-2 block"></i>
                        <p>No hay programas disponibles.</p>
                    </div>
                @endforelse
            </div>

            <button id="programas-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="programas-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div id="programas-dots" class="flex justify-center gap-2 mt-6"></div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('programas.index') }}" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-bold py-3 px-8 rounded-full shadow transition">
                <i class="fas fa-running"></i> Ver todos los programas
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

    initCardCarousel('programas-container', 'programas-dots', 'programas-prev', 'programas-next', 'programa-card');
});
</script>
@endpush
