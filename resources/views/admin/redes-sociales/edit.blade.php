@extends('admin.layout')

@section('page-title', 'Editar Red Social')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.redes-sociales.index') }}" class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-[#7B2D8E] mb-6 transition">
        <i class="fas fa-arrow-left"></i> Volver al listado
    </a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.redes-sociales.update', $red) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre *</label>
                <input type="text" name="nombre" value="{{ old('nombre', $red->nombre) }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                @error('nombre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Imagen de la card</label>
                @if($red->imagen)
                    <div class="mb-2">
                        <img src="{{ $red->imagen }}" alt="{{ $red->nombre }}" class="h-24 w-36 object-cover rounded-lg border">
                        <p class="text-xs text-gray-400 mt-1">Imagen actual. Sube una nueva para reemplazarla.</p>
                    </div>
                @endif
                <input type="file" name="imagen" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                @error('imagen') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Logo</label>
                @if($red->logo)
                    <div class="mb-2">
                        <img src="{{ $red->logo }}" alt="Logo" class="h-12 w-auto max-w-[100px] object-contain border rounded p-1">
                        <p class="text-xs text-gray-400 mt-1">Logo actual. Sube uno nuevo para reemplazarlo.</p>
                    </div>
                @endif
                <input type="file" name="logo" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                @error('logo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">URL (enlace al dar clic)</label>
                <input type="url" name="url" value="{{ old('url', $red->url) }}" placeholder="https://..."
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                @error('url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Orden</label>
                <input type="number" name="orden" value="{{ old('orden', $red->orden) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                @error('orden') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="activo" value="1" id="activo" {{ $red->activo ? 'checked' : '' }}
                       class="rounded border-gray-300 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                <label for="activo" class="text-sm text-gray-700">Activo (visible en el sitio)</label>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    <i class="fas fa-save mr-1"></i> Actualizar
                </button>
                <a href="{{ route('admin.redes-sociales.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
