@extends('admin.layout')

@section('page-title', 'Imágenes de Vistas')

@section('content')
<div class="mb-6">
    <p class="text-sm text-gray-500">Administra las imágenes de fondo y banners que aparecen en las páginas públicas del sitio.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
    @foreach($sectionImages as $img)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col">
            {{-- Vista previa --}}
            <div class="relative h-44 bg-gray-100 overflow-hidden">
                <img src="{{ $img->ruta }}"
                     alt="{{ $img->nombre }}"
                     class="w-full h-full object-cover"
                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div class="absolute inset-0 bg-gray-200 items-center justify-center hidden">
                    <i class="fas fa-image text-gray-400 text-4xl"></i>
                </div>
                {{-- Badge de sección --}}
                <div class="absolute top-2 left-2 bg-black/50 text-white text-[10px] font-semibold px-2 py-1 rounded">
                    {{ $img->key }}
                </div>
            </div>

            {{-- Info y acciones --}}
            <div class="p-4 flex flex-col flex-1">
                <h3 class="font-semibold text-gray-800 text-sm leading-snug">{{ $img->nombre }}</h3>
                @if($img->descripcion)
                    <p class="text-xs text-gray-500 mt-1 flex-1">{{ $img->descripcion }}</p>
                @endif
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-[10px] text-gray-400 font-mono truncate max-w-[160px]" title="{{ $img->ruta }}">
                        {{ $img->ruta }}
                    </span>
                    <a href="{{ route('admin.imagenes-vistas.edit', $img) }}"
                       class="inline-flex items-center gap-1.5 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white text-xs font-semibold py-1.5 px-3 rounded-lg transition shrink-0 ml-2">
                        <i class="fas fa-edit"></i> Cambiar
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
