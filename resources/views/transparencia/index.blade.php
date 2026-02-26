@extends('layouts.app')

@section('title', 'Transparencia - IMDEPORTE Tecámac')

@section('content')

{{-- Hero Banner --}}
<section class="relative w-full overflow-hidden" style="height: 340px;">
    <img src="/images/INSTITUTO.jpg" alt="Transparencia" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold tracking-wide drop-shadow-lg">TRANSPARENCIA</h1>
    </div>
</section>

{{-- Contenido --}}
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-extrabold text-gray-800 mb-4">Transparencia y Rendición de Cuentas</h2>
            <p class="text-gray-600 text-base leading-relaxed">
                En cumplimiento con la Ley de Transparencia y Acceso a la Información Pública del Estado de México,
                el IMDEPORTE pone a disposición de la ciudadanía la información correspondiente a su gestión.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="#" class="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-[#7B2D8E] hover:shadow-md transition group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center shrink-0">
                        <i class="fas fa-file-alt text-[#7B2D8E] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 group-hover:text-[#7B2D8E] transition">Obligaciones de Transparencia</h3>
                        <p class="text-gray-500 text-sm">Información pública de oficio</p>
                    </div>
                </div>
            </a>
            <a href="#" class="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-[#7B2D8E] hover:shadow-md transition group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center shrink-0">
                        <i class="fas fa-search text-[#7B2D8E] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 group-hover:text-[#7B2D8E] transition">Solicitudes de Información</h3>
                        <p class="text-gray-500 text-sm">Acceso a la información pública</p>
                    </div>
                </div>
            </a>
            <a href="#" class="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-[#7B2D8E] hover:shadow-md transition group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center shrink-0">
                        <i class="fas fa-shield-alt text-[#7B2D8E] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 group-hover:text-[#7B2D8E] transition">Aviso de Privacidad</h3>
                        <p class="text-gray-500 text-sm">Protección de datos personales</p>
                    </div>
                </div>
            </a>
            <a href="#" class="bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-[#7B2D8E] hover:shadow-md transition group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center shrink-0">
                        <i class="fas fa-balance-scale text-[#7B2D8E] text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-800 group-hover:text-[#7B2D8E] transition">Marco Normativo</h3>
                        <p class="text-gray-500 text-sm">Leyes, reglamentos y lineamientos</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- Imagen pie --}}
<section class="relative">
    <img src="/images/pie.png" alt="IMDEPORTE Tecámac" class="w-full h-auto object-cover">
</section>

@endsection
