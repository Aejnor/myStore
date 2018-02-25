@extends('layouts.app')

@section('content')
    <div class="text-center">{{ $productos->links() }}</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header">Productos</h1>
            </div>
        </div>
    </div>
    @forelse($productos as $producto)
        <div class="row">
            <div class="col-4">
                <div class="main-category-image">

                    <div class="ng">Título: {{ $producto['nombre'] }}</div>

                    <div> {{ $producto['marca'] }}</div>

                    <div class="caption">
                        <h4 class="pull-left price">
                            Precio: {{ $producto['precio'] }}
                        </h4>
                        <div class="clearfix"></div>
                        <p class="product-block-description hidden-sm-down">
                            Descripción: {{ $producto['detalle'] }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <p>No hay productos para mostrar.</p>
    @endforelse

    <div class="text-center">{{ $productos->links() }}</div>

@endsection