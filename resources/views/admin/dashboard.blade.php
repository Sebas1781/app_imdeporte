@extends('admin.layout')

@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    {{-- Card: Carousel --}}
    <a href="{{ route('admin.carousel.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-images text-blue-600 text-xl"></i>
            </div>
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#00839B] transition"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['carousel_items'] }}</p>
        <p class="text-sm text-gray-500">Imágenes en Carrusel</p>
    </a>

    {{-- Card: Boletines --}}
    <a href="{{ route('admin.boletines.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-newspaper text-green-600 text-xl"></i>
            </div>
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#00839B] transition"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['boletines'] }}</p>
        <p class="text-sm text-gray-500">Boletines Totales</p>
    </a>

    {{-- Card: Boletines Activos --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-check-circle text-teal-600 text-xl"></i>
            </div>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['boletines_activos'] }}</p>
        <p class="text-sm text-gray-500">Boletines Activos</p>
    </div>

    {{-- Card: Users --}}
    <a href="{{ route('admin.users.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-purple-600 text-xl"></i>
            </div>
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#00839B] transition"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['users'] }}</p>
        <p class="text-sm text-gray-500">Usuarios</p>
    </a>
</div>

{{-- Quick Actions --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Acciones Rápidas</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <a href="{{ route('admin.carousel.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#00839B] hover:bg-[#00839B]/5 transition">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-plus text-blue-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Agregar al Carrusel</p>
                <p class="text-xs text-gray-500">Nueva imagen</p>
            </div>
        </a>
        <a href="{{ route('admin.boletines.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#00839B] hover:bg-[#00839B]/5 transition">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-plus text-green-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Nuevo Boletín</p>
                <p class="text-xs text-gray-500">Publicar noticia</p>
            </div>
        </a>
        <a href="{{ route('admin.users.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#00839B] hover:bg-[#00839B]/5 transition">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-user-plus text-purple-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Nuevo Usuario</p>
                <p class="text-xs text-gray-500">Crear cuenta</p>
            </div>
        </a>
    </div>
</div>
@endsection
