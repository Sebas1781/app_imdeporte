<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarouselItem;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $items = CarouselItem::orderBy('orden')->get();
        return view('admin.carousel.index', compact('items'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048',
            'url_externa' => 'nullable|url|max:255',
            'orden' => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('carousel', 'public');
        }

        $data['activo'] = $request->has('activo');
        $data['orden'] = $data['orden'] ?? 0;

        CarouselItem::create($data);

        return redirect()->route('admin.carousel.index')->with('success', 'Imagen de carrusel creada correctamente.');
    }

    public function edit(CarouselItem $carousel)
    {
        return view('admin.carousel.edit', ['item' => $carousel]);
    }

    public function update(Request $request, CarouselItem $carousel)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048',
            'url_externa' => 'nullable|url|max:255',
            'orden' => 'nullable|integer',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = '/storage/' . $request->file('imagen')->store('carousel', 'public');
        }

        $data['activo'] = $request->has('activo');
        $data['orden'] = $data['orden'] ?? 0;

        $carousel->update($data);

        return redirect()->route('admin.carousel.index')->with('success', 'Imagen de carrusel actualizada correctamente.');
    }

    public function destroy(CarouselItem $carousel)
    {
        $carousel->delete();
        return redirect()->route('admin.carousel.index')->with('success', 'Imagen de carrusel eliminada correctamente.');
    }
}
