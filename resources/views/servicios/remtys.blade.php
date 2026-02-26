@extends('layouts.app')

@section('title', 'REMTYS - IMDEPORTE Tecámac')

@section('content')

{{-- Banner --}}
<section class="relative w-full overflow-hidden" style="height: 320px;">
    <div class="absolute inset-0 bg-gradient-to-br from-[#7B2D8E] via-[#9B3DAE] to-[#5c1a6e]"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: url('/images/fondo1.jpg'); background-size: cover; background-position: center;"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold tracking-wider drop-shadow-lg">REMTYS</h1>
        <div class="w-16 h-1 bg-white/60 rounded-full mt-4 mb-5"></div>
        <p class="text-white/90 text-base md:text-lg max-w-2xl leading-relaxed">
            Conoce el Registro Municipal de Trámites y Servicios (REMTYS), una herramienta diseñada para
            brindar a la ciudadanía información clara, precisa y actualizada sobre los trámites y servicios que
            ofrece el municipio. Aquí encontrarás requisitos, costos, tiempos de atención y puntos de
            contacto, fomentando la transparencia, la eficiencia administrativa y el derecho a un buen
            servicio público.
        </p>
    </div>
</section>

{{-- Cards de dependencias --}}
<section class="py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Card 1 --}}
            <a href="#" class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 block"
               style="background: linear-gradient(135deg, #8B5CF6, #7B2D8E);">
                <div class="absolute top-4 left-4 opacity-20 text-white text-6xl">
                    <i class="fas fa-check-double"></i>
                </div>
                <div class="absolute top-4 right-4 opacity-20 text-white text-6xl">
                    <i class="fas fa-check-double"></i>
                </div>
                <div class="relative z-10 p-7 pb-10">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-balance-scale text-white text-lg"></i>
                    </div>
                    <h3 class="text-white font-bold text-lg leading-snug">Consejería Jurídica</h3>
                </div>
                <div class="bg-white/10 px-7 py-3 flex items-center justify-between">
                    <span class="text-white/80 text-sm">Ver trámites</span>
                    <i class="fas fa-arrow-right text-white/80 text-sm group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

            {{-- Card 2 --}}
            <a href="#" class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 block"
               style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                <div class="absolute top-4 left-4 opacity-20 text-white text-6xl">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="absolute top-4 right-4 opacity-20 text-white text-6xl">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="relative z-10 p-7 pb-10">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-coins text-white text-lg"></i>
                    </div>
                    <h3 class="text-white font-bold text-lg leading-snug">Tesorería Municipal</h3>
                </div>
                <div class="bg-white/10 px-7 py-3 flex items-center justify-between">
                    <span class="text-white/80 text-sm">Ver trámites</span>
                    <i class="fas fa-arrow-right text-white/80 text-sm group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

            {{-- Card 3 --}}
            <a href="#" class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 block"
               style="background: linear-gradient(135deg, #3B82F6, #1d4ed8);">
                <div class="absolute top-4 left-4 opacity-20 text-white text-6xl">
                    <i class="fas fa-check"></i>
                </div>
                <div class="absolute top-4 right-4 opacity-20 text-white text-6xl">
                    <i class="fas fa-check"></i>
                </div>
                <div class="relative z-10 p-7 pb-10">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-white text-lg"></i>
                    </div>
                    <h3 class="text-white font-bold text-lg leading-snug">Órgano Interno de Control Municipal</h3>
                </div>
                <div class="bg-white/10 px-7 py-3 flex items-center justify-between">
                    <span class="text-white/80 text-sm">Ver trámites</span>
                    <i class="fas fa-arrow-right text-white/80 text-sm group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

        </div>
    </div>
</section>

{{-- ¿Qué es REMTYS? --}}
<section class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">¿Qué es REMTYS?</h2>
                <p class="text-gray-600 text-sm leading-relaxed mb-3">
                    El Registro Municipal de Trámites y Servicios es una plataforma que centraliza
                    toda la información sobre los procedimientos administrativos disponibles en el municipio.
                </p>
                <p class="text-[#7B2D8E] text-sm leading-relaxed">
                    Nuestro objetivo es facilitar el acceso a la información y mejorar la experiencia
                    de los ciudadanos al realizar trámites y solicitar servicios municipales.
                </p>
            </div>

            <div class="bg-[#7B2D8E] rounded-2xl shadow-sm p-8 text-white">
                <h2 class="text-xl font-bold mb-5">Beneficios</h2>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3 text-sm">
                        <i class="fas fa-check-circle text-white/80"></i>
                        Información clara y detallada de cada trámite
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <i class="fas fa-check-circle text-white/80"></i>
                        Tiempos de respuesta estimados
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <i class="fas fa-check-circle text-white/80"></i>
                        Requisitos y documentación necesaria
                    </li>
                    <li class="flex items-center gap-3 text-sm">
                        <i class="fas fa-check-circle text-white/80"></i>
                        Costos y formas de pago
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
