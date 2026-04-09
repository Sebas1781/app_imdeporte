@extends('admin.layout')
@section('page-title', 'Agregar Documento REMTYS')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.remtys.documentos.index', $categoria) }}"
       class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-[#7B2D8E] mb-4 transition">
        <i class="fas fa-arrow-left"></i> Volver a REMTYS
    </a>

    <div class="mb-4">
        <span class="inline-block text-white text-xs font-bold px-3 py-1.5 rounded-lg"
              style="background-color: {{ $categoria->color }}">
            {{ $categoria->nombre }}
        </span>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.remtys.documentos.store', $categoria) }}" method="POST"
              enctype="multipart/form-data" class="space-y-5" id="documento-form">
            @csrf

            {{-- Nombre del documento --}}
            <div>
                <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nombre del documento *
                </label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required
                       placeholder="Ej. REGISTRO DE TRÁMITES 2025"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('nombre') <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle text-xs"></i> {{ $message }}</p> @enderror
            </div>

            {{-- Tipo de archivo --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-3">Tipo de archivo *</label>
                <div class="space-y-2">
                    <div class="flex items-center gap-3">
                        <input type="radio" id="tipo_pdf" name="tipo_archivo" value="pdf" checked
                               class="w-4 h-4 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                        <label for="tipo_pdf" class="text-sm text-gray-700 cursor-pointer flex items-center gap-2">
                            <i class="fas fa-file-pdf text-red-500"></i>
                            <span>Subir PDF</span>
                        </label>
                    </div>
                    <div class="flex items-center gap-3">
                        <input type="radio" id="tipo_link" name="tipo_archivo" value="link"
                               class="w-4 h-4 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                        <label for="tipo_link" class="text-sm text-gray-700 cursor-pointer flex items-center gap-2">
                            <i class="fas fa-link text-blue-500"></i>
                            <span>Link externo</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Archivo PDF (mostrado por defecto) --}}
            <div id="archivo-pdf-section" class="transition-opacity duration-200">
                <label for="archivo" class="block text-sm font-semibold text-gray-700 mb-2">
                    Archivo PDF * <span class="text-gray-400 font-normal">(PDF, Word, Excel, PowerPoint – máx. 20 MB)</span>
                </label>
                <input type="file" id="archivo" name="archivo"
                       accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('archivo') <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle text-xs"></i> {{ $message }}</p> @enderror
            </div>

            {{-- Link externo (oculto inicialmente) --}}
            <div id="archivo-link-section" class="hidden transition-opacity duration-200">
                <label for="archivo-link" class="block text-sm font-semibold text-gray-700 mb-2">
                    URL del documento * <span class="text-gray-400 font-normal">(Google Drive, Dropbox, etc.)</span>
                </label>
                <input type="url" id="archivo-link" name="archivo"
                       placeholder="https://drive.google.com/file/d/..."
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('archivo') <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle text-xs"></i> {{ $message }}</p> @enderror
            </div>

            {{-- Activo --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="activo" name="activo" value="1" checked
                       class="w-4 h-4 rounded border-gray-300 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                <label for="activo" class="text-sm text-gray-700">Activo</label>
            </div>

            {{-- Botones --}}
            <div class="flex gap-3 pt-4">
                <button type="submit"
                        class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition flex items-center gap-2">
                    <i class="fas fa-upload"></i> Subir documento
                </button>
                <a href="{{ route('admin.remtys.documentos.index', $categoria) }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    const tipoPdfRadio = document.getElementById('tipo_pdf');
    const tipoLinkRadio = document.getElementById('tipo_link');
    const archivoPdfSection = document.getElementById('archivo-pdf-section');
    const archivoLinkSection = document.getElementById('archivo-link-section');
    const archivoInput = document.getElementById('archivo');
    const archivoLinkInput = document.getElementById('archivo-link');
    const form = document.getElementById('documento-form');

    // Manejar cambio de tipo de archivo
    function handleTipoChange() {
        if (tipoPdfRadio.checked) {
            archivoPdfSection.classList.remove('hidden');
            archivoLinkSection.classList.add('hidden');
            archivoInput.required = true;
            archivoLinkInput.required = false;
            archivoLinkInput.value = '';
        } else {
            archivoPdfSection.classList.add('hidden');
            archivoLinkSection.classList.remove('hidden');
            archivoInput.required = false;
            archivoLinkInput.required = true;
            archivoInput.value = '';
        }
    }

    tipoPdfRadio.addEventListener('change', handleTipoChange);
    tipoLinkRadio.addEventListener('change', handleTipoChange);

    // Validar antes de enviar el formulario
    form.addEventListener('submit', function(e) {
        if (tipoPdfRadio.checked && !archivoInput.value) {
            e.preventDefault();
            alert('Por favor, selecciona un archivo PDF');
        } else if (tipoLinkRadio.checked && !archivoLinkInput.value) {
            e.preventDefault();
            alert('Por favor, ingresa una URL válida');
        }
    });
</script>
@endsection
