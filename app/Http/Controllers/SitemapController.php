<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Evento;
use App\Models\Convocatoria;
use App\Models\Programa;
use App\Models\Boletin;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $noticias      = Noticia::latest()->get();
        $eventos       = Evento::latest()->get();
        $convocatorias = Convocatoria::latest()->get();
        $programas     = Programa::latest()->get();
        $boletines     = Boletin::latest()->get();

        $content = view('sitemap', compact(
            'noticias',
            'eventos',
            'convocatorias',
            'programas',
            'boletines'
        ))->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
