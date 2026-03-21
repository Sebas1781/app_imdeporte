<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstitutoConfig;
use App\Models\OrganigramaItem;
use Illuminate\Http\Request;

class InstitutoController extends Controller
{
    public function index()
    {
        $config = InstitutoConfig::first();
        $items  = OrganigramaItem::orderBy('nivel')->orderBy('orden')->get();

        return view('admin.instituto.index', compact('config', 'items'));
    }

    public function updateConfig(Request $request)
    {
        $data = $request->validate([
            'descripcion'     => 'nullable|string',
            'titular_nombre'  => 'nullable|string|max:255',
            'titular_cargo'   => 'nullable|string|max:255',
            'titular_imagen'  => 'nullable|mimes:jpeg,jpg,png,gif,webp,avif|max:5120',
        ]);

        if ($request->hasFile('titular_imagen')) {
            $data['titular_imagen'] = $this->storeImage($request->file('titular_imagen'), 'instituto');
        }

        InstitutoConfig::updateOrCreate(['id' => 1], $data);

        return redirect()->route('admin.instituto.index')
            ->with('success', 'Información del instituto actualizada.');
    }

    public function storeItem(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'nivel'  => 'required|integer|in:1,2,3',
            'orden'  => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? 0;

        OrganigramaItem::create($data);

        return redirect()->route('admin.instituto.index')
            ->with('success', 'Elemento del organigrama creado.');
    }

    public function updateItem(Request $request, OrganigramaItem $item)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'nivel'  => 'required|integer|in:1,2,3',
            'orden'  => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        $data['activo'] = $request->has('activo');
        $data['orden']  = $data['orden'] ?? 0;

        $item->update($data);

        return redirect()->route('admin.instituto.index')
            ->with('success', 'Elemento del organigrama actualizado.');
    }

    public function destroyItem(OrganigramaItem $item)
    {
        $item->delete();

        return redirect()->route('admin.instituto.index')
            ->with('success', 'Elemento del organigrama eliminado.');
    }
}
