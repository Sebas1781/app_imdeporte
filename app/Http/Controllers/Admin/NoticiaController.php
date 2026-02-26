<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::orderByDesc('fecha')->get();
        return view('admin.noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('admin.noticias.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'url_externa' => 'nullable|url|max:255',
            'fecha' => 'required|date',
            'orden' => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('noticias', 'public');
        }

        $data['activo'] = $request->has('activo');
        $data['orden'] = $data['orden'] ?? 0;

        Noticia::create($data);

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia creada correctamente.');
    }

    public function edit(Noticia $noticia)
    {
        return view('admin.noticias.edit', compact('noticia'));
    }

    public function update(Request $request, Noticia $noticia)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'url_externa' => 'nullable|url|max:255',
            'fecha' => 'required|date',
            'orden' => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('noticias', 'public');
        }

        $data['activo'] = $request->has('activo');
        $data['orden'] = $data['orden'] ?? 0;

        $noticia->update($data);

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('admin.noticias.index')->with('success', 'Noticia eliminada correctamente.');
    }
}
