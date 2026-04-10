@extends('admin.layout')
@section('page-title', 'Agregar Documento')

@section('content')
<div class="max-w-2xl">
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-4 flex-wrap">
        <a href="{{ route('admin.transparencia.index', $tipo) }}" class="hover:text-[#7B2D8E] transition">{{ $tipoLabel }}</a>
        <i class="fas fa-chevron-right text-xs text-gray-300"></i>
        <a href="{{ route('admin.transparencia.secciones.index', [$tipo, $grupo]) }}" class="hover:text-[#7B2D8E] transition">{{ $grupo->nombre_completo }}</a>
        <i class="fas fa-chevron-right text-xs text-gray-300"></i>
        <a href="{{ route('admin.transparencia.documentos.index', [$tipo, $grupo, $seccion]) }}" class="hover:text-[#7B2D8E] transition">{{ $seccion->titulo }}</a>
        <i class="fas fa-chevron-right text-xs text-gray-300"></i>
        <span class="text-gray-700">Nuevo documento</span>
    </nav>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-lg font-bold text-gray-800 mb-5">Agregar documento — {{ $seccion->titulo }}</h2>

        <form action="{{ route('admin.transparencia.documentos.store', [$tipo, $grupo, $seccion]) }}" method="POST"
              enctype="multipart/form-data" class="space-y-5" id="doc-form">
            @csrf

            {{-- Nombre --}}
            <div>
                <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nombre del documento *
                </label>
                <input type="text" id="nombre" name="nombre"
                       value="{{ old('nombre') }}" required
                       placeholder="Ej. BALANZA DE COMPROBACIÓN NIVEL MAYOR"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('nombre')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Tipo de archivo --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">Tipo de archivo *</label>
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <input type="radio" id="tipo_pdf" name="tipo_archivo" value="pdf"
                               {{ old('tipo_archivo', 'pdf') === 'pdf' ? 'checked' : '' }}
                               class="w-4 h-4 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                        <label for="tipo_pdf" class="text-sm text-gray-700 cursor-pointer flex items-center gap-2">
                            <i class="fas fa-file-pdf text-red-500"></i> Subir PDF
                        </label>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="radio" id="tipo_link" name="tipo_archivo" value="link"
                               {{ old('tipo_archivo') === 'link' ? 'checked' : '' }}
                               class="w-4 h-4 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                        <label for="tipo_link" class="text-sm text-gray-700 cursor-pointer flex items-center gap-2">
                            <i class="fas fa-link text-blue-500"></i> Enlace externo
                        </label>
                    </div>
                </div>
            </div>

            {{-- Archivo PDF --}}
            <div id="pdf-section">
                <label for="archivo" class="block text-sm font-semibold text-gray-700 mb-2">
                    Archivo PDF * <span class="text-gray-400 font-normal">(máx. 20 MB)</span>
                </label>
                <input type="file" id="archivo" name="archivo" accept=".pdf"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('archivo')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Link externo --}}
            <div id="link-section" class="hidden">
                <label for="archivo-link" class="block text-sm font-semibold text-gray-700 mb-2">
                    URL del documento * <span class="text-gray-400 font-normal">(Google Drive, Dropbox, etc.)</span>
                </label>
                <input type="url" id="archivo-link" name="archivo_link"
                       value="{{ old('tipo_archivo') === 'link' ? old('archivo') : '' }}"
                       placeholder="https://drive.google.com/file/d/..."
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('archivo')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    <i class="fas fa-upload mr-1"></i> Subir documento
                </button>
                <a href="{{ route('admin.transparencia.documentos.index', [$tipo, $grupo, $seccion]) }}"
                   class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const tipoPdf  = document.getElementById('tipo_pdf');
    const tipoLink = document.getElementById('tipo_link');
    const pdfSec   = document.getElementById('pdf-section');
    const linkSec  = document.getElementById('link-section');
    const archivoPdf  = document.getElementById('archivo');
    const archivoLink = document.getElementById('archivo-link');

    function toggleSections() {
        if (tipoPdf.checked) {
            pdfSec.classList.remove('hidden');
            linkSec.classList.add('hidden');
            archivoPdf.name  = 'archivo';
            archivoLink.name = '';
        } else {
            pdfSec.classList.add('hidden');
            linkSec.classList.remove('hidden');
            archivoPdf.name  = '';
            archivoLink.name = 'archivo';
        }
    }

    tipoPdf.addEventListener('change', toggleSections);
    tipoLink.addEventListener('change', toggleSections);
    toggleSections();
</script>
@endpush

@endsection
