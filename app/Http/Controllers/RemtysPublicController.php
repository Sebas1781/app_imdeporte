<?php

namespace App\Http\Controllers;

use App\Models\RemtysCategoria;

class RemtysPublicController extends Controller
{
    public function index()
    {
        $categorias = RemtysCategoria::withCount(['documentos' => fn($q) => $q->where('activo', true)])
            ->orderBy('orden')
            ->get();

        return view('servicios.remtys', compact('categorias'));
    }

    public function show(string $slug)
    {
        $categoria  = RemtysCategoria::where('slug', $slug)->firstOrFail();
        $documentos = $categoria->documentos()->where('activo', true)->orderBy('orden')->get();

        return view('servicios.remtys-categoria', compact('categoria', 'documentos'));
    }
}
