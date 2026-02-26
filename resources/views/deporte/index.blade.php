@extends('layouts.app')

@section('title', 'Deporte - IMDEPORTE Tecámac')

@section('content')

{{-- Hero Banner --}}
<section class="relative w-full overflow-hidden" style="height: 340px;">
    <img src="/images/DEPORTE.jpg" alt="Deporte" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold tracking-wide drop-shadow-lg">DEPORTE</h1>
    </div>
</section>

{{-- Contenido --}}
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-extrabold text-gray-800 mb-4">Departamento de Promoción y Fomento al Deporte</h2>
            <p class="text-gray-600 text-base leading-relaxed">
                El IMDEPORTE se dedica a impulsar el talento deportivo de Tecámac. A través de ligas municipales, torneos,
                estímulos económicos y apoyo a deportistas de alto rendimiento, buscamos que nuestro municipio sea referencia
                en el deporte a nivel estatal y nacional.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-trophy text-[#7B2D8E] text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Ligas y Torneos</h3>
                <p class="text-gray-600 text-sm">Organización de ligas municipales en diversas disciplinas: fútbol, basquetbol, voleibol, atletismo y más.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-star text-[#7B2D8E] text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Alto Rendimiento</h3>
                <p class="text-gray-600 text-sm">Apoyo y seguimiento a deportistas tecamaquenses de alto rendimiento que representan al municipio.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-futbol text-[#7B2D8E] text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Escuelas Deportivas</h3>
                <p class="text-gray-600 text-sm">Escuelas de iniciación deportiva en diferentes disciplinas para niños y jóvenes del municipio.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-building text-[#7B2D8E] text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Infraestructura Deportiva</h3>
                <p class="text-gray-600 text-sm">Gestión y mantenimiento de espacios deportivos municipales para el uso de la comunidad.</p>
            </div>
        </div>
    </div>
</section>

{{-- Imagen pie --}}
<section class="relative">
    <img src="/images/pie.png" alt="IMDEPORTE Tecámac" class="w-full h-auto object-cover">
</section>

@endsection
