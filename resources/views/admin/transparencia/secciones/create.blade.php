@extends('admin.layout')
@section('page-title', 'Nueva Sección')

@section('content')
<div class="max-w-lg">
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-4 flex-wrap">
        <a href="{{ route('admin.transparencia.index', $tipo) }}" class="hover:text-[#7B2D8E] transition">{{ $tipoLabel }}</a>
        <i class="fas fa-chevron-right text-xs text-gray-300"></i>
        <a href="{{ route('admin.transparencia.secciones.index', [$tipo, $grupo]) }}" class="hover:text-[#7B2D8E] transition">{{ $grupo->nombre_completo }}</a>
        <i class="fas fa-chevron-right text-xs text-gray-300"></i>
        <span class="text-gray-700">Nueva sección</span>
    </nav>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-5">Nueva sección — {{ $grupo->nombre_completo }}</h2>

        <form action="{{ route('admin.transparencia.secciones.store', [$tipo, $grupo]) }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="titulo" class="block text-sm font-semibold text-gray-700 mb-2">
                    Título de la sección *
                </label>
                <input type="text" id="titulo" name="titulo"
                       value="{{ old('titulo') }}" required
                       placeholder="Ej. 1ER TRIMESTRE 2024"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('titulo')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="bg-purple-50 rounded-lg px-4 py-3 text-sm text-[#7B2D8E]">
                <i class="fas fa-info-circle mr-1"></i>
                El título aparecerá como encabezado en la página pública. Usa mayúsculas para mayor claridad.
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    <i class="fas fa-plus mr-1"></i> Crear Sección
                </button>
                <a href="{{ route('admin.transparencia.secciones.index', [$tipo, $grupo]) }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
