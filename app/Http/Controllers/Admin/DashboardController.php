<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boletin;
use App\Models\CarouselItem;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'carousel_items' => CarouselItem::count(),
            'boletines' => Boletin::count(),
            'users' => User::count(),
            'boletines_activos' => Boletin::where('activo', true)->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
