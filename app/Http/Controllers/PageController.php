<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function home(){
        $producto = Producto::orderBy('created_at', 'desc')->paginate(9);

        return view('home', [
            'productos' => $producto
        ]);
    }

}
