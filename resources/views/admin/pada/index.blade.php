@extends('admin.layout')

@section('page-title', 'PADA — Programa Anual de Adquisiciones')

@section('content')

<div class="max-w-2xl">

    {{-- Estado actual --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
        <h2 class="text-base font-semibold text-gray-800 mb-4 flex items-center gap-2">
            <i class="fas fa-file-pdf text-[#7B2D8E]"></i> Estado del archivo
        </h2>

        @if($existe)
            <div class="flex items-center justify-between bg-green-50 border border-green-200 rounded-lg px-4 py-3">
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle text-green-600 text-lg"></i>
                    <div>
                        <p class="text-sm font-semibold text-green-800">Archivo publicado</p>
                        <p class="text-xs text-green-600">pada.pdf — visible en el sitio público</p>
                    </div>
                </div>
                <a href="{{ $url }}" target="_blank"
                   class="inline-flex items-center gap-1 text-sm text-[#7B2D8E] hover:text-[#5c1a6e] font-semibold transition">
                    <i class="fas fa-eye"></i> Ver PDF
                </a>
            </div>
        @else
            <div class="flex items-center gap-3 bg-yellow-50 border border-yellow-200 rounded-lg px-4 py-3">
                <i class="fas fa-exclamation-triangle text-yellow-500 text-lg"></i>
                <div>
                    <p class="text-sm font-semibold text-yellow-800">Sin archivo</p>
                    <p class="text-xs text-yellow-600">Aún no se ha subido ningún PDF para PADA.</p>
                </div>
            </div>
        @endif
    </div>

    {{-- Formulario de subida --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h2 class="text-base font-semibold text-gray-800 mb-1 flex items-center gap-2">
            <i class="fas fa-upload text-[#7B2D8E]"></i>
            {{ $existe ? 'Reemplazar archivo' : 'Subir archivo' }}
        </h2>
        <p class="text-xs text-gray-400 mb-5">Solo se admite PDF · máximo 20 MB · el archivo anterior será reemplazado.</p>

        @if(session('success'))
            <div class="mb-4 flex items-center gap-2 bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 text-sm">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 rounded-lg px-4 py-3 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pada.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="pdf" class="block text-sm font-semibold text-gray-700 mb-1">Archivo PDF *</label>
                <input type="file" id="pdf" name="pdf" accept=".pdf" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-[#7B2D8E] transition">
            </div>

            <div class="flex gap-3 pt-1">
                <button type="submit"
                        class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                    <i class="fas fa-upload mr-1"></i>
                    {{ $existe ? 'Reemplazar' : 'Publicar' }}
                </button>
            </div>
        </form>
    </div>

    {{-- Vista previa si existe --}}
    @if($existe)
        <div class="mt-6 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-base font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-eye text-[#7B2D8E]"></i> Vista previa
                </h2>
            </div>
            <div class="p-4">
                <iframe src="{{ $url }}" class="w-full rounded-lg border border-gray-200" style="height: 600px;"></iframe>
            </div>
        </div>
    @endif

</div>

@endsection
