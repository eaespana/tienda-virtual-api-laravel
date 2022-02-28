<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{

    public function index(Request $request)
    {
        return Inertia::render('Articulo/index',[
            'articulos' => Articulo::latest()
                        ->where('nombre_articulo', 'LIKE', "%$request->q%")
                        ->get()
        ]);
    }

    public function show(Articulo $articulo)
    {
        return Inertia::render('Articulo/Show',compact('articulo'));
    }


}
