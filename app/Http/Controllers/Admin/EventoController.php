<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderByDesc('fecha')->get();
        return view('admin.eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('admin.eventos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'url_externa' => 'nullable|url|max:255',
            'fecha' => 'nullable|date',
            'orden' => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('eventos', 'public');
        }

        $data['activo'] = $request->has('activo');
        $data['orden'] = $data['orden'] ?? 0;

        Evento::create($data);

        return redirect()->route('admin.eventos.index')->with('success', 'Evento creado correctamente.');
    }

    public function edit(Evento $evento)
    {
        return view('admin.eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'url_externa' => 'nullable|url|max:255',
            'fecha' => 'nullable|date',
            'orden' => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('eventos', 'public');
        }

        $data['activo'] = $request->has('activo');
        $data['orden'] = $data['orden'] ?? 0;

        $evento->update($data);

        return redirect()->route('admin.eventos.index')->with('success', 'Evento actualizado correctamente.');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();
        return redirect()->route('admin.eventos.index')->with('success', 'Evento eliminado correctamente.');
    }
}
