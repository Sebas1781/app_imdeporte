<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RemtysCategoria;
use App\Models\RemtysDocumento;
use Illuminate\Http\Request;

class RemtysDocumentoController extends Controller
{
    public function index(RemtysCategoria $categoria)
    {
        $documentos = $categoria->documentos()->orderBy('orden')->get();
        return view('admin.remtys.documentos.index', compact('categoria', 'documentos'));
    }

    public function create(RemtysCategoria $categoria)
    {
        return view('admin.remtys.documentos.create', compact('categoria'));
    }

    public function store(Request $request, RemtysCategoria $categoria)
    {
        $tipo = $request->input('tipo_archivo', 'pdf');

        if ($tipo === 'pdf') {
            $request->validate([
                'nombre'         => 'required|string|max:255',
                'tipo_archivo'   => 'required|in:pdf,link',
                'archivo'        => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:20480',
                'activo'         => 'nullable|boolean',
            ]);

            $file     = $request->file('archivo');
            $ext      = strtolower($file->getClientOriginalExtension());
            $filename = uniqid() . '.' . $ext;
            $dir      = public_path('uploads/remtys');

            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            $file->move($dir, $filename);
            $archivo = '/uploads/remtys/' . $filename;
        } else {
            $request->validate([
                'nombre'         => 'required|string|max:255',
                'tipo_archivo'   => 'required|in:pdf,link',
                'archivo'        => 'required|url|max:2048',
                'activo'         => 'nullable|boolean',
            ]);

            $archivo = $request->input('archivo');
        }

        // Auto-generar orden basado en el último documento
        $ultimoOrden = $categoria->documentos()->max('orden') ?? 0;
        $nuevoOrden = $ultimoOrden + 1;

        $categoria->documentos()->create([
            'nombre'        => $request->nombre,
            'tipo_archivo'  => $tipo,
            'archivo'       => $archivo,
            'orden'         => $nuevoOrden,
            'activo'        => $request->has('activo'),
        ]);

        return redirect()->route('admin.remtys.documentos.index', $categoria)
            ->with('success', 'Documento subido correctamente.');
    }

    public function destroy(RemtysCategoria $categoria, RemtysDocumento $documento)
    {
        $documento->delete();
        return redirect()->route('admin.remtys.documentos.index', $categoria)
            ->with('success', 'Documento eliminado correctamente.');
    }
}
