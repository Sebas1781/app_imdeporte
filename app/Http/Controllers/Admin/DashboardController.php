<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boletin;
use App\Models\CarouselItem;
use App\Models\Convocatoria;
use App\Models\Programa;
use App\Models\Evento;
use App\Models\Noticia;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'carousel_items' => CarouselItem::count(),
            'boletines' => Boletin::count(),
            'convocatorias' => Convocatoria::count(),
            'convocatorias_activas' => Convocatoria::where('activo', true)->count(),
            'programas' => Programa::count(),
            'programas_activos' => Programa::where('activo', true)->count(),
            'eventos' => Evento::count(),
            'eventos_activos' => Evento::where('activo', true)->count(),
            'noticias' => Noticia::count(),
            'noticias_activas' => Noticia::where('activo', true)->count(),
            'users' => User::count(),
            'boletines_activos' => Boletin::where('activo', true)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
