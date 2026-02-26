<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function index()
    {
        $programas = Programa::orderBy('orden')->get();
        return view('admin.programas.index', compact('programas'));
    }

    public function create()
    {
        return view('admin.programas.create');
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
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('programas', 'public');
        }

        $data['activo'] = $request->has('activo');
        $data['orden'] = $data['orden'] ?? 0;

        Programa::create($data);

        return redirect()->route('admin.programas.index')->with('success', 'Programa creado correctamente.');
    }

    public function edit(Programa $programa)
    {
        return view('admin.programas.edit', compact('programa'));
    }

    public function update(Request $request, Programa $programa)
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
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('programas', 'public');
        }

        $data['activo'] = $request->has('activo');
        $data['orden'] = $data['orden'] ?? 0;

        $programa->update($data);

        return redirect()->route('admin.programas.index')->with('success', 'Programa actualizado correctamente.');
    }

    public function destroy(Programa $programa)
    {
        $programa->delete();
        return redirect()->route('admin.programas.index')->with('success', 'Programa eliminado correctamente.');
    }
}
