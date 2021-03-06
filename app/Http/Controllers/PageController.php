<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function home(){
        $producto = Producto::orderBy('created_at', 'desc')->paginate(8);

        return view('home', [
            'productos' => $producto
        ]);
    }

    public function giveProducts(){
        if (request()->ajax()){
            $producto = Producto::orderBy('created_at', 'desc')->paginate(8);
            return View::make('productos.listProducts', array('productos' => $producto))->render();
        }else{
            return redirect('/');
        }
    }

}
