@extends('admin.layout')

@section('page-title', 'Editar Noticia')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.noticias.index') }}" class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-[#7B2D8E] mb-6 transition">
        <i class="fas fa-arrow-left"></i> Volver al listado
    </a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.noticias.update', $noticia) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="titulo" class="block text-sm font-semibold text-gray-700 mb-1">Título *</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $noticia->titulo) }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                @error('titulo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-semibold text-gray-700 mb-1">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">{{ old('descripcion', $noticia->descripcion) }}</textarea>
                @error('descripcion') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="imagen" class="block text-sm font-semibold text-gray-700 mb-1">Imagen</label>
                @if($noticia->imagen)
                    <div class="mb-2">
                        <img src="{{ $noticia->imagen }}" alt="{{ $noticia->titulo }}" class="w-40 h-24 object-cover rounded-lg border">
                    </div>
                @endif
                <input type="file" id="imagen" name="imagen" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                <p class="text-xs text-gray-400 mt-1">Deja vacío para mantener la imagen actual</p>
                @error('imagen') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="url_externa" class="block text-sm font-semibold text-gray-700 mb-1">URL Externa (opcional)</label>
                <input type="url" id="url_externa" name="url_externa" value="{{ old('url_externa', $noticia->url_externa) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition"
                       placeholder="https://...">
                @error('url_externa') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="fecha" class="block text-sm font-semibold text-gray-700 mb-1">Fecha *</label>
                <input type="date" id="fecha" name="fecha" value="{{ old('fecha', $noticia->fecha->format('Y-m-d')) }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                @error('fecha') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="orden" class="block text-sm font-semibold text-gray-700 mb-1">Orden</label>
                <input type="number" id="orden" name="orden" value="{{ old('orden', $noticia->orden) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                @error('orden') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" id="activo" name="activo" value="1" {{ $noticia->activo ? 'checked' : '' }}
                       class="rounded border-gray-300 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                <label for="activo" class="text-sm text-gray-700">Activo</label>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    <i class="fas fa-save mr-1"></i> Actualizar
                </button>
                <a href="{{ route('admin.noticias.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
