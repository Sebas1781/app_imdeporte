@extends('layouts.app')

@section('title', 'Instituto - IMDEPORTE Tecámac')

@section('content')

{{-- Hero Banner --}}
<section class="relative w-full overflow-hidden" style="height: 340px;">
    <img src="/images/INSTITUTO.jpg" alt="Instituto" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold tracking-wide drop-shadow-lg">INSTITUTO</h1>
        <p class="text-white/90 text-xl md:text-2xl mt-3 drop-shadow">Acerca de</p>
    </div>
</section>

{{-- Descripción --}}
<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <p class="text-gray-600 text-base leading-relaxed">
            Como parte de la política social del Gobierno Municipal de Tecámac, el Instituto Municipal de Cultura Física y Deporte (IMDEPORTE) tiene como
            misión fomentar la cultura física y el deporte a través de programas y acciones coordinadas con organismos públicos y privados para
            mejorar la calidad de vida de los tecamaquenses.
        </p>
    </div>
</section>

{{-- Titular --}}
<section class="py-12 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6 flex flex-col items-center">
        <div class="relative">
            <img src="/images/mtro%20manuel.png" alt="Titular" class="w-64 h-64 object-cover rounded-2xl shadow-lg">
            <div class="absolute bottom-0 left-0 right-0 bg-[#7B2D8E]/90 rounded-b-2xl p-4">
                <h3 class="text-white font-bold text-lg">Titular: Mtro. Manuel Fuentes Figueroa</h3>
                <p class="text-white/80 text-sm">Director General del Imdeporte</p>
            </div>
        </div>
    </div>
</section>

{{-- Estructura Orgánica --}}
<section class="py-12 bg-white">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-2xl font-extrabold text-center text-gray-800 mb-10">Estructura orgánica</h2>

        <div class="flex flex-col items-center gap-3">
            {{-- Nivel 1 --}}
            <div class="w-full max-w-md bg-[#7B2D8E] text-white text-center py-3 px-6 rounded-full font-semibold shadow">
                Consejo Directivo
            </div>
            <div class="w-full max-w-md bg-[#7B2D8E] text-white text-center py-3 px-6 rounded-full font-semibold shadow">
                Órgano Interno de Control
            </div>
            <div class="w-full max-w-md bg-[#7B2D8E] text-white text-center py-3 px-6 rounded-full font-semibold shadow">
                Dirección General
            </div>

            {{-- Nivel 2 --}}
            <div class="w-full max-w-md bg-[#A855A0] text-white text-center py-3 px-6 rounded-full font-semibold shadow mt-2">
                Coordinación Administrativa
            </div>
            <div class="w-full max-w-md bg-[#A855A0] text-white text-center py-3 px-6 rounded-full font-semibold shadow">
                Coordinación de Cultura Física y del Deporte
            </div>

            {{-- Nivel 3 --}}
            <div class="w-full max-w-md bg-[#C084CF] text-white text-center py-3 px-6 rounded-full font-semibold shadow mt-2">
                Departamento de Cultura Física
            </div>
            <div class="w-full max-w-md bg-[#C084CF] text-white text-center py-3 px-6 rounded-full font-semibold shadow">
                Departamento de Promoción y Fomento al Deporte
            </div>
        </div>
    </div>
</section>

{{-- Imagen pie --}}
<section class="relative">
    <img src="/images/pie.png" alt="IMDEPORTE Tecámac" class="w-full h-auto object-cover">
</section>

@endsection
