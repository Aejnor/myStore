<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductoRequest;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * @param Producto $productos
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show(Producto $productos)
    {
        return view('productos.show', [
            'productos' => $productos
        ]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        return view('productos.create');
    }


    public function store(CreateProductoRequest $request){
        Producto::create([
            'nombre'    => $request->input('nombre'),
            'marca'     => $request->input('marca'),
            'precio'    => $request->input('precio'),
            'detalle'   => $request->input('detalle'),
            'categoria' => $request->input('categoria')
        ]);

        return redirect('/');
    }

}