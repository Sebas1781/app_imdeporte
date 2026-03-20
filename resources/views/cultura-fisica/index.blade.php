@extends('layouts.app')

@section('title', 'Cultura Física - IMDEPORTE Tecámac')

@section('content')

{{-- Hero Banner --}}
<section class="relative w-full overflow-hidden" style="height: 340px;">
    <img src="/images/CULTURA%20FISICA.jpg" alt="Cultura Física" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold tracking-wide drop-shadow-lg">CULTURA FÍSICA</h1>
    </div>
</section>

{{-- Intro --}}
<section class="py-10 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <p class="text-gray-700 text-base leading-relaxed">
            En Imdeporte creemos firmemente que el movimiento es el motor de una vida más saludable y feliz. Nuestro objetivo es acercar el bienestar
            a cada rincón de nuestro municipio a través de actividades accesibles, divertidas y pensadas para todas las edades. No importa tu nivel de
            experiencia; aquí encontrarás el espacio ideal para activarte, cuidar tu cuerpo y llenarte de energía.
        </p>
        <p class="text-gray-700 text-base leading-relaxed mt-4 font-semibold">
            ¡Descubre nuestros programas y ponte en movimiento con nosotros!
        </p>
    </div>
</section>

{{-- ACTIVIDADES --}}
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <h2 class="text-2xl font-extrabold text-center text-gray-800 mb-8">ACTIVIDADES</h2>
        <div class="relative">
            <div id="actividades-container" class="grid grid-cols-1 md:grid-cols-3 gap-6">

                @forelse($actividades as $act)
                <div class="actividad-card bg-white rounded-xl shadow border border-gray-100 flex flex-col items-center p-6 text-center">
                    @if($act->imagen)
                        <img src="{{ $act->imagen }}" alt="{{ $act->titulo }}" class="w-20 h-20 object-contain mb-4">
                    @else
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-running text-gray-400 text-3xl"></i>
                        </div>
                    @endif
                    <h3 class="font-extrabold text-gray-800 text-base mb-2">{{ $act->titulo }}</h3>
                    <p class="text-gray-500 text-sm mb-4">{{ $act->descripcion }}</p>
                    <a href="{{ $act->url ?? '#' }}" class="mt-auto bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-sm font-bold py-2 px-8 rounded-full transition">Ver más</a>
                </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-400">
                        <p>No hay actividades disponibles.</p>
                    </div>
                @endforelse

            </div>
            <button id="actividades-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-5 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full flex items-center justify-center text-white transition">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="actividades-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-5 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full flex items-center justify-center text-white transition">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div class="flex justify-center mt-8">
            <a href="#" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-bold py-3 px-8 rounded-full shadow transition">
                Ver todas las actividades
            </a>
        </div>
    </div>
</section>

{{-- SERVICIOS DE SALUD --}}
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <h2 class="text-2xl font-extrabold text-center text-gray-800 mb-8">SERVICIOS DE SALUD</h2>
        <div class="relative">
            <div id="servicios-container" class="grid grid-cols-1 md:grid-cols-3 gap-6">

                @forelse($servicios as $serv)
                <div class="servicio-card bg-white rounded-xl shadow border border-gray-100 flex flex-col items-center p-6 text-center">
                    @if($serv->imagen)
                        <img src="{{ $serv->imagen }}" alt="{{ $serv->titulo }}" class="w-20 h-20 object-contain mb-4">
                    @else
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-heartbeat text-gray-400 text-3xl"></i>
                        </div>
                    @endif
                    <h3 class="font-extrabold text-gray-800 text-base mb-2">{{ $serv->titulo }}</h3>
                    <p class="text-gray-500 text-sm mb-4">{{ $serv->descripcion }}</p>
                    <a href="{{ $serv->url ?? '#' }}" class="mt-auto bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-sm font-bold py-2 px-8 rounded-full transition">Ver más</a>
                </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-400">
                        <p>No hay servicios disponibles.</p>
                    </div>
                @endforelse

            </div>
            <button id="servicios-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-5 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full flex items-center justify-center text-white transition">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="servicios-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-5 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full flex items-center justify-center text-white transition">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <div class="flex justify-center mt-8">
            <a href="#" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-bold py-3 px-8 rounded-full shadow transition">
                Ver todos los servicios
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
    function initStaticCarousel(containerId, prevId, nextId, cardClass) {
        const container = document.getElementById(containerId);
        const prevBtn = document.getElementById(prevId);
        const nextBtn = document.getElementById(nextId);
        if (!container) return;
        const cards = Array.from(container.querySelectorAll('.' + cardClass));
        const perPage = window.innerWidth >= 768 ? 3 : 1;
        let page = 0;
        const totalPages = Math.ceil(cards.length / perPage);
        function showPage(p) {
            page = (p + totalPages) % totalPages;
            const itemsPerPage = window.innerWidth >= 768 ? 3 : 1;
            cards.forEach((card, i) => {
                card.style.display = (i >= page * itemsPerPage && i < (page + 1) * itemsPerPage) ? 'flex' : 'none';
            });
        }
        showPage(0);
        prevBtn?.addEventListener('click', () => showPage(page - 1));
        nextBtn?.addEventListener('click', () => showPage(page + 1));
    }
    initStaticCarousel('actividades-container', 'actividades-prev', 'actividades-next', 'actividad-card');
    initStaticCarousel('servicios-container', 'servicios-prev', 'servicios-next', 'servicio-card');
});
</script>
@endpush
