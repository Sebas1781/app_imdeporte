<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Convocatoria;
use Illuminate\Http\Request;

class ConvocatoriaController extends Controller
{
    public function index()
    {
        $convocatorias = Convocatoria::orderByDesc('fecha')->get();
        return view('admin.convocatorias.index', compact('convocatorias'));
    }

    public function create()
    {
        return view('admin.convocatorias.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'url_externa' => 'nullable|url|max:255',
            'fecha' => 'required|date',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('convocatorias', 'public');
        }

        $data['activo'] = $request->has('activo');

        Convocatoria::create($data);

        return redirect()->route('admin.convocatorias.index')->with('success', 'Convocatoria creada correctamente.');
    }

    public function edit(Convocatoria $convocatoria)
    {
        return view('admin.convocatorias.edit', compact('convocatoria'));
    }

    public function update(Request $request, Convocatoria $convocatoria)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048',
            'url_externa' => 'nullable|url|max:255',
            'fecha' => 'required|date',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('convocatorias', 'public');
        }

        $data['activo'] = $request->has('activo');

        $convocatoria->update($data);

        return redirect()->route('admin.convocatorias.index')->with('success', 'Convocatoria actualizada correctamente.');
    }

    public function destroy(Convocatoria $convocatoria)
    {
        $convocatoria->delete();
        return redirect()->route('admin.convocatorias.index')->with('success', 'Convocatoria eliminada correctamente.');
    }
}
