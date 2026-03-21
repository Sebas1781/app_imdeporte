<?php

namespace App\Http\Controllers;

use App\Models\InstitutoConfig;
use App\Models\OrganigramaItem;

class InstitutoController extends Controller
{
    public function index()
    {
        $config = InstitutoConfig::first();
        $items  = OrganigramaItem::where('activo', true)->orderBy('nivel')->orderBy('orden')->get();

        return view('instituto.index', compact('config', 'items'));
    }
}
