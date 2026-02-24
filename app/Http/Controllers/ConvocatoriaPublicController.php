<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;

class ConvocatoriaPublicController extends Controller
{
    public function index()
    {
        $convocatorias = Convocatoria::activos()->paginate(12);
        return view('convocatorias.index', compact('convocatorias'));
    }

    public function show(Convocatoria $convocatoria)
    {
        if ($convocatoria->url_externa && trim($convocatoria->url_externa) !== '') {
            return redirect()->away($convocatoria->url_externa);
        }

        $recientes = Convocatoria::activos()
            ->where('id', '!=', $convocatoria->id)
            ->limit(3)
            ->get();

        return view('convocatorias.show', compact('convocatoria', 'recientes'));
    }
}
