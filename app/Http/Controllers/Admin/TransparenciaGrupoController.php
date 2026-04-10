<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransparenciaGrupo;
use Illuminate\Http\Request;

class TransparenciaGrupoController extends Controller
{
    private function validateTipo(string $tipo): void
    {
        if (!in_array($tipo, ['sevac', 'conac', 'presupuesto'])) {
            abort(404);
        }
    }

    private function tipoLabel(string $tipo): string
    {
        return match ($tipo) {
            'sevac'       => 'SEVAC',
            'conac'       => 'CONAC',
            'presupuesto' => 'Presupuesto',
            default       => strtoupper($tipo),
        };
    }

    public function index(string $tipo)
    {
        $this->validateTipo($tipo);
        $grupos = TransparenciaGrupo::withCount('secciones')
            ->where('tipo', $tipo)
            ->orderBy('anio', 'desc')
            ->get();

        return view('admin.transparencia.index', [
            'grupos'    => $grupos,
            'tipo'      => $tipo,
            'tipoLabel' => $this->tipoLabel($tipo),
        ]);
    }

    public function create(string $tipo)
    {
        $this->validateTipo($tipo);
        return view('admin.transparencia.create', [
            'tipo'      => $tipo,
            'tipoLabel' => $this->tipoLabel($tipo),
        ]);
    }

    public function store(string $tipo, Request $request)
    {
        $this->validateTipo($tipo);
        $request->validate([
            'anio' => 'required|integer|min:2000|max:2099',
        ]);

        if (TransparenciaGrupo::where('tipo', $tipo)->where('anio', $request->anio)->exists()) {
            return back()->withErrors(['anio' => 'Ya existe un periodo para este año.'])->withInput();
        }

        $orden = TransparenciaGrupo::where('tipo', $tipo)->max('orden') + 1;
        TransparenciaGrupo::create([
            'tipo'  => $tipo,
            'anio'  => $request->anio,
            'orden' => $orden,
        ]);

        return redirect()->route('admin.transparencia.index', $tipo)
            ->with('success', $this->tipoLabel($tipo) . ' ' . $request->anio . ' creado correctamente.');
    }

    public function edit(string $tipo, TransparenciaGrupo $grupo)
    {
        $this->validateTipo($tipo);
        return view('admin.transparencia.edit', [
            'grupo'     => $grupo,
            'tipo'      => $tipo,
            'tipoLabel' => $this->tipoLabel($tipo),
        ]);
    }

    public function update(string $tipo, Request $request, TransparenciaGrupo $grupo)
    {
        $this->validateTipo($tipo);
        $request->validate([
            'anio' => 'required|integer|min:2000|max:2099',
        ]);

        if (TransparenciaGrupo::where('tipo', $tipo)->where('anio', $request->anio)->where('id', '!=', $grupo->id)->exists()) {
            return back()->withErrors(['anio' => 'Ya existe un periodo para este año.'])->withInput();
        }

        $grupo->update(['anio' => $request->anio]);
        return redirect()->route('admin.transparencia.index', $tipo)
            ->with('success', 'Periodo actualizado correctamente.');
    }

    public function destroy(string $tipo, TransparenciaGrupo $grupo)
    {
        $this->validateTipo($tipo);
        $grupo->delete();
        return redirect()->route('admin.transparencia.index', $tipo)
            ->with('success', 'Periodo eliminado correctamente.');
    }
}
