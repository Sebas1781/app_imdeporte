@extends('admin.layout')

@section('page-title', 'Redes Sociales Institucionales')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h2 class="text-lg font-bold text-gray-800">Redes Sociales Institucionales</h2>
        <p class="text-sm text-gray-500 mt-0.5">Gestiona las cards de redes sociales visibles en el inicio.</p>
    </div>
    <a href="{{ route('admin.redes-sociales.create') }}" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2.5 px-5 rounded-lg text-sm transition">
        <i class="fas fa-plus"></i> Nueva red social
    </a>
</div>

@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">
        <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    @if($redes->isEmpty())
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-share-alt text-4xl mb-3 block"></i>
            <p class="font-medium">No hay redes sociales registradas.</p>
            <a href="{{ route('admin.redes-sociales.create') }}" class="mt-4 inline-block text-[#7B2D8E] hover:underline text-sm">Agregar la primera</a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Orden</th>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Imagen Card</th>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Logo</th>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nombre</th>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">URL</th>
                        <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="text-right px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($redes as $red)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-5 py-3 text-gray-500">{{ $red->orden }}</td>
                        <td class="px-5 py-3">
                            @if($red->imagen)
                                <img src="{{ $red->imagen }}" alt="{{ $red->nombre }}" class="h-12 w-20 object-cover rounded-lg">
                            @else
                                <div class="h-12 w-20 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs">Sin imagen</div>
                            @endif
                        </td>
                        <td class="px-5 py-3">
                            @if($red->logo)
                                <img src="{{ $red->logo }}" alt="Logo" class="h-8 w-auto max-w-[80px] object-contain">
                            @else
                                <span class="text-gray-400 text-xs">Sin logo</span>
                            @endif
                        </td>
                        <td class="px-5 py-3 font-medium text-gray-800">{{ $red->nombre }}</td>
                        <td class="px-5 py-3 text-gray-500 max-w-[160px] truncate">
                            @if($red->url)
                                <a href="{{ $red->url }}" target="_blank" class="text-[#7B2D8E] hover:underline">{{ $red->url }}</a>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-5 py-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $red->activo ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                {{ $red->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="px-5 py-3 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.redes-sociales.edit', $red) }}" class="text-[#7B2D8E] hover:text-[#5c1a6e] transition p-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.redes-sociales.destroy', $red) }}" method="POST" onsubmit="return confirm('¿Eliminar esta red social?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-600 transition p-1" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
