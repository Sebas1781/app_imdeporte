<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - IMDEPORTE Admin</title>
    <link rel="icon" type="image/png" href="/images/IMDEPORTELogo.png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('build/assets/app-CY5vtjM4.css') }}">
    @endif
</head>
<body class="font-sans antialiased bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-4">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            {{-- Logo --}}
            <div class="text-center mb-8">
                <img src="/images/IMDEPORTELogo.png" alt="IMDEPORTE Tecámac" class="h-16 w-auto mx-auto mb-4">
                <h1 class="text-xl font-bold text-gray-800">Panel de Administración</h1>
                <p class="text-sm text-gray-500 mt-1">Inicia sesión para continuar</p>
            </div>

            {{-- Errors --}}
            @if($errors->any())
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Correo electrónico</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                               class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] text-sm transition"
                               placeholder="admin@IMDEPORTE.gob.mx">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Contraseña</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" required
                               class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] text-sm transition"
                               placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 text-sm text-gray-600">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                        Recordarme
                    </label>
                </div>

                <button type="submit"
                        class="w-full bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-bold py-2.5 px-4 rounded-lg transition shadow-md">
                    <i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="/" class="text-sm text-gray-500 hover:text-[#7B2D8E] transition">
                    <i class="fas fa-arrow-left mr-1"></i> Volver al sitio
                </a>
            </div>
        </div>
    </div>
</body>
</html>
