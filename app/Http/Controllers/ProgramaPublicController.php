<?php

namespace App\Http\Controllers;

use App\Models\Programa;

class ProgramaPublicController extends Controller
{
    public function index()
    {
        $programas = Programa::recientes(9)->get();
        return view('programas.index', compact('programas'));
    }

    public function show(Programa $programa)
    {
        if ($programa->url_externa && trim($programa->url_externa) !== '') {
            return redirect()->away($programa->url_externa);
        }

        $recientes = Programa::activos()
            ->where('id', '!=', $programa->id)
            ->limit(3)
            ->get();

        return view('programas.show', compact('programa', 'recientes'));
    }
}
