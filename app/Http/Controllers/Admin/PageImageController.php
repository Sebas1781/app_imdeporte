<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageImage;
use Illuminate\Http\Request;

class PageImageController extends Controller
{
    public function index()
    {
        $sectionImages = PageImage::orderBy('nombre')->get();
        return view('admin.imagenes-vistas.index', compact('sectionImages'));
    }

    public function edit(PageImage $pageImage)
    {
        return view('admin.imagenes-vistas.edit', compact('pageImage'));
    }

    public function update(Request $request, PageImage $pageImage)
    {
        $request->validate([
            'imagen' => 'required|mimes:jpeg,jpg,png,gif,webp,bmp,svg,avif|max:5120',
        ]);

        $pageImage->update([
            'ruta' => $this->storeImage($request->file('imagen'), 'page-images'),
        ]);

        return redirect()->route('admin.imagenes-vistas.index')
            ->with('success', 'Imagen de "' . $pageImage->nombre . '" actualizada correctamente.');
    }
}
