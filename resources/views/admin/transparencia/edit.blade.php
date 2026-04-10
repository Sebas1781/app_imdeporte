@extends('admin.layout')
@section('page-title', 'Editar — ' . $grupo->nombre_completo)

@section('content')
<div class="max-w-lg">
    <a href="{{ route('admin.transparencia.index', $tipo) }}"
       class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-[#7B2D8E] mb-4 transition">
        <i class="fas fa-arrow-left"></i> Volver a {{ $tipoLabel }}
    </a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-5">Editar — {{ $grupo->nombre_completo }}</h2>

        <form action="{{ route('admin.transparencia.grupos.update', [$tipo, $grupo]) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="anio" class="block text-sm font-semibold text-gray-700 mb-2">Año *</label>
                <input type="number" id="anio" name="anio"
                       value="{{ old('anio', $grupo->anio) }}"
                       min="2000" max="2099" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('anio')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    <i class="fas fa-save mr-1"></i> Guardar
                </button>
                <a href="{{ route('admin.transparencia.index', $tipo) }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    Cancelar
                </a>
            </div>
        </form>

        <div class="border-t border-gray-100 mt-6 pt-5">
            <form action="{{ route('admin.transparencia.grupos.destroy', [$tipo, $grupo]) }}" method="POST"
                  onsubmit="return confirm('¿Eliminar {{ $grupo->nombre_completo }} y TODO su contenido? Esta acción no se puede deshacer.')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-2.5 px-4 rounded-lg text-sm transition border border-red-200">
                    <i class="fas fa-trash"></i> Eliminar año completo
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
