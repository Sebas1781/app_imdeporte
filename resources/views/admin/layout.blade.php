<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - IMDEPORTE Tecámac')</title>
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
<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="min-h-screen flex">
        {{-- Sidebar --}}
        <aside id="sidebar" class="w-64 bg-[#3D1252] text-white flex-shrink-0 fixed inset-y-0 left-0 z-30 transform -translate-x-full lg:translate-x-0 lg:static transition-transform duration-200 ease-in-out">
            <div class="p-6 border-b border-white/10">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <img src="/images/logoImdeporte.png" alt="IMDEPORTE" class="h-10 w-auto bg-white rounded px-2 py-1">
                    <div>
                        <span class="font-bold text-sm block">IMDEPORTE</span>
                        <span class="text-xs text-gray-300">Panel Admin</span>
                    </div>
                </a>
            </div>

            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.dashboard') ? 'bg-[#7B2D8E] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                    <i class="fas fa-tachometer-alt w-5 text-center"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.carousel.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.carousel.*') ? 'bg-[#7B2D8E] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                    <i class="fas fa-images w-5 text-center"></i>
                    Carrusel Inicio
                </a>
                <a href="{{ route('admin.boletines.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.boletines.*') ? 'bg-[#7B2D8E] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                    <i class="fas fa-newspaper w-5 text-center"></i>
                    Boletines
                </a>
                <a href="{{ route('admin.convocatorias.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.convocatorias.*') ? 'bg-[#7B2D8E] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                    <i class="fas fa-bullhorn w-5 text-center"></i>
                    Convocatorias
                </a>
                <a href="{{ route('admin.redes-sociales.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.redes-sociales.*') ? 'bg-[#7B2D8E] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                    <i class="fas fa-share-alt w-5 text-center"></i>
                    Redes Sociales
                </a>
                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition
                          {{ request()->routeIs('admin.users.*') ? 'bg-[#7B2D8E] text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                    <i class="fas fa-users w-5 text-center"></i>
                    Usuarios
                </a>
            </nav>

            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
                <a href="/" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm text-gray-300 hover:bg-white/10 hover:text-white transition">
                    <i class="fas fa-globe w-5 text-center"></i>
                    Ver sitio público
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm text-gray-300 hover:bg-red-600/20 hover:text-red-400 transition">
                        <i class="fas fa-sign-out-alt w-5 text-center"></i>
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </aside>

        {{-- Sidebar overlay for mobile --}}
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-20 hidden lg:hidden" onclick="toggleSidebar()"></div>

        {{-- Main content --}}
        <div class="flex-1 flex flex-col min-h-screen">
            {{-- Top bar --}}
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-3 flex items-center justify-between sticky top-0 z-10">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="lg:hidden text-gray-600 hover:text-gray-800">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-lg font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-500">{{ auth()->user()->name }}</span>
                    <div class="w-8 h-8 bg-[#7B2D8E] rounded-full flex items-center justify-center text-white text-sm font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>
            </header>

            {{-- Page content --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- ========== MODAL ANIMATIONS ========== --}}
    <style>
        /* Success checkmark draw animation */
        @keyframes successPop {
            0% { transform: scale(0) rotate(-45deg); opacity: 0; }
            50% { transform: scale(1.3) rotate(0deg); opacity: 1; }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }
        @keyframes iconBounce {
            0%, 100% { transform: translateY(0); }
            30% { transform: translateY(-12px); }
            50% { transform: translateY(0); }
            70% { transform: translateY(-6px); }
        }
        @keyframes ringPulse {
            0% { box-shadow: 0 0 0 0 rgba(34,197,94,0.5); }
            70% { box-shadow: 0 0 0 15px rgba(34,197,94,0); }
            100% { box-shadow: 0 0 0 0 rgba(34,197,94,0); }
        }
        @keyframes ringPulseRed {
            0% { box-shadow: 0 0 0 0 rgba(239,68,68,0.5); }
            70% { box-shadow: 0 0 0 15px rgba(239,68,68,0); }
            100% { box-shadow: 0 0 0 0 rgba(239,68,68,0); }
        }
        @keyframes shake {
            0%, 100% { transform: rotate(0deg); }
            15% { transform: rotate(-12deg); }
            30% { transform: rotate(10deg); }
            45% { transform: rotate(-8deg); }
            60% { transform: rotate(6deg); }
            75% { transform: rotate(-3deg); }
        }
        @keyframes slideUp {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        @keyframes confettiBurst {
            0% { transform: scale(0); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.8; }
            100% { transform: scale(1.5); opacity: 0; }
        }
        .modal-icon-success {
            animation: successPop 0.6s ease-out forwards, ringPulse 1.5s ease-out 0.6s infinite;
        }
        .modal-icon-success i {
            animation: iconBounce 0.8s ease-out 0.5s;
        }
        .modal-icon-error {
            animation: successPop 0.6s ease-out forwards, ringPulseRed 1.5s ease-out 0.6s infinite;
        }
        .modal-icon-error i {
            animation: shake 0.6s ease-out 0.4s;
        }
        .modal-icon-delete {
            animation: successPop 0.5s ease-out forwards, ringPulseRed 1.5s ease-out 0.5s infinite;
        }
        .modal-icon-delete i {
            animation: shake 0.7s ease-out 0.3s;
        }
        .modal-title-anim {
            animation: slideUp 0.5s ease-out 0.3s both;
        }
        .modal-text-anim {
            animation: slideUp 0.5s ease-out 0.45s both;
        }
        .modal-btn-anim {
            animation: slideUp 0.5s ease-out 0.6s both;
        }
    </style>

    {{-- ========== MODAL: Success / Error ========== --}}
    @if(session('success') || session('error'))
    <div id="flash-modal" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/50 opacity-0 transition-opacity duration-300">
        <div id="flash-modal-box" class="bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full mx-4 text-center transform scale-90 transition-transform duration-300">
            @if(session('success'))
                <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-5 modal-icon-success">
                    <i class="fas fa-check text-green-500 text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 modal-title-anim">¡Listo!</h3>
                <p class="text-sm text-gray-500 mb-6 modal-text-anim">{{ session('success') }}</p>
            @else
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-5 modal-icon-error">
                    <i class="fas fa-times text-red-500 text-4xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 modal-title-anim">¡Ocurrió un error!</h3>
                <p class="text-sm text-gray-500 mb-6 modal-text-anim">{{ session('error') }}</p>
            @endif
            <div class="modal-btn-anim">
                <button onclick="closeFlashModal()" class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-10 rounded-lg text-sm transition hover:scale-105 active:scale-95 transform">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
    @endif

    {{-- ========== MODAL: Confirm Delete ========== --}}
    <div id="confirm-modal" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/50 opacity-0 transition-opacity duration-300">
        <div id="confirm-modal-box" class="bg-white rounded-2xl shadow-2xl p-8 max-w-sm w-full mx-4 text-center transform scale-90 transition-transform duration-300">
            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-5 modal-icon-delete">
                <i class="fas fa-trash-alt text-red-500 text-4xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2 modal-title-anim">¿Estás seguro?</h3>
            <p id="confirm-modal-msg" class="text-sm text-gray-500 mb-6 modal-text-anim">Esta acción no se puede deshacer.</p>
            <div class="flex gap-3 justify-center modal-btn-anim">
                <button onclick="closeConfirmModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition hover:scale-105 active:scale-95 transform">
                    Cancelar
                </button>
                <button id="confirm-modal-btn" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition hover:scale-105 active:scale-95 transform">
                    <i class="fas fa-trash mr-1"></i> Sí, eliminar
                </button>
            </div>
        </div>
    </div>

    <script>
        // Sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Flash modal (success/error)
        const flashModal = document.getElementById('flash-modal');
        if (flashModal) {
            requestAnimationFrame(() => {
                flashModal.style.opacity = '1';
                document.getElementById('flash-modal-box').style.transform = 'scale(1)';
            });
        }
        function closeFlashModal() {
            const m = document.getElementById('flash-modal');
            const b = document.getElementById('flash-modal-box');
            if (m) { m.style.opacity = '0'; b.style.transform = 'scale(90%)'; }
            setTimeout(() => { if (m) m.remove(); }, 300);
        }

        // Confirm delete modal
        let confirmFormTarget = null;
        function confirmDelete(formEl, message) {
            confirmFormTarget = formEl;
            const modal = document.getElementById('confirm-modal');
            const box = document.getElementById('confirm-modal-box');
            document.getElementById('confirm-modal-msg').textContent = message || 'Esta acción no se puede deshacer.';
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            requestAnimationFrame(() => {
                modal.style.opacity = '1';
                box.style.transform = 'scale(1)';
            });
        }
        function closeConfirmModal() {
            const modal = document.getElementById('confirm-modal');
            const box = document.getElementById('confirm-modal-box');
            modal.style.opacity = '0';
            box.style.transform = 'scale(90%)';
            setTimeout(() => { modal.classList.remove('flex'); modal.classList.add('hidden'); }, 300);
            confirmFormTarget = null;
        }
        document.getElementById('confirm-modal-btn')?.addEventListener('click', function() {
            if (confirmFormTarget) confirmFormTarget.submit();
        });
        // Close modals on overlay click
        document.getElementById('confirm-modal')?.addEventListener('click', function(e) {
            if (e.target === this) closeConfirmModal();
        });
        if (flashModal) {
            flashModal.addEventListener('click', function(e) {
                if (e.target === this) closeFlashModal();
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
