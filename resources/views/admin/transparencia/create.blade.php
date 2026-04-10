@extends('admin.layout')
@section('page-title', 'Nuevo Año — ' . $tipoLabel)

@section('content')
<div class="max-w-lg">
    <a href="{{ route('admin.transparencia.index', $tipo) }}"
       class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-[#7B2D8E] mb-4 transition">
        <i class="fas fa-arrow-left"></i> Volver a {{ $tipoLabel }}
    </a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-5">Agregar año — {{ $tipoLabel }}</h2>

        <form action="{{ route('admin.transparencia.grupos.store', $tipo) }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="anio" class="block text-sm font-semibold text-gray-700 mb-2">
                    Año *
                </label>
                <input type="number" id="anio" name="anio"
                       value="{{ old('anio', date('Y')) }}"
                       min="2000" max="2099" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('anio')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="bg-purple-50 rounded-lg px-4 py-3 text-sm text-[#7B2D8E]">
                <i class="fas fa-info-circle mr-1"></i>
                Se creará la etiqueta <strong>{{ $tipoLabel }} [Año]</strong> como pestaña en la página pública.
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    <i class="fas fa-plus mr-1"></i> Crear Año
                </button>
                <a href="{{ route('admin.transparencia.index', $tipo) }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
