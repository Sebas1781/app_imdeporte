<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RedSocial;
use Illuminate\Http\Request;

class RedSocialController extends Controller
{
    public function index()
    {
        $redes = RedSocial::orderBy('orden')->get();
        return view('admin.redes-sociales.index', compact('redes'));
    }

    public function create()
    {
        return view('admin.redes-sociales.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'  => 'required|string|max:255',
            'logo'    => 'nullable|image|max:2048',
            'imagen'  => 'nullable|image|max:2048',
            'url'     => 'nullable|url|max:255',
            'orden'   => 'nullable|integer',
            'activo'  => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = '/storage/' . $request->file('logo')->store('redes-sociales/logos', 'public');
        }
        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('redes-sociales/imagenes', 'public');
        }

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? 0;

        RedSocial::create($data);

        return redirect()->route('admin.redes-sociales.index')->with('success', 'Red social creada correctamente.');
    }

    public function edit(RedSocial $redesSociale)
    {
        return view('admin.redes-sociales.edit', ['red' => $redesSociale]);
    }

    public function update(Request $request, RedSocial $redesSociale)
    {
        $data = $request->validate([
            'nombre'  => 'required|string|max:255',
            'logo'    => 'nullable|image|max:2048',
            'imagen'  => 'nullable|image|max:2048',
            'url'     => 'nullable|url|max:255',
            'orden'   => 'nullable|integer',
            'activo'  => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = '/storage/' . $request->file('logo')->store('redes-sociales/logos', 'public');
        } else {
            unset($data['logo']);
        }
        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('redes-sociales/imagenes', 'public');
        } else {
            unset($data['imagen']);
        }

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? 0;

        $redesSociale->update($data);

        return redirect()->route('admin.redes-sociales.index')->with('success', 'Red social actualizada correctamente.');
    }

    public function destroy(RedSocial $redesSociale)
    {
        $redesSociale->delete();
        return redirect()->route('admin.redes-sociales.index')->with('success', 'Red social eliminada correctamente.');
    }
}
