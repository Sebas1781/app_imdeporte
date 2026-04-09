<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RemtysCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RemtysCategoriaController extends Controller
{
    private static function colors(): array
    {
        return [
            '#DC2626' => 'Rojo',
            '#EA580C' => 'Naranja',
            '#D97706' => 'Ámbar',
            '#16A34A' => 'Verde',
            '#0D9488' => 'Teal',
            '#2563EB' => 'Azul',
            '#4F46E5' => 'Índigo',
            '#7C3AED' => 'Violeta',
            '#9333EA' => 'Púrpura',
            '#7B2D8E' => 'Morado IMDEPORTE',
            '#DB2777' => 'Rosa',
        ];
    }

    public function index()
    {
        $categorias = RemtysCategoria::withCount('documentos')->orderBy('nombre')->get();
        return view('admin.remtys.index', compact('categorias'));
    }

    public function create()
    {
        $colors = self::colors();
        return view('admin.remtys.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'slug'   => 'nullable|string|max:255|unique:remtys_categorias,slug',
            'color'  => 'required|string|max:20',
            'icono'  => 'nullable|string|max:100',
        ]);

        $data['slug']  = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['nombre']);
        $data['icono'] = $data['icono'] ?? 'fa-folder';

        RemtysCategoria::create($data);

        return redirect()->route('admin.remtys.index')->with('success', 'Categoría creada correctamente.');
    }

    public function edit(RemtysCategoria $categoria)
    {
        $colors = self::colors();
        return view('admin.remtys.edit', compact('categoria', 'colors'));
    }

    public function update(Request $request, RemtysCategoria $categoria)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'slug'   => 'nullable|string|max:255|unique:remtys_categorias,slug,' . $categoria->id,
            'color'  => 'required|string|max:20',
            'icono'  => 'nullable|string|max:100',
        ]);

        $data['slug']  = !empty($data['slug']) ? Str::slug($data['slug']) : Str::slug($data['nombre']);
        $data['icono'] = $data['icono'] ?? 'fa-folder';
        $categoria->update($data);

        return redirect()->route('admin.remtys.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(RemtysCategoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.remtys.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
