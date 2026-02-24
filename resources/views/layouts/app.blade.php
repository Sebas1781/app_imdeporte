<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IMDEPORTE - Instituto Municipal de Cultura Física y Deporte')</title>
    <link rel="icon" type="image/png" href="/images/logoImdeporte.png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app-CY5vtjM4.css') }}">
    @endif
</head>
<body class="font-sans antialiased bg-white text-gray-800">
    {{-- ===== TOP INFO BAR (Logo + Info + Social) ===== --}}
    <div class="bg-white border-b border-gray-200 hidden md:block">
        <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between">
            {{-- Logo --}}
            <a href="/" class="shrink-0">
                <img src="/images/logoImdeporte.png" alt="IMDEPORTE Tecámac" class="h-12 w-auto">
            </a>

            {{-- Info items --}}
            <div class="flex items-center gap-4 text-xs text-gray-600">
                <div class="flex items-center gap-1 bg-gray-50 rounded-full px-3 py-1">
                    <i class="fas fa-calendar-alt text-[#7B2D8E]"></i>
                    <span class="font-semibold text-[#7B2D8E]">Fecha</span>
                    <span id="top-date">--</span>
                </div>
                <div class="flex items-center gap-1 bg-gray-50 rounded-full px-3 py-1">
                    <i class="fas fa-clock text-[#7B2D8E]"></i>
                    <span class="font-semibold text-[#7B2D8E]">Hora local</span>
                    <span id="top-time">--</span>
                </div>
                <div class="flex items-center gap-1 bg-gray-50 rounded-full px-3 py-1">
                    <i class="fas fa-cloud-sun text-[#7B2D8E]"></i>
                    <span class="font-semibold text-[#7B2D8E]">Clima actual</span>
                    <span>26°C - cielo claro</span>
                </div>
                <div class="flex items-center gap-1 bg-gray-50 rounded-full px-3 py-1">
                    <i class="fas fa-wind text-[#7B2D8E]"></i>
                    <span class="font-semibold text-[#7B2D8E]">Calidad del aire</span>
                    <span>Regular (AQI 3)</span>
                </div>
                <div class="flex items-center gap-1 bg-red-50 rounded-full px-3 py-1 border border-red-200">
                    <i class="fas fa-car text-red-500"></i>
                    <span class="font-semibold text-red-500">Engomado verde</span>
                    <span class="text-red-600">1 y 2</span>
                </div>
            </div>

            {{-- Social icons --}}
            <div class="flex items-center gap-2">
                <a href="#" class="w-8 h-8 bg-[#1877F2] hover:bg-[#1565c0] rounded-full flex items-center justify-center text-white transition">
                    <i class="fab fa-facebook-f text-sm"></i>
                </a>
                <a href="#" class="w-8 h-8 bg-red-600 hover:bg-red-700 rounded-full flex items-center justify-center text-white transition">
                    <i class="fab fa-youtube text-sm"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- ===== NAVBAR ===== --}}
    <nav class="bg-[#7B2D8E] text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-12">
            {{-- Mobile Logo --}}
            <a href="/" class="lg:hidden shrink-0">
                <img src="/images/logoImdeporte.png" alt="IMDEPORTE" class="h-8 w-auto">
            </a>

            {{-- Desktop Nav Links --}}
            <div class="hidden lg:flex items-center gap-1 text-sm font-medium w-full justify-center">
                <a href="#" class="px-3 py-2 rounded hover:bg-[#5c1a6e] transition">Instituto</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#5c1a6e] transition">Servicios</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#5c1a6e] transition">Programas</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#5c1a6e] transition">Eventos</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#5c1a6e] transition">Comunicación</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#5c1a6e] transition">Cultura física</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#5c1a6e] transition">Deporte</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#5c1a6e] transition">Transparencia</a>
            </div>

            {{-- Search + Mobile menu --}}
            <div class="flex items-center gap-2">
                <button class="hidden lg:flex text-white hover:text-gray-200 transition">
                    <i class="fas fa-search"></i>
                </button>
                <button id="mobile-menu-btn" class="lg:hidden text-white text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        {{-- Mobile Nav --}}
        <div id="mobile-menu" class="lg:hidden hidden bg-[#5c1a6e] px-4 pb-4">
            <a href="#" class="block py-2 border-b border-[#7B2D8E]/50">Instituto</a>
            <a href="#" class="block py-2 border-b border-[#7B2D8E]/50">Servicios</a>
            <a href="#" class="block py-2 border-b border-[#7B2D8E]/50">Programas</a>
            <a href="#" class="block py-2 border-b border-[#7B2D8E]/50">Eventos</a>
            <a href="#" class="block py-2 border-b border-[#7B2D8E]/50">Comunicación</a>
            <a href="#" class="block py-2 border-b border-[#7B2D8E]/50">Cultura física</a>
            <a href="#" class="block py-2 border-b border-[#7B2D8E]/50">Deporte</a>
            <a href="#" class="block py-2 border-b border-[#7B2D8E]/50">Transparencia</a>
        </div>
    </nav>

    {{-- ===== MAIN CONTENT ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="bg-[#3D1252] text-white">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                {{-- Col 1: Logo --}}
                <div>
                    <img src="/images/logoImdeporte.png" alt="IMDEPORTE Tecámac" class="h-16 w-auto mb-4 bg-white rounded-lg px-3 py-2">
                    <p class="text-xs text-gray-300">Instituto Municipal de Cultura Física y Deporte</p>
                </div>
                {{-- Col 2: ¿Qué es gob.mx? --}}
                <div>
                    <h5 class="font-bold text-sm mb-3">¿Qué es gob.mx?</h5>
                    <p class="text-xs text-gray-300 mb-3">Es el portal único de trámites, información y participación ciudadana. <a href="#" class="text-[#A855A0] hover:text-white transition">Leer más</a></p>
                    <h5 class="font-bold text-sm mb-2">Enlaces</h5>
                    <ul class="space-y-1 text-xs text-gray-300">
                        <li><a href="#" class="hover:text-white transition">Transparencia</a></li>
                        <li><a href="#" class="hover:text-white transition">Cultura física</a></li>
                        <li><a href="#" class="hover:text-white transition">Deporte</a></li>
                    </ul>
                </div>
                {{-- Col 3: IMDEPORTE --}}
                <div>
                    <h5 class="font-bold text-sm mb-3">IMDEPORTE</h5>
                    <p class="text-xs text-gray-300 mb-1">Algunos derechos reservados</p>
                    <p class="text-xs text-gray-300 mt-2"><a href="#" class="hover:text-white transition">Aviso de privacidad</a></p>
                </div>
                {{-- Col 4: Contacto y redes --}}
                <div>
                    <h5 class="font-bold text-sm mb-3">Email: buzonquejas.gob.mx</h5>
                    <p class="text-xs text-gray-300 mb-3">Síguenos en</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-x-twitter text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-youtube text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-white/20 mt-8 pt-4 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} IMDEPORTE Tecámac - Instituto Municipal de Cultura Física y Deporte. Todos los derechos reservados.
                <span class="mx-2">|</span>
                <a href="{{ route('admin.login') }}" class="text-gray-500 hover:text-white transition" title="Administración">
                    <i class="fas fa-lock text-[10px]"></i> Administración
                </a>
            </div>
        </div>
    </footer>

    {{-- Mobile menu toggle + date/time script --}}
    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
        });

        function updateDateTime() {
            const now = new Date();
            const months = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
            const dateEl = document.getElementById('top-date');
            const timeEl = document.getElementById('top-time');
            if (dateEl) dateEl.textContent = now.getDate() + ' ' + months[now.getMonth()] + ', ' + now.getFullYear();
            if (timeEl) timeEl.textContent = now.toLocaleTimeString('es-MX', { hour: '2-digit', minute: '2-digit', hour12: true });
        }
        updateDateTime();
        setInterval(updateDateTime, 60000);
    </script>
    @stack('scripts')
</body>
</html>
