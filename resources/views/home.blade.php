@extends('layouts.app')

@section('content')

{{-- ===================================================================== --}}
{{-- 1. HERO BANNER CAROUSEL                                                --}}
{{-- ===================================================================== --}}
<section class="relative overflow-hidden" id="hero-carousel">
    <div class="relative w-full" style="min-height: 420px;">
        <div id="carousel-slides" class="relative w-full h-full" style="min-height: 420px;">
            @forelse($carouselItems as $index => $slide)
                <div class="absolute inset-0 transition-opacity duration-700 ease-in-out" style="opacity: {{ $index === 0 ? '1' : '0' }}; z-index: {{ $index === 0 ? '10' : '1' }};">
                    <img src="{{ $slide->url_externa && trim($slide->url_externa) !== '' ? $slide->url_externa : $slide->imagen }}" alt="{{ $slide->titulo }}" class="w-full h-full object-cover" style="min-height:420px;">
                </div>
            @empty
                <div class="absolute inset-0 bg-linear-to-r from-[#7B2D8E] to-[#A855A0] flex items-center justify-center">
                    <p class="text-white text-lg">Sin imágenes en el carrusel</p>
                </div>
            @endforelse
        </div>

        <button id="carousel-prev" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 bg-white/80 hover:bg-white rounded-full flex items-center justify-center shadow-lg text-[#7B2D8E] transition">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button id="carousel-next" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 bg-white/80 hover:bg-white rounded-full flex items-center justify-center shadow-lg text-[#7B2D8E] transition">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div id="carousel-dots" class="absolute bottom-4 left-1/2 -translate-x-1/2 z-20 flex gap-2">
            @foreach($carouselItems as $index => $slide)
                <button class="w-3 h-3 rounded-full transition-all {{ $index === 0 ? 'bg-white scale-110' : 'bg-white/50' }}" onclick="goToSlide({{ $index }})"></button>
            @endforeach
        </div>
    </div>
</section>


{{-- ===================================================================== --}}
{{-- 2. CONVOCATORIAS                                                       --}}
{{-- ===================================================================== --}}
<section class="relative w-full overflow-hidden" style="height: 280px;">
    <img src="/images/convocatorias.jpg" alt="Convocatorias" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg">CONVOCATORIAS</h2>
        <p class="text-white/90 text-lg md:text-xl mt-3 drop-shadow">Conoce los últimos eventos de nuestro municipio.</p>
    </div>
</section>

{{-- Cards de convocatorias --}}
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="relative">
            <div id="convocatorias-container" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($convocatorias as $convocatoria)
                    <a href="{{ route('convocatorias.show', $convocatoria) }}" {{ $convocatoria->url_externa ? 'target=_blank' : '' }} class="bg-white rounded-xl shadow-lg overflow-hidden group border border-gray-100 convocatoria-card hover:shadow-xl transition" style="display: none;">
                        <div class="h-48 overflow-hidden">
                            @if($convocatoria->imagen)
                                <img src="{{ $convocatoria->imagen }}" alt="{{ $convocatoria->titulo }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-bullhorn text-gray-400 text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <span class="text-xs font-bold text-[#7B2D8E] bg-[#f3e8f7] px-2 py-1 rounded">{{ $convocatoria->fecha->translatedFormat('d F, Y') }}</span>
                            <h4 class="text-gray-800 font-bold mt-3 text-sm leading-snug">{{ $convocatoria->titulo }}</h4>
                            <p class="text-gray-500 text-xs mt-2">{{ Str::limit($convocatoria->descripcion, 100) }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-400">
                        <i class="fas fa-bullhorn text-3xl mb-2 block"></i>
                        <p>No hay convocatorias disponibles.</p>
                    </div>
                @endforelse
            </div>

            <button id="convocatorias-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="convocatorias-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div id="convocatorias-dots" class="flex justify-center gap-2 mt-6"></div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('convocatorias.index') }}" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-bold py-3 px-8 rounded-full shadow transition">
                <i class="fas fa-bullhorn"></i> Ver todas las convocatorias
            </a>
        </div>
    </div>
</section>


{{-- ===================================================================== --}}
{{-- 3. NOTICIAS DE INTERÉS (BOLETINES)                                     --}}
{{-- ===================================================================== --}}
<section class="relative w-full overflow-hidden" style="height: 280px;">
    <img src="/images/noticias_interes.jpg" alt="Noticias de Interés" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h2 class="text-white text-4xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg">NOTICIAS DE INTERÉS</h2>
        <p class="text-white/90 text-lg md:text-xl mt-3 drop-shadow">Entérate de las últimas noticias del municipio.</p>
    </div>
</section>

{{-- Cards de boletines --}}
<section class="py-10 bg-white">
    <div class="max-w-6xl mx-auto px-4">
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
                            <span class="text-xs font-bold text-[#7B2D8E] bg-[#f3e8f7] px-2 py-1 rounded">{{ $boletin->fecha->translatedFormat('d F, Y') }}</span>
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

            <button id="boletines-prev" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="boletines-next" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-10 h-10 bg-[#7B2D8E] hover:bg-[#5c1a6e] shadow-lg rounded-full items-center justify-center text-white transition hidden md:flex">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <div id="boletines-dots" class="flex justify-center gap-2 mt-6"></div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('boletines.index') }}" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-bold py-3 px-8 rounded-full shadow transition">
                <i class="fas fa-newspaper"></i> Últimas noticias
            </a>
        </div>
    </div>
</section>

{{-- ===================================================================== --}}
{{-- 4. IMAGEN MUNICIPIO MEJOR                                              --}}
{{-- ===================================================================== --}}
<section class="relative">
    <img src="/images/municipioMejor.png" alt="El Municipio Mejor" class="w-full h-auto object-cover" style="max-height: 500px;">
</section>


{{-- ===================================================================== --}}
{{-- 5. REDES SOCIALES INSTITUCIONALES                                      --}}
{{-- ===================================================================== --}}
<section class="py-12 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4">
        <h3 class="text-xl font-extrabold text-center text-gray-800 mb-8 tracking-wide">REDES SOCIALES INSTITUCIONALES</h3>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-5">
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

{{-- ===================================================================== --}}
{{-- 6. IMAGEN PIE (personitas animadas)                                    --}}
{{-- ===================================================================== --}}
<section class="relative">
    <img src="/images/pie.png" alt="IMDEPORTE Tecámac" class="w-full h-auto object-cover">
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ==========================================
    // HERO CAROUSEL
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

    prevBtn?.addEventListener('click', () => { clearInterval(autoplayInterval); prevSlideAction(); startAutoplay(); });
    nextBtn?.addEventListener('click', () => { clearInterval(autoplayInterval); nextSlide(); startAutoplay(); });
    startAutoplay();

    // ==========================================
    // GENERIC CARD CAROUSEL
    // ==========================================
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

    initCardCarousel('boletines-container', 'boletines-dots', 'boletines-prev', 'boletines-next', 'boletin-card');
    initCardCarousel('convocatorias-container', 'convocatorias-dots', 'convocatorias-prev', 'convocatorias-next', 'convocatoria-card');
});
</script>
@endpush
