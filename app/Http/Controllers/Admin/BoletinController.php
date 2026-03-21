<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boletin;
use Illuminate\Http\Request;

class BoletinController extends Controller
{
    public function index()
    {
        $boletines = Boletin::orderByDesc('fecha')->get();
        return view('admin.boletines.index', compact('boletines'));
    }

    public function create()
    {
        return view('admin.boletines.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|mimes:jpeg,jpg,png,gif,webp,bmp,svg,avif|max:5120',
            'url_externa' => 'nullable|url|max:255',
            'fecha' => 'required|date',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $this->storeImage($request->file('imagen'), 'boletines');
        }

        $data['activo'] = $request->has('activo');

        Boletin::create($data);

        return redirect()->route('admin.boletines.index')->with('success', 'Boletín creado correctamente.');
    }

    public function edit(Boletin $boletin)
    {
        return view('admin.boletines.edit', compact('boletin'));
    }

    public function update(Request $request, Boletin $boletin)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|mimes:jpeg,jpg,png,gif,webp,bmp,svg,avif|max:5120',
            'url_externa' => 'nullable|url|max:255',
            'fecha' => 'required|date',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $this->storeImage($request->file('imagen'), 'boletines');
        }

        $data['activo'] = $request->has('activo');

        $boletin->update($data);

        return redirect()->route('admin.boletines.index')->with('success', 'Boletín actualizado correctamente.');
    }

    public function destroy(Boletin $boletin)
    {
        $boletin->delete();
        return redirect()->route('admin.boletines.index')->with('success', 'Boletín eliminado correctamente.');
    }
}
