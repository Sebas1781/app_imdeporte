<?php

namespace App\Http\Controllers;

use App\Models\Boletin;

class BoletinPublicController extends Controller
{
    public function index()
    {
        $boletines = Boletin::activos()->paginate(12);
        return view('boletines.index', compact('boletines'));
    }

    public function show(Boletin $boletin)
    {
        // Si tiene URL externa, redirigir allá
        if ($boletin->url_externa && trim($boletin->url_externa) !== '') {
            return redirect()->away($boletin->url_externa);
        }

        // Si no, mostrar la vista de detalle
        $recientes = Boletin::activos()
            ->where('id', '!=', $boletin->id)
            ->limit(3)
            ->get();

        return view('boletines.show', compact('boletin', 'recientes'));
    }
}
