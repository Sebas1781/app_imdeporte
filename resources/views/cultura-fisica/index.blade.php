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

                <div class="actividad-card bg-white rounded-xl shadow border border-gray-100 flex flex-col items-center p-6 text-center">
                    <img src="/images/ICONOS%20DEPORTE/ATLETISMO.png" alt="Eventos Deportivos" class="w-20 h-20 object-contain mb-4">
                    <h3 class="font-extrabold text-gray-800 text-base mb-2">EVENTOS DEPORTIVOS</h3>
                    <p class="text-gray-500 text-sm mb-4">El Imdeporte promueve la cultura física mediante eventos como carreras atléticas, torneos de fútbol, básquetbol y voleibol. Haz clic en la categoría de tu interés para conocer los detalles de cada evento.</p>
                    <a href="#" class="mt-auto bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-sm font-bold py-2 px-8 rounded-full transition">Ver más</a>
                </div>

                <div class="actividad-card bg-white rounded-xl shadow border border-gray-100 flex flex-col items-center p-6 text-center">
                    <img src="/images/ICONOS%20DEPORTE/LEVANTAMIENTO-DE-PESAS.png" alt="Ponte Fitness" class="w-20 h-20 object-contain mb-4">
                    <h3 class="font-extrabold text-gray-800 text-base mb-2">PONTE FITNESS</h3>
                    <p class="text-gray-500 text-sm mb-4">Programa de activación física con clases gratuitas como baile deportivo, step y Pilates, dirigido a mujeres en Tecámac.</p>
                    <a href="#" class="mt-auto bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-sm font-bold py-2 px-8 rounded-full transition">Ver más</a>
                </div>

                <div class="actividad-card bg-white rounded-xl shadow border border-gray-100 flex flex-col items-center p-6 text-center">
                    <img src="/images/ICONOS%20DEPORTE/CICLISMO.png" alt="Actividades Recreativas" class="w-20 h-20 object-contain mb-4">
                    <h3 class="font-extrabold text-gray-800 text-base mb-2">ACTIVIDADES RECREATIVAS</h3>
                    <p class="text-gray-500 text-sm mb-4">El Imdeporte organiza rodadas, torneos y carreras recreativas para fomentar el desarrollo motor, la convivencia y los valores en niños y jóvenes.</p>
                    <a href="#" class="mt-auto bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-sm font-bold py-2 px-8 rounded-full transition">Ver más</a>
                </div>

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

                <div class="servicio-card bg-white rounded-xl shadow border border-gray-100 flex flex-col items-center p-6 text-center">
                    <img src="/images/ICONOS%20DEPORTE/GIMNASIA-ARTISTICA.png" alt="Fisioterapia" class="w-20 h-20 object-contain mb-4">
                    <h3 class="font-extrabold text-gray-800 text-base mb-2">FISIOTERAPIA</h3>
                    <p class="text-gray-500 text-sm mb-4">A través del área de Fisioterapia, se ofrecen terapias de rehabilitación para el público en general y deportistas de Tecámac, a bajos costos con el objetivo de otorgar el servicio de manera accesible.</p>
                    <a href="#" class="mt-auto bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-sm font-bold py-2 px-8 rounded-full transition">Ver más</a>
                </div>

                <div class="servicio-card bg-white rounded-xl shadow border border-gray-100 flex flex-col items-center p-6 text-center">
                    <img src="/images/ICONOS%20DEPORTE/GIMNASIA-RITMICA.png" alt="Orientaciones Físicas Nutricionales" class="w-20 h-20 object-contain mb-4">
                    <h3 class="font-extrabold text-gray-800 text-base mb-2">ORIENTACIONES FÍSICAS NUTRICIONALES</h3>
                    <p class="text-gray-500 text-sm mb-4">Se atiende de manera ambulatoria a parques públicos de Tecámac, donde acude personal capacitado del Imdeporte en materia de nutrición y cultura física.</p>
                    <a href="#" class="mt-auto bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-sm font-bold py-2 px-8 rounded-full transition">Ver más</a>
                </div>

                <div class="servicio-card bg-white rounded-xl shadow border border-gray-100 flex flex-col items-center p-6 text-center">
                    <img src="/images/ICONOS%20DEPORTE/NATACION.png" alt="Medicina Deportiva" class="w-20 h-20 object-contain mb-4">
                    <h3 class="font-extrabold text-gray-800 text-base mb-2">MEDICINA DEPORTIVA</h3>
                    <p class="text-gray-500 text-sm mb-4">Brindamos atención a los deportistas destacados del municipio de Tecámac; se centra en la prevención, diagnóstico y tratamiento de lesiones relacionadas con la actividad física y el deporte; brindar asesoramiento sobre entrenamientos.</p>
                    <a href="#" class="mt-auto bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-sm font-bold py-2 px-8 rounded-full transition">Ver más</a>
                </div>

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