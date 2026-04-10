<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransparenciaGrupo;
use App\Models\TransparenciaSeccion;
use App\Models\TransparenciaDocumento;
use Illuminate\Http\Request;

class TransparenciaDocumentoController extends Controller
{
    private function tipoLabel(string $tipo): string
    {
        return match ($tipo) {
            'sevac'       => 'SEVAC',
            'conac'       => 'CONAC',
            'presupuesto' => 'Presupuesto',
            default       => strtoupper($tipo),
        };
    }

    public function index(string $tipo, TransparenciaGrupo $grupo, TransparenciaSeccion $seccion)
    {
        $documentos = $seccion->documentos()->orderBy('orden')->get();
        return view('admin.transparencia.documentos.index', [
            'grupo'      => $grupo,
            'seccion'    => $seccion,
            'documentos' => $documentos,
            'tipo'       => $tipo,
            'tipoLabel'  => $this->tipoLabel($tipo),
        ]);
    }

    public function create(string $tipo, TransparenciaGrupo $grupo, TransparenciaSeccion $seccion)
    {
        return view('admin.transparencia.documentos.create', [
            'grupo'     => $grupo,
            'seccion'   => $seccion,
            'tipo'      => $tipo,
            'tipoLabel' => $this->tipoLabel($tipo),
        ]);
    }

    public function store(string $tipo, TransparenciaGrupo $grupo, TransparenciaSeccion $seccion, Request $request)
    {
        $tipoArchivo = $request->input('tipo_archivo', 'pdf');

        if ($tipoArchivo === 'pdf') {
            $request->validate([
                'nombre'       => 'required|string|max:255',
                'tipo_archivo' => 'required|in:pdf,link',
                'archivo'      => 'required|file|mimes:pdf|max:20480',
            ]);

            $file     = $request->file('archivo');
            $ext      = strtolower($file->getClientOriginalExtension());
            $filename = uniqid() . '.' . $ext;
            $dir      = public_path('uploads/transparencia');

            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            $file->move($dir, $filename);
            $archivo = '/uploads/transparencia/' . $filename;
        } else {
            $request->validate([
                'nombre'       => 'required|string|max:255',
                'tipo_archivo' => 'required|in:pdf,link',
                'archivo'      => 'required|url|max:2048',
            ]);

            $archivo = $request->input('archivo');
        }

        $orden = TransparenciaDocumento::where('seccion_id', $seccion->id)->max('orden') + 1;
        TransparenciaDocumento::create([
            'seccion_id'   => $seccion->id,
            'nombre'       => $request->nombre,
            'tipo_archivo' => $tipoArchivo,
            'archivo'      => $archivo,
            'orden'        => $orden,
            'activo'       => true,
        ]);

        return redirect()->route('admin.transparencia.documentos.index', [$tipo, $grupo, $seccion])
            ->with('success', 'Documento agregado correctamente.');
    }

    public function destroy(string $tipo, TransparenciaGrupo $grupo, TransparenciaSeccion $seccion, TransparenciaDocumento $documento)
    {
        if ($documento->tipo_archivo === 'pdf') {
            $filePath = public_path($documento->archivo);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $documento->delete();
        return redirect()->route('admin.transparencia.documentos.index', [$tipo, $grupo, $seccion])
            ->with('success', 'Documento eliminado correctamente.');
    }
}
