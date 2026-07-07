<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PadaController extends Controller
{
    private string $dir      = 'uploads/pada';
    private string $filename = 'pada.pdf';

    public function index()
    {
        $existe = file_exists(public_path("{$this->dir}/{$this->filename}"));
        $url    = $existe ? "/{$this->dir}/{$this->filename}" : null;

        return view('admin.pada.index', compact('existe', 'url'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:20480',
        ]);

        $dir = public_path($this->dir);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $request->file('pdf')->move($dir, $this->filename);

        return redirect()->route('admin.pada.index')
            ->with('success', 'Archivo PADA actualizado correctamente.');
    }
}
