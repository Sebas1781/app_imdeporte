<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ODAPAS Tecámac - Agua y Saneamiento')</title>
    <link rel="icon" type="image/png" href="/images/odapasLogo.png">
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
                <img src="/images/odapasLogo.png" alt="ODAPAS Tecámac" class="h-12 w-auto">
            </a>

            {{-- Info items --}}
            <div class="flex items-center gap-4 text-xs text-gray-600">
                <div class="flex items-center gap-1 bg-gray-50 rounded-full px-3 py-1">
                    <i class="fas fa-calendar-alt text-[#00839B]"></i>
                    <span class="font-semibold text-[#00839B]">Fecha</span>
                    <span id="top-date">--</span>
                </div>
                <div class="flex items-center gap-1 bg-gray-50 rounded-full px-3 py-1">
                    <i class="fas fa-clock text-[#00839B]"></i>
                    <span class="font-semibold text-[#00839B]">Hora local</span>
                    <span id="top-time">--</span>
                </div>
                <div class="flex items-center gap-1 bg-gray-50 rounded-full px-3 py-1">
                    <i class="fas fa-cloud-sun text-[#00839B]"></i>
                    <span class="font-semibold text-[#00839B]">Clima actual</span>
                    <span>26°C - cielo claro</span>
                </div>
                <div class="flex items-center gap-1 bg-gray-50 rounded-full px-3 py-1">
                    <i class="fas fa-wind text-[#00839B]"></i>
                    <span class="font-semibold text-[#00839B]">Calidad del aire</span>
                    <span>Regular (AQI 3)</span>
                </div>
                <div class="flex items-center gap-1 bg-red-50 rounded-full px-3 py-1 border border-red-200">
                    <i class="fas fa-car text-red-500"></i>
                    <span class="font-semibold text-red-500">Hoy no circula</span>
                    <span class="text-red-600">Engomado verde 1 y 2</span>
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
    <nav class="bg-[#00839B] text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-12">
            {{-- Mobile Logo --}}
            <a href="/" class="lg:hidden shrink-0">
                <img src="/images/odapasLogo.png" alt="ODAPAS" class="h-8 w-auto">
            </a>

            {{-- Desktop Nav Links --}}
            <div class="hidden lg:flex items-center gap-1 text-sm font-medium w-full justify-center">
                <a href="#" class="px-3 py-2 rounded hover:bg-[#006d82] transition">Acerca de</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#006d82] transition">Cultura del Agua</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#006d82] transition">Transparencia</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#006d82] transition">Mejora Regulatoria</a>
                <a href="#" class="px-3 py-2 rounded hover:bg-[#006d82] transition">Trámites y servicios</a>
                <a href="https://plataforma.odapas.tecamac.gob.mx/SF/atl.ui.wppagoelectronico.aspx" target="_blank" class="bg-green-500 hover:bg-green-600 px-4 py-1.5 rounded font-semibold transition ml-2 flex items-center gap-1">Pago en línea <i class="fas fa-chevron-right text-xs"></i></a>
                <a href="#" class="bg-[#1a3a5c] hover:bg-[#15304d] px-4 py-1.5 rounded font-semibold transition flex items-center gap-1">Trámites en línea <i class="fas fa-chevron-right text-xs"></i></a>
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
        <div id="mobile-menu" class="lg:hidden hidden bg-[#006d82] px-4 pb-4">
            <a href="#" class="block py-2 border-b border-[#00839B]/50">Acerca de</a>
            <a href="#" class="block py-2 border-b border-[#00839B]/50">Cultura del Agua</a>
            <a href="#" class="block py-2 border-b border-[#00839B]/50">Transparencia</a>
            <a href="#" class="block py-2 border-b border-[#00839B]/50">Mejora Regulatoria</a>
            <a href="#" class="block py-2 border-b border-[#00839B]/50">Trámites y servicios</a>
            <a href="https://plataforma.odapas.tecamac.gob.mx/SF/atl.ui.wppagoelectronico.aspx" target="_blank" class="block py-2 mt-2 bg-green-500 rounded text-center font-semibold">Pago en línea</a>
            <a href="#" class="block py-2 mt-2 bg-[#1a3a5c] rounded text-center font-semibold">Trámites en línea</a>
        </div>
    </nav>

    {{-- ===== MAIN CONTENT ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="bg-[#0c2d48] text-white">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Col 1 --}}
                <div>
                    <h5 class="font-bold text-sm mb-3">¿Qué es gob.mx?</h5>
                    <p class="text-xs text-gray-300 mb-3">Es el portal único de trámites, información y participación ciudadana.</p>
                    <ul class="space-y-1 text-xs text-gray-300">
                        <li><a href="#" class="hover:text-white transition">Tarifas Caja General</a></li>
                        <li><a href="#" class="hover:text-white transition">Solicitud de eliminación de datos</a></li>
                        <li><a href="#" class="hover:text-white transition">Ubicación de cajas de pago</a></li>
                    </ul>
                    <div class="mt-4">
                        <div class="bg-white rounded px-2 py-1 inline-block">
                            <span class="text-[#00839B] font-extrabold text-base">Odapas</span>
                        </div>
                    </div>
                </div>
                {{-- Col 2 --}}
                <div>
                    <h5 class="font-bold text-sm mb-3">Agua y Saneamiento de Tecámac</h5>
                    <p class="text-xs text-gray-300 mb-1">Administración 2025-2027</p>
                    <p class="text-xs text-gray-300 mb-1">Algunos derechos reservados</p>
                    <p class="text-xs text-gray-300 mt-3">Mariano Escobedo Mz. 132 Lt.1<br>Los Héroes Tecámac</p>
                    <p class="text-xs text-gray-300 mt-1">Teléfonos: 55 1313 5815</p>
                </div>
                {{-- Col 3 --}}
                <div>
                    <h5 class="font-bold text-sm mb-3">Contacto</h5>
                    <p class="text-xs text-gray-300 mb-3"><strong>Email:</strong> buzonquejas@odapas.gob.mx</p>
                    <div class="flex gap-3 mt-4">
                        <a href="#" class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition">
                            <i class="fab fa-tiktok text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-white/20 mt-8 pt-4 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} ODAPAS Tecámac. Todos los derechos reservados.
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

        // Update date & time in top bar
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
