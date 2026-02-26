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

{{-- Contenido --}}
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-10">
            <h2 class="text-2xl font-extrabold text-gray-800 mb-4">Promoviendo la actividad física en Tecámac</h2>
            <p class="text-gray-600 text-base leading-relaxed">
                El departamento de Cultura Física del IMDEPORTE trabaja para fomentar hábitos saludables entre la población tecamaquense.
                A través de actividades recreativas, clases grupales y programas de acondicionamiento físico, buscamos que todos los ciudadanos
                tengan acceso a una vida más activa y saludable.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-heartbeat text-[#7B2D8E] text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Actividades Recreativas</h3>
                <p class="text-gray-600 text-sm">Zumba, yoga, acondicionamiento físico, activación física matutina y más actividades para toda la familia.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-users text-[#7B2D8E] text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Programas Comunitarios</h3>
                <p class="text-gray-600 text-sm">Actividades dirigidas a colonias y comunidades del municipio para promover la cultura física desde la base.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-child text-[#7B2D8E] text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Clases para Niños</h3>
                <p class="text-gray-600 text-sm">Programas especiales diseñados para los más pequeños, fomentando el deporte y la actividad física desde temprana edad.</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-medal text-[#7B2D8E] text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Eventos Especiales</h3>
                <p class="text-gray-600 text-sm">Carreras, caminatas y eventos masivos de activación física para la comunidad tecamaquense.</p>
            </div>
        </div>
    </div>
</section>

{{-- Imagen pie --}}
<section class="relative">
    <img src="/images/pie.png" alt="IMDEPORTE Tecámac" class="w-full h-auto object-cover">
</section>

@endsection
