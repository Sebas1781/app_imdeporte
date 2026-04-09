@props(['nombre', 'color', 'icono', 'numDocumentos' => 0])

<div class="relative rounded-3xl overflow-hidden shadow-lg"
     style="background-color: {{ $color }};">

    {{-- Ícono decorativo grande (fondo derecha, semitransparente) --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-10">
        <div class="absolute -top-8 -right-8 text-white select-none">
            <i class="fas {{ $icono }}" style="font-size: 14rem; line-height: 1;"></i>
        </div>
    </div>

    {{-- Contenido principal --}}
    <div class="relative z-10 px-8 py-10 md:px-12 md:py-14 flex items-center">
        {{-- Izquierda: Icono pequeño + Contenido --}}
        <div class="flex items-center gap-6">
            {{-- Ícono en círculo blanco semitransparente --}}
            <div class="w-16 h-16 md:w-20 md:h-20 rounded-full flex items-center justify-center shrink-0"
                 style="background-color: rgba(255,255,255,0.25);">
                <i class="fas {{ $icono }} text-white text-3xl md:text-4xl"></i>
            </div>

            {{-- Texto --}}
            <div>
                <h2 class="text-white text-2xl md:text-3xl font-bold leading-snug"
                    style="text-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                    {{ $nombre }}
                </h2>
                @if($numDocumentos > 0)
                    <p class="text-white/80 text-sm md:text-base mt-1">
                        <i class="fas fa-file mr-1"></i>{{ $numDocumentos }} documento{{ $numDocumentos !== 1 ? 's' : '' }}
                    </p>
                @endif
            </div>
        </div>
    </div>

</div>
