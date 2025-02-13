<?php

namespace App\Http\Controllers;

use App\Models\CatImage;

class CatImageController extends Controller
{
    /**
     * Mostra la galeria de gats des de la base de dades.
     */
    public function index()
    {
        $cats = CatImage::paginate(6); // Paginació de 6 imatges per pàgina
        return view('cats.index', compact('cats'));
    }
}
