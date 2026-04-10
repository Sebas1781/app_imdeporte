<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransparenciaGrupo;
use App\Models\TransparenciaSeccion;
use Illuminate\Http\Request;

class TransparenciaSeccionController extends Controller
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

    public function index(string $tipo, TransparenciaGrupo $grupo)
    {
        $secciones = $grupo->secciones()->withCount('documentos')->orderBy('orden')->get();
        return view('admin.transparencia.secciones.index', [
            'grupo'     => $grupo,
            'secciones' => $secciones,
            'tipo'      => $tipo,
            'tipoLabel' => $this->tipoLabel($tipo),
        ]);
    }

    public function create(string $tipo, TransparenciaGrupo $grupo)
    {
        return view('admin.transparencia.secciones.create', [
            'grupo'     => $grupo,
            'tipo'      => $tipo,
            'tipoLabel' => $this->tipoLabel($tipo),
        ]);
    }

    public function store(string $tipo, TransparenciaGrupo $grupo, Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
        ]);

        $orden = TransparenciaSeccion::where('grupo_id', $grupo->id)->max('orden') + 1;
        TransparenciaSeccion::create([
            'grupo_id' => $grupo->id,
            'titulo'   => $request->titulo,
            'orden'    => $orden,
        ]);

        return redirect()->route('admin.transparencia.secciones.index', [$tipo, $grupo])
            ->with('success', 'Sección "' . $request->titulo . '" creada correctamente.');
    }

    public function destroy(string $tipo, TransparenciaGrupo $grupo, TransparenciaSeccion $seccion)
    {
        $seccion->delete();
        return redirect()->route('admin.transparencia.secciones.index', [$tipo, $grupo])
            ->with('success', 'Sección eliminada correctamente.');
    }
}
