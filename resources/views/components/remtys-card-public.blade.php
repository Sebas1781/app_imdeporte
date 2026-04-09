@props(['titulo', 'icono', 'color', 'enlace'])

<a href="{{ $enlace }}" 
   class="group relative flex flex-col rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all duration-300"
   style="background-color: {{ $color }};">

    {{-- Ícono decorativo grande (fondo, derecha, semitransparente) --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none" style="z-index: 0;">
        <div class="absolute -top-6 -right-6 opacity-20 text-white leading-none select-none">
            <i class="fas {{ $icono }}" style="font-size: 10rem; line-height: 1;"></i>
        </div>
    </div>

    {{-- Contenido principal (encima del fondo) --}}
    <div class="relative flex-1 flex flex-col justify-between p-8" style="z-index: 1;">
        {{-- Ícono pequeño en caja --}}
        <div class="flex items-start">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0" 
                 style="background-color: rgba(255,255,255,0.22);">
                <i class="fas {{ $icono }} text-white text-xl"></i>
            </div>
        </div>

        {{-- Título --}}
        <h3 class="text-white font-bold text-xl leading-snug mt-auto pr-16" 
            style="text-shadow: 0 1px 4px rgba(0,0,0,0.25);">
            {{ $titulo }}
        </h3>
    </div>

    {{-- Footer "Ver trámites" --}}
    <div class="flex items-center justify-between px-8 py-4 relative" style="z-index: 1; background-color: rgba(0,0,0,0.18); border-top: 1px solid rgba(255,255,255,0.18);">
        <span class="text-white/80 text-sm font-medium tracking-wide">Ver trámites</span>
        <i class="fas fa-arrow-right text-white/70 text-sm group-hover:translate-x-1 transition-transform duration-200"></i>
    </div>

</a>
