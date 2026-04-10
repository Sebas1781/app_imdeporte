<?php

namespace App\Http\Controllers;

use App\Models\TransparenciaGrupo;

class TransparenciaController extends Controller
{
    public function index()
    {
        return view('transparencia.index');
    }

    public function leyContabilidad()
    {
        $load = [
            'secciones',
            'secciones.documentos' => fn($q) => $q->where('activo', true)->orderBy('orden'),
        ];

        $sevacGrupos       = TransparenciaGrupo::with($load)->where('tipo', 'sevac')->orderBy('anio', 'desc')->get();
        $conacGrupos       = TransparenciaGrupo::with($load)->where('tipo', 'conac')->orderBy('anio', 'desc')->get();
        $presupuestoGrupos = TransparenciaGrupo::with($load)->where('tipo', 'presupuesto')->orderBy('anio', 'desc')->get();

        return view('transparencia.ley-contabilidad', compact('sevacGrupos', 'conacGrupos', 'presupuestoGrupos'));
    }
}
