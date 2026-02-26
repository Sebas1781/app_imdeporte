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
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#7B2D8E] transition"></i>
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
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#7B2D8E] transition"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['boletines'] }}</p>
        <p class="text-sm text-gray-500">Boletines ({{ $stats['boletines_activos'] }} activos)</p>
    </a>

    {{-- Card: Convocatorias --}}
    <a href="{{ route('admin.convocatorias.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-bullhorn text-purple-600 text-xl"></i>
            </div>
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#7B2D8E] transition"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['convocatorias'] }}</p>
        <p class="text-sm text-gray-500">Convocatorias ({{ $stats['convocatorias_activas'] }} activas)</p>
    </a>

    {{-- Card: Programas --}}
    <a href="{{ route('admin.programas.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-running text-orange-600 text-xl"></i>
            </div>
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#7B2D8E] transition"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['programas'] }}</p>
        <p class="text-sm text-gray-500">Programas ({{ $stats['programas_activos'] }} activos)</p>
    </a>

    {{-- Card: Eventos --}}
    <a href="{{ route('admin.eventos.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-calendar-alt text-pink-600 text-xl"></i>
            </div>
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#7B2D8E] transition"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['eventos'] }}</p>
        <p class="text-sm text-gray-500">Eventos ({{ $stats['eventos_activos'] }} activos)</p>
    </a>

    {{-- Card: Noticias --}}
    <a href="{{ route('admin.noticias.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-newspaper text-indigo-600 text-xl"></i>
            </div>
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#7B2D8E] transition"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['noticias'] }}</p>
        <p class="text-sm text-gray-500">Noticias ({{ $stats['noticias_activas'] }} activas)</p>
    </a>

    {{-- Card: Users --}}
    <a href="{{ route('admin.users.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition group">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-teal-600 text-xl"></i>
            </div>
            <i class="fas fa-arrow-right text-gray-300 group-hover:text-[#7B2D8E] transition"></i>
        </div>
        <p class="text-2xl font-bold text-gray-800">{{ $stats['users'] }}</p>
        <p class="text-sm text-gray-500">Usuarios</p>
    </a>
</div>

{{-- Quick Actions --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <h2 class="text-lg font-bold text-gray-800 mb-4">Acciones Rápidas</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.carousel.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#7B2D8E] hover:bg-[#7B2D8E]/5 transition">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-plus text-blue-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Agregar al Carrusel</p>
                <p class="text-xs text-gray-500">Nueva imagen</p>
            </div>
        </a>
        <a href="{{ route('admin.boletines.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#7B2D8E] hover:bg-[#7B2D8E]/5 transition">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-plus text-green-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Nuevo Boletín</p>
                <p class="text-xs text-gray-500">Publicar noticia</p>
            </div>
        </a>
        <a href="{{ route('admin.convocatorias.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#7B2D8E] hover:bg-[#7B2D8E]/5 transition">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-plus text-purple-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Nueva Convocatoria</p>
                <p class="text-xs text-gray-500">Publicar convocatoria</p>
            </div>
        </a>
        <a href="{{ route('admin.programas.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#7B2D8E] hover:bg-[#7B2D8E]/5 transition">
            <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-plus text-orange-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Nuevo Programa</p>
                <p class="text-xs text-gray-500">Agregar programa</p>
            </div>
        </a>
        <a href="{{ route('admin.eventos.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#7B2D8E] hover:bg-[#7B2D8E]/5 transition">
            <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-plus text-pink-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Nuevo Evento</p>
                <p class="text-xs text-gray-500">Agregar evento</p>
            </div>
        </a>
        <a href="{{ route('admin.noticias.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#7B2D8E] hover:bg-[#7B2D8E]/5 transition">
            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-plus text-indigo-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Nueva Noticia</p>
                <p class="text-xs text-gray-500">Publicar noticia</p>
            </div>
        </a>
        <a href="{{ route('admin.users.create') }}" class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#7B2D8E] hover:bg-[#7B2D8E]/5 transition">
            <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-user-plus text-teal-600"></i>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-800">Nuevo Usuario</p>
                <p class="text-xs text-gray-500">Crear cuenta</p>
            </div>
        </a>
    </div>
</div>
@endsection
