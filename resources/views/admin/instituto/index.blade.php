@extends('admin.layout')

@section('page-title', 'Instituto')

@section('content')

{{-- ===== INFORMACIÓN GENERAL ===== --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Información General y Titular</h2>

    <form action="{{ route('admin.instituto.config') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Descripción --}}
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Descripción</label>
            <textarea name="descripcion" rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">{{ old('descripcion', $config->descripcion ?? '') }}</textarea>
            @error('descripcion') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            {{-- Nombre del titular --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre del titular</label>
                <input type="text" name="titular_nombre" value="{{ old('titular_nombre', $config->titular_nombre ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('titular_nombre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Cargo --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Cargo</label>
                <input type="text" name="titular_cargo" value="{{ old('titular_cargo', $config->titular_cargo ?? '') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent transition">
                @error('titular_cargo') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Imagen del titular --}}
        <div class="mt-5">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Foto del titular</label>
            <div class="flex items-center gap-4">
                @if(!empty($config->titular_imagen))
                    <img src="{{ $config->titular_imagen }}" alt="Titular" class="w-20 h-20 object-cover rounded-lg border">
                @endif
                <input type="file" name="titular_imagen" accept="image/*"
                    class="text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:font-semibold file:bg-[#7B2D8E]/10 file:text-[#7B2D8E] hover:file:bg-[#7B2D8E]/20 transition">
            </div>
            @error('titular_imagen') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mt-6">
            <button type="submit"
                class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-6 rounded-lg text-sm transition">
                <i class="fas fa-save"></i> Guardar Información
            </button>
        </div>
    </form>
</div>

{{-- ===== ESTRUCTURA ORGÁNICA ===== --}}
<div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-bold text-gray-800">Estructura Orgánica</h2>
    <button onclick="document.getElementById('modal-crear').classList.remove('hidden'); document.getElementById('modal-crear').classList.add('flex');"
        class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Agregar Elemento
    </button>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Orden</th>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Nombre</th>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Nivel</th>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Estado</th>
                <th class="text-right px-6 py-3 font-semibold text-gray-600">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($items as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-600">{{ $item->orden }}</td>
                    <td class="px-6 py-4 font-medium text-gray-800">{{ $item->nombre }}</td>
                    <td class="px-6 py-4">
                        @if($item->nivel == 1)
                            <span class="inline-block w-4 h-4 rounded-full bg-[#7B2D8E] mr-1 align-middle"></span> Nivel 1
                        @elseif($item->nivel == 2)
                            <span class="inline-block w-4 h-4 rounded-full bg-[#A855A0] mr-1 align-middle"></span> Nivel 2
                        @else
                            <span class="inline-block w-4 h-4 rounded-full bg-[#C084CF] mr-1 align-middle"></span> Nivel 3
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($item->activo)
                            <span class="inline-flex items-center gap-1 bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full"><i class="fas fa-check-circle"></i> Activo</span>
                        @else
                            <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 text-xs font-semibold px-2 py-1 rounded-full"><i class="fas fa-minus-circle"></i> Inactivo</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="openEditModal({{ $item->id }}, '{{ addslashes($item->nombre) }}', {{ $item->nivel }}, {{ $item->orden }}, {{ $item->activo ? 'true' : 'false' }})"
                                class="text-blue-600 hover:text-blue-800 transition" title="Editar">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form action="{{ route('admin.instituto.organigrama.destroy', $item) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="button"
                                    onclick="confirmDelete(this.closest('form'), '¿Eliminar este elemento del organigrama?')"
                                    class="text-red-500 hover:text-red-700 transition" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                        No hay elementos en el organigrama.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- ===== MODAL: Crear Elemento ===== --}}
<div id="modal-crear" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/50">
    <div class="bg-white rounded-2xl shadow-xl p-6 max-w-md w-full mx-4">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Agregar Elemento</h3>
        <form action="{{ route('admin.instituto.organigrama.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre</label>
                <input type="text" name="nombre" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent">
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nivel</label>
                    <select name="nivel" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent">
                        <option value="1">Nivel 1 (Principal)</option>
                        <option value="2">Nivel 2 (Coordinación)</option>
                        <option value="3">Nivel 3 (Departamento)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Orden</label>
                    <input type="number" name="orden" value="0" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent">
                </div>
            </div>
            <div class="mb-5">
                <label class="inline-flex items-center gap-2 text-sm cursor-pointer">
                    <input type="checkbox" name="activo" value="1" checked class="rounded border-gray-300 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                    <span class="text-gray-700 font-medium">Activo</span>
                </label>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('modal-crear').classList.add('hidden'); document.getElementById('modal-crear').classList.remove('flex');"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-5 rounded-lg text-sm transition">
                    Cancelar
                </button>
                <button type="submit" class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-5 rounded-lg text-sm transition">
                    <i class="fas fa-plus mr-1"></i> Crear
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ===== MODAL: Editar Elemento ===== --}}
<div id="modal-editar" class="hidden fixed inset-0 z-50 items-center justify-center bg-black/50">
    <div class="bg-white rounded-2xl shadow-xl p-6 max-w-md w-full mx-4">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Editar Elemento</h3>
        <form id="form-editar" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre</label>
                <input type="text" name="nombre" id="edit-nombre" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent">
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nivel</label>
                    <select name="nivel" id="edit-nivel" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent">
                        <option value="1">Nivel 1 (Principal)</option>
                        <option value="2">Nivel 2 (Coordinación)</option>
                        <option value="3">Nivel 3 (Departamento)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Orden</label>
                    <input type="number" name="orden" id="edit-orden" value="0" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#7B2D8E] focus:border-transparent">
                </div>
            </div>
            <div class="mb-5">
                <label class="inline-flex items-center gap-2 text-sm cursor-pointer">
                    <input type="checkbox" name="activo" id="edit-activo" value="1" class="rounded border-gray-300 text-[#7B2D8E] focus:ring-[#7B2D8E]">
                    <span class="text-gray-700 font-medium">Activo</span>
                </label>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('modal-editar').classList.add('hidden'); document.getElementById('modal-editar').classList.remove('flex');"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-5 rounded-lg text-sm transition">
                    Cancelar
                </button>
                <button type="submit" class="bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-5 rounded-lg text-sm transition">
                    <i class="fas fa-save mr-1"></i> Guardar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(id, nombre, nivel, orden, activo) {
    document.getElementById('form-editar').action = '/admin/instituto/organigrama/' + id;
    document.getElementById('edit-nombre').value = nombre;
    document.getElementById('edit-nivel').value = nivel;
    document.getElementById('edit-orden').value = orden;
    document.getElementById('edit-activo').checked = activo;
    document.getElementById('modal-editar').classList.remove('hidden');
    document.getElementById('modal-editar').classList.add('flex');
}
</script>

@endsection
