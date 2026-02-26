<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class NoticiaPublicController extends Controller
{
    public function index()
    {
        $noticias = Noticia::recientes(9)->get();
        return view('noticias.index', compact('noticias'));
    }

    public function show(Noticia $noticia)
    {
        if ($noticia->url_externa && trim($noticia->url_externa) !== '') {
            return redirect()->away($noticia->url_externa);
        }

        $recientes = Noticia::activos()
            ->where('id', '!=', $noticia->id)
            ->limit(3)
            ->get();

        return view('noticias.show', compact('noticia', 'recientes'));
    }
}
