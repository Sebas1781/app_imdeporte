<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CulturaFisicaItem;
use Illuminate\Http\Request;

class CulturaFisicaItemController extends Controller
{
    public function index()
    {
        $actividades = CulturaFisicaItem::where('tipo', 'actividad')->orderBy('orden')->get();
        $servicios   = CulturaFisicaItem::where('tipo', 'servicio')->orderBy('orden')->get();
        return view('admin.cultura-fisica.index', compact('actividades', 'servicios'));
    }

    public function create()
    {
        $tipo = request('tipo', 'actividad');
        return view('admin.cultura-fisica.create', compact('tipo'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'tipo'        => 'required|in:actividad,servicio',
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen'      => 'nullable|mimes:jpeg,jpg,png,gif,webp,bmp,svg,avif|max:5120',
            'url'         => 'nullable|string|max:255',
            'orden'       => 'nullable|integer',
            'activo'      => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $this->storeImage($request->file('imagen'), 'cultura-fisica');
        }

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? 0;

        CulturaFisicaItem::create($data);

        return redirect()->route('admin.cultura-fisica.index')
            ->with('success', 'Elemento creado correctamente.');
    }

    public function edit(CulturaFisicaItem $culturaFisicaItem)
    {
        return view('admin.cultura-fisica.edit', ['item' => $culturaFisicaItem]);
    }

    public function update(Request $request, CulturaFisicaItem $culturaFisicaItem)
    {
        $data = $request->validate([
            'tipo'        => 'required|in:actividad,servicio',
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen'      => 'nullable|mimes:jpeg,jpg,png,gif,webp,bmp,svg,avif|max:5120',
            'url'         => 'nullable|string|max:255',
            'orden'       => 'nullable|integer',
            'activo'      => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $this->storeImage($request->file('imagen'), 'cultura-fisica');
        }

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? 0;

        $culturaFisicaItem->update($data);

        return redirect()->route('admin.cultura-fisica.index')
            ->with('success', 'Elemento actualizado correctamente.');
    }

    public function destroy(CulturaFisicaItem $culturaFisicaItem)
    {
        $culturaFisicaItem->delete();
        return redirect()->route('admin.cultura-fisica.index')
            ->with('success', 'Elemento eliminado correctamente.');
    }
}
