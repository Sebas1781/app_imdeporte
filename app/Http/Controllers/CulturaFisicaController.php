<?php

namespace App\Http\Controllers;

use App\Models\CulturaFisicaItem;

class CulturaFisicaController extends Controller
{
    public function index()
    {
        $actividades = CulturaFisicaItem::activos()->actividades()->get();
        $servicios   = CulturaFisicaItem::activos()->servicios()->get();
        return view('cultura-fisica.index', compact('actividades', 'servicios'));
    }
}
