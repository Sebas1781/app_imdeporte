<?php

namespace App\Http\Controllers;

use App\Models\CarouselItem;
use App\Models\Boletin;
use App\Models\Convocatoria;
use App\Models\RedSocial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carouselItems = CarouselItem::activos()->get();
        $boletines = Boletin::recientes(9)->get();
        $convocatorias = Convocatoria::recientes(9)->get();
        $redesSociales = RedSocial::where('activo', true)->orderBy('orden')->get();

        return view('home', compact('carouselItems', 'boletines', 'convocatorias', 'redesSociales'));
    }
}

