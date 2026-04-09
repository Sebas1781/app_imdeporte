@props(['titulo', 'slug', 'orden', 'numDocumentos', 'color', 'enlaceEditar', 'enlaceDocumentos'])

<div class="rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 bg-white overflow-visible flex flex-col">
    
    {{-- Header con color dinámico --}}
    <div class="px-6 py-5 text-center rounded-t-xl" style="background-color: {{ $color }};">
        <h3 class="text-white font-bold text-lg leading-snug">{{ $titulo }}</h3>
    </div>

    {{-- Body blanco --}}
    <div class="p-6 bg-white flex flex-col gap-4 grow">
        
        {{-- Info Grid: Slug y Orden --}}
        <div class="flex justify-between items-center text-sm text-gray-600">
            <div>
                <span class="text-gray-400">Slug:</span>
                <span class="ml-1 font-mono text-gray-700">{{ $slug }}</span>
            </div>
            <div>
                <span class="text-gray-400">Orden:</span>
                <span class="ml-1 font-mono text-gray-700">{{ $orden }}</span>
            </div>
        </div>

        {{-- Documentos --}}
        <div class="flex items-center gap-2 text-sm text-gray-700">
            <i class="fas fa-file text-gray-400"></i>
            <span>{{ $numDocumentos }} documento{{ $numDocumentos !== 1 ? 's' : '' }}</span>
        </div>

    </div>

    {{-- Botones de acción --}}
    <div class="flex gap-3 p-6 bg-white border-t border-gray-100 mt-auto w-full">
        <a href="{{ $enlaceEditar }}" 
           class="flex-1 bg-amber-500 hover:bg-amber-600 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition flex items-center justify-center gap-2 no-underline">
            <i class="fas fa-edit text-sm"></i>Editar
        </a>
        <a href="{{ $enlaceDocumentos }}"
           class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm transition flex items-center justify-center gap-2 no-underline">
            <i class="fas fa-arrow-right text-sm"></i>Ver docs
        </a>
    </div>

</div>
