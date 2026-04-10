@extends('admin.layout')

@section('page-title', 'Documentos')

@section('content')

@if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-12 h-12 bg-[#7B2D8E]/10 rounded-lg flex items-center justify-center shrink-0">
                <i class="fas fa-file-pdf text-[#7B2D8E] text-xl"></i>
            </div>
            <div>
                <h2 class="font-bold text-gray-800">Aviso de Privacidad</h2>
                <p class="text-sm text-gray-500">
                    Estado:
                    @if($existe)
                        <span class="text-green-600 font-semibold">Archivo cargado</span>
                        — <a href="{{ asset('documents/AvisoPrivacidad.pdf') }}" target="_blank" class="text-[#7B2D8E] hover:underline text-xs">Ver PDF actual</a>
                    @else
                        <span class="text-red-500 font-semibold">Sin archivo</span>
                    @endif
                </p>
            </div>
        </div>

        <form action="{{ route('admin.documentos.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label for="pdf" class="block text-sm font-semibold text-gray-700 mb-1">
                    {{ $existe ? 'Reemplazar PDF' : 'Subir PDF' }} *
                </label>
                <input type="file" id="pdf" name="pdf" accept="application/pdf" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
                <p class="text-xs text-gray-400 mt-1">Solo archivos PDF. Máximo 10 MB.</p>
                @error('pdf') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                <i class="fas fa-upload mr-1"></i> Subir PDF
            </button>
        </form>
    </div>
</div>

@endsection
