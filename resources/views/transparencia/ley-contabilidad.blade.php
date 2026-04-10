@extends('layouts.app')

@section('title', 'Ley General de Contabilidad Gubernamental - IMDEPORTE')

@section('content')

{{-- Banner --}}
<section class="relative w-full overflow-hidden" style="height: 320px;">
    <div class="absolute inset-0 bg-gradient-to-br from-[#7B2D8E] via-[#9B3DAE] to-[#5c1a6e]"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: url('/images/fondo1.jpg'); background-size: cover; background-position: center;"></div>
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6">
        <h1 class="text-white text-3xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg uppercase leading-tight max-w-3xl">
            Ley General de Contabilidad Gubernamental
        </h1>
        <div class="w-16 h-1 bg-white/60 rounded-full mt-4 mb-5"></div>
        <p class="text-white/90 text-base md:text-lg max-w-2xl leading-relaxed">
            Conoce las herramientas de transparencia, contabilidad y acceso a la información
            pública del Gobierno Municipal de Tecámac
        </p>
    </div>
</section>

{{-- Cards de sistemas --}}

{{-- ═══════════════════════════════════════════
     SEVAC
════════════════════════════════════════════ --}}
<section class="py-14 bg-white">
    <div class="max-w-6xl mx-auto px-4 md:px-6">
        <div class="flex justify-center mb-4">
            <span class="inline-flex items-center gap-2 bg-[#7B2D8E]/10 text-[#7B2D8E] px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wider">
                <i class="fas fa-table-list"></i> SEVAC
            </span>
        </div>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-2">
            Sistema de Evaluación de Armonización Contable
        </h2>

        @if($sevacGrupos->isEmpty())
            <p class="text-center text-gray-400 py-10 text-sm">No hay información disponible.</p>
        @else
            <p class="text-gray-500 text-center text-sm mb-8">Selecciona el periodo que deseas consultar.</p>
            <div class="flex flex-wrap justify-center gap-3 mb-10">
                @foreach($sevacGrupos as $index => $grupo)
                <button onclick="switchTab('sevac', {{ $grupo->id }}, this)"
                        data-tipo-tab="sevac"
                        class="px-5 py-2.5 rounded-full font-bold text-sm transition border-2 {{ $index === 0 ? 'bg-[#7B2D8E] text-white border-[#7B2D8E]' : 'border-gray-300 text-gray-600 hover:border-[#7B2D8E] hover:text-[#7B2D8E] bg-white' }}">
                    {{ $grupo->nombre_completo }}
                </button>
                @endforeach
            </div>
            @foreach($sevacGrupos as $index => $grupo)
            <div id="panel-sevac-{{ $grupo->id }}" data-tipo-panel="sevac" class="{{ $index !== 0 ? 'hidden' : '' }}">
                @forelse($grupo->secciones as $seccion)
                <div class="mb-10">
                    <h3 class="font-black text-base text-gray-900 uppercase mb-2">{{ $seccion->titulo }}</h3>
                    <hr class="border-[#7B2D8E]/30 mb-4">
                    @if($seccion->documentos->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 border border-gray-200 rounded-xl overflow-hidden">
                        @foreach($seccion->documentos as $doc)
                        @php $url = $doc->tipo_archivo === 'pdf' ? asset($doc->archivo) : $doc->archivo; @endphp
                        <a href="{{ $url }}" target="_blank"
                           class="flex items-center gap-3 p-4 border-r border-b border-gray-200 hover:bg-purple-50 transition group">
                            <i class="fas fa-file-pdf text-2xl text-[#7B2D8E] shrink-0"></i>
                            <span class="text-[#7B2D8E] font-bold text-xs uppercase leading-snug group-hover:underline">{{ $doc->nombre }}</span>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-sm text-gray-400 italic">Sin documentos disponibles.</p>
                    @endif
                </div>
                @empty
                <p class="text-center text-gray-400 py-8 text-sm">No hay secciones para este periodo.</p>
                @endforelse
            </div>
            @endforeach
        @endif
    </div>
</section>

{{-- ═══════════════════════════════════════════
     CONAC
════════════════════════════════════════════ --}}
<section class="py-14 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 md:px-6">
        <div class="flex justify-center mb-4">
            <span class="inline-flex items-center gap-2 bg-[#7B2D8E]/10 text-[#7B2D8E] px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wider">
                <i class="fas fa-landmark"></i> CONAC
            </span>
        </div>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-2">
            Consejo Nacional de Armonización Contable
        </h2>

        @if($conacGrupos->isEmpty())
            <p class="text-center text-gray-400 py-10 text-sm">No hay información disponible.</p>
        @else
            <p class="text-gray-500 text-center text-sm mb-8">Selecciona el periodo que deseas consultar.</p>
            <div class="flex flex-wrap justify-center gap-3 mb-10">
                @foreach($conacGrupos as $index => $grupo)
                <button onclick="switchTab('conac', {{ $grupo->id }}, this)"
                        data-tipo-tab="conac"
                        class="px-5 py-2.5 rounded-full font-bold text-sm transition border-2 {{ $index === 0 ? 'bg-[#7B2D8E] text-white border-[#7B2D8E]' : 'border-gray-300 text-gray-600 hover:border-[#7B2D8E] hover:text-[#7B2D8E] bg-white' }}">
                    {{ $grupo->nombre_completo }}
                </button>
                @endforeach
            </div>
            @foreach($conacGrupos as $index => $grupo)
            <div id="panel-conac-{{ $grupo->id }}" data-tipo-panel="conac" class="{{ $index !== 0 ? 'hidden' : '' }}">
                @forelse($grupo->secciones as $seccion)
                <div class="mb-10">
                    <h3 class="font-black text-base text-gray-900 uppercase mb-2">{{ $seccion->titulo }}</h3>
                    <hr class="border-[#7B2D8E]/30 mb-4">
                    @if($seccion->documentos->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 border border-gray-200 rounded-xl overflow-hidden">
                        @foreach($seccion->documentos as $doc)
                        @php $url = $doc->tipo_archivo === 'pdf' ? asset($doc->archivo) : $doc->archivo; @endphp
                        <a href="{{ $url }}" target="_blank"
                           class="flex items-center gap-3 p-4 border-r border-b border-gray-200 hover:bg-purple-50 transition group">
                            <i class="fas fa-file-pdf text-2xl text-[#7B2D8E] shrink-0"></i>
                            <span class="text-[#7B2D8E] font-bold text-xs uppercase leading-snug group-hover:underline">{{ $doc->nombre }}</span>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-sm text-gray-400 italic">Sin documentos disponibles.</p>
                    @endif
                </div>
                @empty
                <p class="text-center text-gray-400 py-8 text-sm">No hay secciones para este periodo.</p>
                @endforelse
            </div>
            @endforeach
        @endif
    </div>
</section>

{{-- ═══════════════════════════════════════════
     PRESUPUESTO — comentado, descomentar cuando se requiera
{{-- ════════════════════════════════════════════
<section class="py-14 bg-white">
    <div class="max-w-6xl mx-auto px-4 md:px-6">
        <div class="flex justify-center mb-4">
            <span class="inline-flex items-center gap-2 bg-[#7B2D8E]/10 text-[#7B2D8E] px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wider">
                <i class="fas fa-coins"></i> Presupuesto
            </span>
        </div>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 text-center mb-2">
            Presupuesto y Ejercicio del Gasto
        </h2>

        @if($presupuestoGrupos->isEmpty())
            <p class="text-center text-gray-400 py-10 text-sm">No hay información disponible.</p>
        @else
            <p class="text-gray-500 text-center text-sm mb-8">Selecciona el periodo que deseas consultar.</p>
            <div class="flex flex-wrap justify-center gap-3 mb-10">
                @foreach($presupuestoGrupos as $index => $grupo)
                <button onclick="switchTab('presupuesto', {{ $grupo->id }}, this)"
                        data-tipo-tab="presupuesto"
                        class="px-5 py-2.5 rounded-full font-bold text-sm transition border-2 {{ $index === 0 ? 'bg-[#7B2D8E] text-white border-[#7B2D8E]' : 'border-gray-300 text-gray-600 hover:border-[#7B2D8E] hover:text-[#7B2D8E] bg-white' }}">
                    {{ $grupo->nombre_completo }}
                </button>
                @endforeach
            </div>
            @foreach($presupuestoGrupos as $index => $grupo)
            <div id="panel-presupuesto-{{ $grupo->id }}" data-tipo-panel="presupuesto" class="{{ $index !== 0 ? 'hidden' : '' }}">
                @forelse($grupo->secciones as $seccion)
                <div class="mb-10">
                    <h3 class="font-black text-base text-gray-900 uppercase mb-2">{{ $seccion->titulo }}</h3>
                    <hr class="border-[#7B2D8E]/30 mb-4">
                    @if($seccion->documentos->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 border border-gray-200 rounded-xl overflow-hidden">
                        @foreach($seccion->documentos as $doc)
                        @php $url = $doc->tipo_archivo === 'pdf' ? asset($doc->archivo) : $doc->archivo; @endphp
                        <a href="{{ $url }}" target="_blank"
                           class="flex items-center gap-3 p-4 border-r border-b border-gray-200 hover:bg-purple-50 transition group">
                            <i class="fas fa-file-pdf text-2xl text-[#7B2D8E] shrink-0"></i>
                            <span class="text-[#7B2D8E] font-bold text-xs uppercase leading-snug group-hover:underline">{{ $doc->nombre }}</span>
                        </a>
                        @endforeach
                    </div>
                    @else
                    <p class="text-sm text-gray-400 italic">Sin documentos disponibles.</p>
                    @endif
                </div>
                @empty
                <p class="text-center text-gray-400 py-8 text-sm">No hay secciones para este periodo.</p>
                @endforelse
            </div>
            @endforeach
        @endif
    </div>
</section>
--}}

<script>
function switchTab(tipo, grupoId, btn) {
    document.querySelectorAll('[data-tipo-panel="' + tipo + '"]').forEach(function(el) {
        el.classList.add('hidden');
    });
    var panel = document.getElementById('panel-' + tipo + '-' + grupoId);
    if (panel) panel.classList.remove('hidden');

    document.querySelectorAll('[data-tipo-tab="' + tipo + '"]').forEach(function(el) {
        el.className = 'px-5 py-2.5 rounded-full font-bold text-sm transition border-2 border-gray-300 text-gray-600 hover:border-[#7B2D8E] hover:text-[#7B2D8E] bg-white';
    });
    btn.className = 'px-5 py-2.5 rounded-full font-bold text-sm transition bg-[#7B2D8E] text-white border-2 border-[#7B2D8E]';
}
</script>

@endsection
