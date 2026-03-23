<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $existe = file_exists(public_path('documents/AvisoPrivacidad.pdf'));
        return view('admin.documentos.index', compact('existe'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $dir = public_path('documents');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $request->file('pdf')->move($dir, 'AvisoPrivacidad.pdf');

        return redirect()->route('admin.documentos.index')
            ->with('success', 'Aviso de Privacidad actualizado correctamente.');
    }
}
