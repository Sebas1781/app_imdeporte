@extends('layouts.app')

@section('content')

{{-- ===================================================================== --}}
{{-- 1. HERO BANNER CAROUSEL                                                --}}
{{-- ===================================================================== --}}
<section class="relative overflow-hidden" id="hero-carousel">
    {{-- Carousel container --}}
    <div class="relative w-full" style="min-height: 420px;">
        <div id="carousel-slides" class="relative w-full h-full" style="min-height: 420px;">
            @forelse($carouselItems as $index => $slide)
                <div class="absolute inset-0 transition-opacity duration-700 ease-in-out" style="opacity: {{ $index === 0 ? '1' : '0' }}; z-index: {{ $index === 0 ? '10' : '1' }};">
                    <img src="{{ $slide->url_externa && trim($slide->url_externa) !== '' ? $slide->url_externa : $slide->imagen }}" alt="{{ $slide->titulo }}" class="w-full h-full object-cover" style="min-height:420px;">
                </div>
            @empty
                <div class="absolute inset-0 bg-linear-to-r from-[#00839B] to-[#45c6e0] flex items-center justify-center">
                    <p class="text-white text-lg">Sin imágenes en el carrusel</p>
                </div>
            @endforelse
        </div>

        {{-- Carousel navigation --}}
        <button id="carousel-prev" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 bg-white/80 hover:bg-white rounded-full flex items-center justify-center shadow-lg text-[#00839B] transition">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button id="carousel-next" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 bg-white/80 hover:bg-white rounded-full flex items-center justify-center shadow-lg text-[#00839B] transition">
            <i class="fas fa-chevron-right"></i>
        </button>

        {{-- Dots --}}
        <div id="carousel-dots" class="absolute bottom-4 left-1/2 -translate-x-1/2 z-20 flex gap-2">
            @foreach($carouselItems as $index => $slide)
                <button class="w-3 h-3 rounded-full transition-all {{ $index === 0 ? 'bg-white scale-110' : 'bg-white/50' }}" onclick="goToSlide({{ $index }})"></button>
            @endforeach
        </div>
    </div>

    {{-- Mobile WhatsApp CTA --}}
    <div class="md:hidden bg-linear-to-r from-[#00839B] to-[#45c6e0] p-4">
        <div class="bg-white rounded-xl shadow-lg p-5 max-w-sm mx-auto">
            <div class="flex items-center gap-3 mb-2">
                <img src="/images/odapasLogo.png" alt="Odapas" class="h-7 w-auto">
            </div>
            <p class="text-gray-800 font-bold text-base mb-0 leading-tight">ENVÍANOS UN MENSAJE A TRAVÉS DE</p>
            <div class="flex items-center gap-2 mb-3">
                <i class="fab fa-whatsapp text-green-500 text-2xl"></i>
                <span class="text-green-500 font-extrabold text-xl italic">WhatsApp!</span>
            </div>
            <a href="https://wa.me/" class="block bg-[#00839B] hover:bg-[#006d82] text-white font-bold py-2.5 px-4 rounded-lg text-center transition">
                CLICK AQUÍ
            </a>
        </div>
    </div>
</section>

{{-- ===================================================================== --}}
{{-- 2. UBICACIÓN DE CAJAS                                                  --}}
{{-- ===================================================================== --}}
<section class="py-6">
    <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-center gap-4">
        <div class="flex items-center gap-2 text-[#00839B]">
            <i class="fas fa-map-marker-alt text-xl"></i>
            <span class="text-sm font-medium">Ubicación de<br>cajas de pago</span>
        </div>
    </div>
</section>

{{-- ===================================================================== --}}
{{-- 3. SOBRE ODAPAS                                                        --}}
{{-- ===================================================================== --}}
<section class="py-8 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-[#00839B] mb-2">AGUA Y SANEAMIENTO DE TECÁMAC</h2>
        <p class="text-sm text-gray-500 mb-4 italic">Confiabilidad y compromiso con el Medio Ambiente y la ciudadanía</p>
        <p class="text-sm text-gray-600 leading-relaxed max-w-3xl mx-auto">
            Somos un organismo encargado de la prestar los servicios de agua potable, drenaje y alcantarillado de manera eficaz y eficiente, mediante
            políticas, estrategias, instrumentos y acciones que contribuyan a garantizar el abasto de agua potable de calidad, de manera continua y
            sustentable a la población del municipio de Tecámac, preocupándonos la satisfacción de los usuarios de los servicios a nuestro cargo, con
            rumbo al ODAPAS de Tecámac.
        </p>
    </div>
</section>

{{-- ===================================================================== --}}
{{-- 4. SERVICIOS                                                           --}}
{{-- ===================================================================== --}}
<section class="py-10 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl font-extrabold text-center text-gray-800 mb-8 tracking-wide">SERVICIOS</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            {{-- Servicio 1: Tarifas --}}
            <a href="#" class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#00839B]/30 transition p-6 flex flex-col items-center text-center">
                <img src="/images/tarifasIcono.png" alt="Tarifas" class="w-14 h-14 object-contain mb-3">
                <span class="text-sm font-semibold text-gray-700">Tarifas</span>
            </a>
            {{-- Servicio 2: Trámites y Servicios --}}
            <a href="#" class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#00839B]/30 transition p-6 flex flex-col items-center text-center">
                <img src="/images/TramitesServiviosIcono.png" alt="Trámites y Servicios" class="w-14 h-14 object-contain mb-3">
                <span class="text-sm font-semibold text-gray-700">Trámites y Servicios</span>
            </a>
            {{-- Servicio 3: Pago en línea --}}
            <a href="https://plataforma.odapas.tecamac.gob.mx/SF/atl.ui.wppagoelectronico.aspx" target="_blank" class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#00839B]/30 transition p-6 flex flex-col items-center text-center">
                <img src="/images/pagoLineaIcono.png" alt="Pago en línea" class="w-14 h-14 object-contain mb-3">
                <span class="text-sm font-semibold text-gray-700">Pago en línea</span>
            </a>
            {{-- Servicio 4: Contacto --}}
            <a href="#" class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#00839B]/30 transition p-6 flex flex-col items-center text-center">
                <img src="/images/contactoIcono.png" alt="Contacto" class="w-14 h-14 object-contain mb-3">
                <span class="text-sm font-semibold text-gray-700">Contacto</span>
            </a>
            {{-- Servicio 5: Buzón de Quejas --}}
            <a href="#" class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#00839B]/30 transition p-6 flex flex-col items-center text-center">
                <img src="/images/BuzonQuejasIcono.png" alt="Buzón de Quejas" class="w-14 h-14 object-contain mb-3">
                <span class="text-sm font-semibold text-gray-700">Buzón de Quejas</span>
            </a>
            {{-- Servicio 6: Eliminación de datos --}}
            <a href="#" class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#00839B]/30 transition p-6 flex flex-col items-center text-center">
                <img src="/images/EliminarDatosIcono.png" alt="Eliminación de datos" class="w-14 h-14 object-contain mb-3">
                <span class="text-sm font-semibold text-gray-700">Eliminación de datos</span>
            </a>
            {{-- Servicio 7: Facturación electrónica --}}
            <a href="#" class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#00839B]/30 transition p-6 flex flex-col items-center text-center">
                <img src="/images/FacturaElectronicaIcono.png" alt="Facturación electrónica" class="w-14 h-14 object-contain mb-3">
                <span class="text-sm font-semibold text-gray-700">Facturación electrónica</span>
            </a>
            {{-- Servicio 8: Recuperar factura --}}
            <a href="#" class="group bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-[#00839B]/30 transition p-6 flex flex-col items-center text-center">
                <img src="/images/RecuperarFacturaIcono.png" alt="Recuperar factura" class="w-14 h-14 object-contain mb-3">
                <span class="text-sm font-semibold text-gray-700">Recuperar factura</span>
            </a>
        </div>

        {{-- Botón Transparencia --}}
        <div class="flex justify-center">
            <a href="#" class="inline-flex items-center gap-2 text-[#c2185b] hover:text-[#a01550] font-bold py-3 px-6 rounded-full transition text-sm">
                <i class="fas fa-shield-alt text-[#c2185b]"></i>
                Transparencia
                <i class="fas fa-chevron-right text-xs"></i>
            </a>
        </div>
    </div>
</section>

{{-- ===================================================================== --}}
{{-- 5. BOLETINES DE INTERÉS                                                --}}
{{-- ===================================================================== --}}
{{-- Banner de boletines --}}
<section class="relative">
    <div class="w-full">
        <img src="/images/Boletinesbaner.png" alt="Boletines de Interés" class="w-full h-auto object-cover" style="max-height: 650px;">

    </div>
</section>

{{-- Cards de boletines (cargados desde BD - los más recientes automáticamente) --}}
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        {{-- Boletines carousel --}}
        <div class="relative">
            <div id="boletines-container" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($boletines as $boletin)
                    <a href="{{ route('boletines.show', $boletin) }}" {{ $boletin->url_externa ? 'target=_blank' : '' }} class="bg-white rounded-xl shadow-lg overflow-hidden group border border-gray-100 boletin-card hover:shadow-xl transition" style="display: none;">
                        <div class="h-48 overflow-hidden">
                            @if($boletin->imagen)
                                <img src="{{ $boletin->imagen }}" alt="{{ $boletin->titulo }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-newspaper text-gray-400 text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <span class="text-xs font-bold text-[#00839B] bg-[#e8f7fa] px-2 py-1 rounded">{{ $boletin->fecha->translatedFormat('d F, Y') }}</span>
                            <h4 class="text-gray-800 font-bold mt-3 text-sm leading-snug">{{ $boletin->titulo }}</h4>
                            <p class="text-gray-500 text-xs mt-2">{{ Str::limit($boletin->descripcion, 100) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-400">
                        <i class="fas fa-newspaper text-3xl mb-2 block"></i>
                        <p>No hay boletines disponibles.</p>
                    </div>
                @endforelse
            </div>

            {{-- Navigation arrows --}}
            <button id="boletines-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-[#00839B] hover:bg-[#006d82] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="boletines-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-[#00839B] hover:bg-[#006d82] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        {{-- Dots --}}
        <div id="boletines-dots" class="flex justify-center gap-2 mt-6"></div>

        {{-- Ver todos --}}
        <div class="flex justify-center mt-6">
            <a href="{{ route('boletines.index') }}" class="inline-flex items-center gap-2 bg-[#00839B] hover:bg-[#006d82] text-white font-bold py-3 px-8 rounded-full shadow transition">
                <i class="fas fa-newspaper"></i> Ver todos los boletines
            </a>
        </div>
    </div>
</section>

{{-- ===================================================================== --}}
{{-- 6. IMAGEN MUNICIPIO MEJOR (Tanque de agua)                            --}}
{{-- ===================================================================== --}}
<section class="relative">
    <img src="/images/municipioMejor.png" alt="El Municipio Mejor" class="w-full h-auto object-cover" style="max-height: 500px;">
    <br>
    <br>
</section>

{{-- ===================================================================== --}}
{{-- 7. DESCARGA LA APP                                                     --}}
{{-- ===================================================================== --}}
<section class="relative py-14 overflow-hidden">
    {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="/images/Appfondo.png" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-[#00839B]/70"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-10">
            {{-- Phone mockup --}}
            <div class="shrink-0">
                <div class="relative w-52 h-96 bg-white rounded-[2.5rem] shadow-2xl border-4 border-gray-300 overflow-hidden">
                    {{-- Notch --}}
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-24 h-6 bg-black rounded-b-2xl z-10"></div>
                    {{-- Screen content: screenmovil.png --}}
                    <img src="/images/srcreenmovil.png" alt="ODAPAS App" class="w-full h-full object-cover">
                </div>
            </div>

            {{-- Text + download --}}
            <div class="text-center md:text-left">
                <h3 class="text-3xl font-extrabold text-white mb-4">Descarga la App</h3>
                <a href="https://play.google.com/store/apps/details?id=com.artech.appodapasgx18.appciudadana&pli=1" class="inline-flex items-center gap-3 bg-black hover:bg-gray-800 text-white font-semibold py-3 px-6 rounded-lg shadow-lg transition">
                    <i class="fab fa-google-play text-2xl"></i>
                    <div class="text-left">
                        <span class="text-[10px] uppercase tracking-wider block">Disponible en</span>
                        <span class="text-base font-bold">Google Play</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===================================================================== --}}
{{-- 8. REPORTES (Card style)                                               --}}
{{-- ===================================================================== --}}
<section class="py-12 bg-white">
    <div class="max-w-sm mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 text-center">
            {{-- Card Icon --}}
            <div class="flex justify-center mb-4">
                <img src="/images/CardIcon.png" alt="Reportes" class="w-20 h-20 object-contain">
            </div>

            <h3 class="text-lg font-extrabold text-gray-800 mb-4">¡Haz tus reportes aquí!</h3>

            <ul class="text-left text-gray-600 text-sm space-y-2 mb-6">
                <li class="flex items-start gap-2"><span class="mt-0.5">•</span> Toma tapada</li>
                <li class="flex items-start gap-2"><span class="mt-0.5">•</span> Dotación de agua por medio de pipa</li>
                <li class="flex items-start gap-2"><span class="mt-0.5">•</span> Desazolve</li>
                <li class="flex items-start gap-2"><span class="mt-0.5">•</span> Fugas de agua</li>
                <li class="flex items-start gap-2"><span class="mt-0.5">•</span> Agua contaminada</li>
                <li class="flex items-start gap-2"><span class="mt-0.5">•</span> Socavón</li>
            </ul>

            <a href="#" class="inline-block bg-[#5c1a3a] hover:bg-[#4a1530] text-white font-bold py-3 px-10 rounded-full shadow-md transition">
                Reportar
            </a>
        </div>
    </div>
</section>

{{-- ===================================================================== --}}
{{-- 9. REDES SOCIALES INSTITUCIONALES                                      --}}
{{-- ===================================================================== --}}
<section class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
        <h3 class="text-xl font-extrabold text-center text-gray-800 mb-8 tracking-wide">REDES SOCIALES INSTITUCIONALES</h3>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-5">
            {{-- Card Tecámac --}}
            <a href="https://tecamac.gob.mx/" target="_blank" class="group flex flex-col">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden group-hover:shadow-xl transition">
                    <div class="h-32 overflow-hidden">
                        <img src="/images/tecamacCard.png" alt="Tecámac" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-3 flex items-center gap-2">
                        <img src="/images/logoTecamac.png" alt="Logo Tecámac" class="h-8 w-auto">
                        <i class="fas fa-chevron-right text-gray-400 text-xs ml-auto"></i>
                    </div>
                </div>
            </a>
            {{-- Card DIF Tecámac --}}
            <a href="https://dif.tecamac.gob.mx/" target="_blank" class="group flex flex-col">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden group-hover:shadow-xl transition">
                    <div class="h-32 overflow-hidden">
                        <img src="/images/imgDif.png" alt="DIF Tecámac" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-3 flex items-center gap-2">
                        <img src="/images/logoDif.png" alt="Logo DIF" class="h-8 w-auto">
                        <i class="fas fa-chevron-right text-gray-400 text-xs ml-auto"></i>
                    </div>
                </div>
            </a>
            {{-- Card ODAPAS --}}
            <a href="https://www.facebook.com/profile.php?id=100068195911608#" target="_blank" class="group flex flex-col">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden group-hover:shadow-xl transition">
                    <div class="h-32 overflow-hidden">
                        <img src="/images/imgOdaspas.png" alt="ODAPAS" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-3 flex items-center gap-2">
                        <img src="/images/odapasLogo.png" alt="Logo ODAPAS" class="h-8 w-auto">
                        <i class="fas fa-chevron-right text-gray-400 text-xs ml-auto"></i>
                    </div>
                </div>
            </a>
            {{-- Card Guardia Civil --}}
            <a href="https://www.facebook.com/ComisariaSPTecamac/" target="_blank" class="group flex flex-col">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden group-hover:shadow-xl transition">
                    <div class="h-32 overflow-hidden">
                        <img src="/images/imgGuardiaCivil.png" alt="Guardia Civil" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-3 flex items-center gap-2">
                        <img src="/images/logoGuardiaCivil.png" alt="Logo Guardia Civil" class="h-8 w-auto">
                        <i class="fas fa-chevron-right text-gray-400 text-xs ml-auto"></i>
                    </div>
                </div>
            </a>
            {{-- Card ImDeporte --}}
            <a href="https://www.facebook.com/UMCFyD/" target="_blank" class="group flex flex-col">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden group-hover:shadow-xl transition">
                    <div class="h-32 overflow-hidden">
                        <img src="/images/imgImDeporte.png" alt="ImDeporte" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="p-3 flex items-center gap-2">
                        <img src="/images/logoImdeporte.png" alt="Logo ImDeporte" class="h-8 w-auto">
                        <i class="fas fa-chevron-right text-gray-400 text-xs ml-auto"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ==========================================
    // HERO CAROUSEL - Server-rendered slides
    // ==========================================
    const slidesContainer = document.getElementById('carousel-slides');
    const dotsContainer = document.getElementById('carousel-dots');
    const prevBtn = document.getElementById('carousel-prev');
    const nextBtn = document.getElementById('carousel-next');
    const allSlides = slidesContainer ? slidesContainer.children : [];
    const allDots = dotsContainer ? dotsContainer.children : [];
    let currentSlide = 0;
    let autoplayInterval;

    function goToSlide(index) {
        if (allSlides[currentSlide]) {
            allSlides[currentSlide].style.opacity = '0';
            allSlides[currentSlide].style.zIndex = '1';
        }
        if (allDots[currentSlide]) {
            allDots[currentSlide].className = 'w-3 h-3 rounded-full transition-all bg-white/50';
        }

        currentSlide = index;
        if (allSlides[currentSlide]) {
            allSlides[currentSlide].style.opacity = '1';
            allSlides[currentSlide].style.zIndex = '10';
        }
        if (allDots[currentSlide]) {
            allDots[currentSlide].className = 'w-3 h-3 rounded-full transition-all bg-white scale-110';
        }
    }

    // Expose goToSlide globally for inline onclick
    window.goToSlide = goToSlide;

    function nextSlide() {
        goToSlide((currentSlide + 1) % allSlides.length);
    }

    function prevSlideAction() {
        goToSlide((currentSlide - 1 + allSlides.length) % allSlides.length);
    }

    function startAutoplay() {
        if (allSlides.length > 1) {
            autoplayInterval = setInterval(nextSlide, 5000);
        }
    }

    prevBtn?.addEventListener('click', () => {
        clearInterval(autoplayInterval);
        prevSlideAction();
        startAutoplay();
    });

    nextBtn?.addEventListener('click', () => {
        clearInterval(autoplayInterval);
        nextSlide();
        startAutoplay();
    });

    startAutoplay();

    // ==========================================
    // BOLETINES CAROUSEL - Server-rendered cards
    // ==========================================
    const boletinesContainer = document.getElementById('boletines-container');
    const boletinesDots = document.getElementById('boletines-dots');
    const boletinesPrev = document.getElementById('boletines-prev');
    const boletinesNext = document.getElementById('boletines-next');

    if (boletinesContainer) {
        const cards = boletinesContainer.querySelectorAll('.boletin-card');
        const perPage = 3;
        let currentPage = 0;
        const totalPages = Math.ceil(cards.length / perPage);

        function showBoletinesPage(page) {
            currentPage = page;
            cards.forEach((card, i) => {
                const start = page * perPage;
                const end = start + perPage;
                card.style.display = (i >= start && i < end) ? 'block' : 'none';
            });

            // Update dots
            if (boletinesDots) {
                Array.from(boletinesDots.children).forEach((dot, i) => {
                    dot.className = `w-3 h-3 rounded-full transition-all ${i === currentPage ? 'bg-[#00839B] scale-110' : 'bg-gray-300'}`;
                });
            }
        }

        // Create dots
        if (boletinesDots && totalPages > 1) {
            for (let i = 0; i < totalPages; i++) {
                const dot = document.createElement('button');
                dot.className = `w-3 h-3 rounded-full transition-all ${i === 0 ? 'bg-[#00839B] scale-110' : 'bg-gray-300'}`;
                dot.addEventListener('click', () => showBoletinesPage(i));
                boletinesDots.appendChild(dot);
            }
        }

        // Show first page
        showBoletinesPage(0);

        boletinesPrev?.addEventListener('click', () => {
            showBoletinesPage((currentPage - 1 + totalPages) % totalPages);
        });

        boletinesNext?.addEventListener('click', () => {
            showBoletinesPage((currentPage + 1) % totalPages);
        });
    }
});
</script>
@endpush
