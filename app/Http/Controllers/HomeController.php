<?php

namespace App\Http\Controllers;

use App\Models\CarouselItem;
use App\Models\Boletin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carouselItems = CarouselItem::activos()->get();
        // Get the 9 most recent active boletines for the carousel
        $boletines = Boletin::recientes(9)->get();

        return view('home', compact('carouselItems', 'boletines'));
    }
}
