@extends('admin.layout')

@section('page-title', 'Cambiar Imagen')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.imagenes-vistas.index') }}"
           class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#7B2D8E] transition">
            <i class="fas fa-arrow-left"></i> Volver a Imágenes de Vistas
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-bold text-gray-800">{{ $pageImage->nombre }}</h2>
            @if($pageImage->descripcion)
                <p class="text-sm text-gray-500 mt-1">{{ $pageImage->descripcion }}</p>
            @endif
        </div>

        <div class="p-6">
            {{-- Imagen actual --}}
            <div class="mb-6">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Imagen actual</p>
                <div class="rounded-xl overflow-hidden border border-gray-200 bg-gray-50 h-56">
                    <img src="{{ $pageImage->ruta }}"
                         alt="{{ $pageImage->nombre }}"
                         class="w-full h-full object-cover"
                         id="current-preview">
                </div>
                <p class="text-xs text-gray-400 mt-1 font-mono">{{ $pageImage->ruta }}</p>
            </div>

            {{-- Formulario --}}
            <form action="{{ route('admin.imagenes-vistas.update', $pageImage) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nueva imagen <span class="text-red-500">*</span>
                    </label>

                    {{-- Drop zone --}}
                    <div id="drop-zone"
                         class="relative border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer hover:border-[#7B2D8E] hover:bg-[#7B2D8E]/5 transition"
                         onclick="document.getElementById('imagen').click()">
                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3 block"></i>
                        <p class="text-sm font-medium text-gray-600">Haz clic o arrastra una imagen aquí</p>
                        <p class="text-xs text-gray-400 mt-1">JPG, PNG, WEBP, GIF — máx. 5 MB</p>
                        <div id="new-preview-wrapper" class="hidden mt-4">
                            <img id="new-preview" src="" alt="Vista previa" class="mx-auto max-h-40 rounded-lg shadow">
                            <p id="new-filename" class="text-xs text-gray-500 mt-2"></p>
                        </div>
                    </div>

                    <input type="file"
                           name="imagen"
                           id="imagen"
                           accept=".jpg,.jpeg,.png,.gif,.webp,.bmp,.svg,.avif"
                           class="hidden"
                           required>

                    @error('imagen')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit"
                            class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                        <i class="fas fa-save"></i> Guardar imagen
                    </button>
                    <a href="{{ route('admin.imagenes-vistas.index') }}"
                       class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const input = document.getElementById('imagen');
    const dropZone = document.getElementById('drop-zone');
    const previewWrapper = document.getElementById('new-preview-wrapper');
    const previewImg = document.getElementById('new-preview');
    const filenameEl = document.getElementById('new-filename');

    function showPreview(file) {
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            previewImg.src = e.target.result;
            filenameEl.textContent = file.name;
            previewWrapper.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }

    input.addEventListener('change', () => showPreview(input.files[0]));

    dropZone.addEventListener('dragover', e => { e.preventDefault(); dropZone.classList.add('border-[#7B2D8E]', 'bg-[#7B2D8E]/5'); });
    dropZone.addEventListener('dragleave', () => { dropZone.classList.remove('border-[#7B2D8E]', 'bg-[#7B2D8E]/5'); });
    dropZone.addEventListener('drop', e => {
        e.preventDefault();
        dropZone.classList.remove('border-[#7B2D8E]', 'bg-[#7B2D8E]/5');
        const file = e.dataTransfer.files[0];
        if (file) {
            const dt = new DataTransfer();
            dt.items.add(file);
            input.files = dt.files;
            showPreview(file);
        }
    });
</script>
@endpush
