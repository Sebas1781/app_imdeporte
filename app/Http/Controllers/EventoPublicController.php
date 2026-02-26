<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class EventoPublicController extends Controller
{
    public function index()
    {
        $eventos = Evento::recientes(9)->get();
        return view('eventos.index', compact('eventos'));
    }

    public function show(Evento $evento)
    {
        if ($evento->url_externa && trim($evento->url_externa) !== '') {
            return redirect()->away($evento->url_externa);
        }

        $recientes = Evento::activos()
            ->where('id', '!=', $evento->id)
            ->limit(3)
            ->get();

        return view('eventos.show', compact('evento', 'recientes'));
    }
}
