@extends('admin.layout')

@section('page-title', 'Usuarios')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">Administra los usuarios del sistema</p>
    <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 bg-[#7B2D8E] hover:bg-[#5c1a6e] text-white font-semibold py-2 px-4 rounded-lg text-sm transition">
        <i class="fas fa-user-plus"></i> Nuevo Usuario
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Nombre</th>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Email</th>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Rol</th>
                <th class="text-left px-6 py-3 font-semibold text-gray-600">Creado</th>
                <th class="text-right px-6 py-3 font-semibold text-gray-600">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($users as $user)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-[#7B2D8E] rounded-full flex items-center justify-center text-white text-sm font-bold">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <span class="font-medium text-gray-800">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                    <td class="px-6 py-4">
                        @if($user->is_admin)
                            <span class="inline-flex items-center gap-1 bg-purple-100 text-purple-700 text-xs font-semibold px-2 py-1 rounded-full">
                                <i class="fas fa-shield-alt"></i> Admin
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 text-xs font-semibold px-2 py-1 rounded-full">
                                <i class="fas fa-user"></i> Usuario
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $user->created_at->format('d M, Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-800 transition" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this.closest('form'), '¿Estás seguro de eliminar este usuario?')" class="text-red-500 hover:text-red-700 transition" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                        <i class="fas fa-users text-3xl mb-2 block"></i>
                        No hay usuarios.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
