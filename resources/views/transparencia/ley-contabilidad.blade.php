@extends('layouts.app')

@section('title', 'Ley General de Contabilidad Gubernamental - IMDEPORTE')

@section('content')

{{-- Banner --}}
<section class="relative w-full overflow-hidden" style="height: 320px;">
    <div class="absolute inset-0 bg-gradient-to-br from-[#7B2D8E] via-[#9B3DAE] to-[#5c1a6e]"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: url('/images/fondo1.jpg'); background-size: cover; background-position: center;"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6">
        <h1 class="text-white text-3xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg uppercase leading-tight max-w-3xl">
            Ley General de Contabilidad Gubernamental
        </h1>
        <div class="w-16 h-1 bg-white/60 rounded-full mt-4 mb-5"></div>
        <p class="text-white/90 text-base md:text-lg max-w-2xl leading-relaxed">
            Conoce las herramientas de transparencia, contabilidad y acceso a la información
            pública del Gobierno Municipal de Tecámac
        </p>
    </div>
</section>

{{-- Cards de sistemas --}}
<section class="py-14 bg-white">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">

            {{-- SEVAC --}}
            <a href="https://www.gob.mx/imta/acciones-y-programas/sistema-de-evaluacion-de-armonizacion-contable-sevac-250543" target="_blank" class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 block"
               style="background: linear-gradient(135deg, #10b981, #059669);">
                <div class="absolute inset-0 opacity-10 flex items-center justify-center text-white text-8xl font-black">
                    <span>SEVAC</span>
                </div>
                <div class="relative z-10 p-6 pb-10">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-file-alt text-white text-lg"></i>
                    </div>
                    <h3 class="text-white font-bold text-base leading-snug">SEVAC</h3>
                    <p class="text-white/75 text-xs mt-1 leading-snug">Sistema de Evaluación de Armonización Contable</p>
                </div>
                <div class="bg-white/15 px-6 py-3 flex items-center justify-between">
                    <span class="text-white/80 text-sm">Acceder</span>
                    <i class="fas fa-arrow-right text-white/80 text-sm group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

            {{-- CONAC --}}
            <a href="https://www.conac.gob.mx/" target="_blank" class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 block"
               style="background: linear-gradient(135deg, #6366f1, #4f46e5);">
                <div class="absolute inset-0 opacity-10 flex items-center justify-center text-white text-8xl font-black">
                    <span>CONAC</span>
                </div>
                <div class="relative z-10 p-6 pb-10">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-check-circle text-white text-lg"></i>
                    </div>
                    <h3 class="text-white font-bold text-base leading-snug">CONAC</h3>
                    <p class="text-white/75 text-xs mt-1 leading-snug">Consejo Nacional de Armonización Contable</p>
                </div>
                <div class="bg-white/15 px-6 py-3 flex items-center justify-between">
                    <span class="text-white/80 text-sm">Acceder</span>
                    <i class="fas fa-arrow-right text-white/80 text-sm group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

            {{-- IPOMEX --}}
            <a href="https://ipomex.org.mx/ipomex/#/" target="_blank" class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 block"
               style="background: linear-gradient(135deg, #06b6d4, #0891b2);">
                <div class="absolute inset-0 opacity-10 flex items-center justify-center text-white text-7xl font-black">
                    <span>IPOMEX</span>
                </div>
                <div class="relative z-10 p-6 pb-10">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-file-invoice text-white text-lg"></i>
                    </div>
                    <h3 class="text-white font-bold text-base leading-snug">IPOMEX</h3>
                    <p class="text-white/75 text-xs mt-1 leading-snug">Información Pública de Oficio Mexiquense</p>
                </div>
                <div class="bg-white/15 px-6 py-3 flex items-center justify-between">
                    <span class="text-white/80 text-sm">Acceder</span>
                    <i class="fas fa-arrow-right text-white/80 text-sm group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

            {{-- INFOEM --}}
            <a href="https://www.infoem.org.mx/es/content/informacion-publica" target="_blank" class="group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 block"
               style="background: linear-gradient(135deg, #f97316, #ea580c);">
                <div class="absolute inset-0 opacity-10 flex items-center justify-center text-white text-7xl font-black">
                    <span>INFOEM</span>
                </div>
                <div class="relative z-10 p-6 pb-10">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-info-circle text-white text-lg"></i>
                    </div>
                    <h3 class="text-white font-bold text-base leading-snug">INFOEM</h3>
                    <p class="text-white/75 text-xs mt-1 leading-snug">Instituto de Transparencia del Estado de México</p>
                </div>
                <div class="bg-white/15 px-6 py-3 flex items-center justify-between">
                    <span class="text-white/80 text-sm">Acceder</span>
                    <i class="fas fa-arrow-right text-white/80 text-sm group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>

        </div>
    </div>
</section>

{{-- Marco Normativo --}}
<section class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">Marco Normativo</h2>
        <p class="text-gray-500 text-sm text-center max-w-2xl mx-auto mb-10">
            La Ley General de Contabilidad Gubernamental tiene por objeto establecer los criterios generales que
            regirán la contabilidad gubernamental y la emisión de información financiera de los entes públicos.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h3 class="font-bold text-gray-800 mb-4">Objetivos</h3>
                <ul class="space-y-2 text-sm text-[#7B2D8E]">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#7B2D8E] shrink-0"></span>
                        Establecer criterios generales de contabilidad gubernamental
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#7B2D8E] shrink-0"></span>
                        Propiciar la armonización contable a nivel nacional
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#7B2D8E] shrink-0"></span>
                        Mejorar la calidad de la información financiera
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <h3 class="font-bold text-gray-800 mb-4">Beneficios</h3>
                <ul class="space-y-2 text-sm text-[#7B2D8E]">
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#7B2D8E] shrink-0"></span>
                        Transparencia en el manejo de recursos públicos
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#7B2D8E] shrink-0"></span>
                        Facilita la rendición de cuentas
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#7B2D8E] shrink-0"></span>
                        Comparabilidad de información financiera
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
