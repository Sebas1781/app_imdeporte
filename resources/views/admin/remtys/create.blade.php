@extends('admin.layout')

@section('page-title', 'Nueva Categoría REMTYS')

@section('content')
<div class="min-h-screen bg-gray-50 -mx-6 -my-6 px-4 md:px-6 py-6">
    {{-- Header --}}
    <div class="max-w-6xl mx-auto mb-8">
        <a href="{{ route('admin.remtys.index') }}"
           class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-[#7B2D8E] transition">
            <i class="fas fa-arrow-left"></i> Volver al listado
        </a>
    </div>

    <div class="max-w-6xl mx-auto">
        <form action="{{ route('admin.remtys.store') }}" method="POST" id="create-form" class="space-y-6">
            @csrf

            {{-- Información General --}}
            <div>

                {{-- Card: Información General --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-[#7B2D8E]/10 flex items-center justify-center shrink-0">
                            <i class="fas fa-info-circle text-[#7B2D8E]"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Información General</h3>
                    </div>

                    <div class="space-y-5">
                        {{-- Nombre --}}
                        <div>
                            <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nombre *
                            </label>
                            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                            @error('nombre') <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle text-xs"></i> {{ $message }}</p> @enderror
                        </div>

                        {{-- Slug --}}
                        <div>
                            <label for="slug" class="block text-sm font-semibold text-gray-700 mb-2">
                                Slug
                                <span class="text-gray-400 font-normal text-xs">(se genera automático si está vacío)</span>
                            </label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition font-mono text-gray-600"
                                   placeholder="mi-categoria">
                            @error('slug') <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle text-xs"></i> {{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

            </div>

            {{-- Configuración Visual --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Card: Color del Encabezado --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center gap-2 mb-5">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center shrink-0">
                            <i class="fas fa-palette text-blue-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-sm">Color</h4>
                    </div>

                    <div class="space-y-4">
                        {{-- Presets de colores en círculos --}}
                        <div class="flex flex-wrap gap-2 max-w-xs">
                            @foreach($colors as $hex => $label)
                            <label class="cursor-pointer group" title="{{ $label }}">
                                <input type="radio" name="color" value="{{ $hex }}" class="sr-only peer"
                                       {{ old('color', '#2563EB') === $hex ? 'checked' : '' }}>
                                <span class="block w-10 h-10 rounded-full border-[3px] border-transparent
                                           peer-checked:border-gray-800 peer-checked:scale-110 peer-checked:shadow-lg
                                           hover:scale-105 transition-transform shadow-sm cursor-pointer"
                                      style="background-color: {{ $hex }};"></span>
                            </label>
                            @endforeach
                        </div>

                        {{-- Input tipo color para personalización --}}
                        <div class="pt-3 border-t border-gray-100">
                            <label for="color-custom" class="block text-xs font-semibold text-gray-600 mb-3">
                                O elige un color personalizado:
                            </label>
                            <div class="flex items-center gap-3">
                                <input type="color" id="color-custom" 
                                       value="{{ old('color', '#2563EB') }}"
                                       class="w-12 h-10 rounded-lg border-2 border-gray-300 cursor-pointer hover:border-gray-400 transition shrink-0">
                                <span class="flex-1 text-xs text-gray-600 font-mono bg-gray-50 px-3 py-2 rounded-lg border border-gray-200 truncate">
                                    {{ old('color', '#2563EB') }}
                                </span>
                            </div>
                        </div>
                    </div>
                    @error('color') <p class="text-red-500 text-xs mt-3 flex items-center gap-1"><i class="fas fa-exclamation-circle text-xs"></i> {{ $message }}</p> @enderror
                </div>

                {{-- Card: Ícono --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center gap-2 mb-5">
                        <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center shrink-0">
                            <i class="fas fa-icons text-purple-600"></i>
                        </div>
                        <h4 class="font-semibold text-gray-800 text-sm">Ícono</h4>
                    </div>

                    <div class="space-y-4">
                        {{-- Select de iconos --}}
                        <div>
                            <label for="icono" class="block text-xs font-semibold text-gray-600 mb-3">
                                Selecciona un icono:
                            </label>
                            <select name="icono" id="icono" 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition bg-white appearance-none pr-10 cursor-pointer">
                                <option value="">-- Elige un icono --</option>
                                @php
                                $iconosMapa = [
                                    'fa-award' => 'Premio',
                                    'fa-book' => 'Libro',
                                    'fa-briefcase' => 'Portafolio',
                                    'fa-building' => 'Edificio',
                                    'fa-car' => 'Vehículo',
                                    'fa-chart-bar' => 'Gráfico',
                                    'fa-check' => 'Verificado',
                                    'fa-clipboard-list' => 'Lista',
                                    'fa-cogs' => 'Configuración',
                                    'fa-coins' => 'Monedas',
                                    'fa-crown' => 'Corona',
                                    'fa-diamond' => 'Diamante',
                                    'fa-document' => 'Documento',
                                    'fa-file-lines' => 'Archivo',
                                    'fa-folder' => 'Carpeta',
                                    'fa-gavel' => 'Martillo',
                                    'fa-handshake' => 'Acuerdo',
                                    'fa-heart' => 'Corazón',
                                    'fa-hospital' => 'Hospital',
                                    'fa-key' => 'Llave',
                                    'fa-landmark' => 'Monumento',
                                    'fa-lightbulb' => 'Idea',
                                    'fa-lock' => 'Candado',
                                    'fa-rocket' => 'Cohete',
                                    'fa-scale-balanced' => 'Balanza',
                                    'fa-shield-halved' => 'Escudo',
                                    'fa-star' => 'Estrella',
                                    'fa-target' => 'Objetivo',
                                    'fa-tree' => 'Árbol',
                                    'fa-users' => 'Usuarios',
                                ];
                                @endphp
                                @foreach($iconosMapa as $fa => $label)
                                <option value="{{ $fa }}" {{ old('icono', 'fa-folder') === $fa ? 'selected' : '' }} data-icon="{{ $fa }}">
                                    {{ $label }}
                                </option>
                                @endforeach
                            </select>
                            @error('icono') <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1"><i class="fas fa-exclamation-circle text-xs"></i> {{ $message }}</p> @enderror
                        </div>

                        {{-- Preview del icono seleccionado --}}
                        <div class="bg-gray-50 rounded-lg p-4 text-center border border-gray-200">
                            <p class="text-xs font-semibold text-gray-600 mb-2">Vista previa:</p>
                            <div class="text-4xl text-[#7B2D8E]">
                                <i id="icon-preview" class="fas {{ old('icono', 'fa-folder') }}"></i>
                            </div>
                            <p class="text-xs text-gray-500 mt-2 font-mono">{{ old('icono', 'fa-folder') }}</p>
                        </div>
                    </div>
                </div>

            </div>

        </form>

        {{-- Botones de Acción --}}
        <div class="mt-8 flex flex-col-reverse sm:flex-row items-center justify-end gap-3 sm:gap-3">
            <a href="{{ route('admin.remtys.index') }}"
               class="w-full sm:w-auto text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                Cancelar
            </a>
            <button type="submit" form="create-form"
                    class="w-full sm:w-auto bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition flex items-center justify-center gap-2">
                <i class="fas fa-plus"></i> Crear Categoría
            </button>
        </div>

    </div>

    <script>
        // Actualizar el preview del icono cuando cambia el select
        const iconSelect = document.getElementById('icono');
        const iconPreview = document.getElementById('icon-preview');

        iconSelect.addEventListener('change', function() {
            if (this.value) {
                iconPreview.className = 'fas ' + this.value;
            }
        });

        // Actualizar el valor del color personalizado en el display
        document.getElementById('color-custom').addEventListener('change', function() {
            document.querySelector('span.font-mono').textContent = this.value;
            const colorInputs = document.querySelectorAll('input[name="color"]');
            colorInputs.forEach(input => input.checked = false);
        });

        // Sincronizar input color con selección de presets
        const colorInputs = document.querySelectorAll('input[name="color"]');
        const colorCustom = document.getElementById('color-custom');
        colorInputs.forEach(input => {
            input.addEventListener('change', function() {
                colorCustom.value = this.value;
                document.querySelector('span.font-mono').textContent = this.value;
            });
        });

        // Mostrar icono en el select
        const selectElement = document.getElementById('icono');
        const options = selectElement.querySelectorAll('option');
        
        selectElement.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const icon = selectedOption.getAttribute('data-icon');
            if (icon) {
                const style = document.createElement('style');
                if (!document.getElementById('select-icon-style')) {
                    style.id = 'select-icon-style';
                    style.innerHTML = `
                        #icono::before {
                            content: "";
                            display: inline-block;
                            margin-right: 8px;
                            width: 1em;
                            height: 1em;
                            background-image: url('data:image/svg+xml;utf8,<svg></svg>');
                        }
                    `;
                    document.head.appendChild(style);
                }
            }
        });
    </script>
</div>

@endsection