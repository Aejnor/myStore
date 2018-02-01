@extends('layouts.app')

@section('content')
    <div class="text-center">{{ $productos->links() }}</div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 class="page-header">Productos</h1>
            </div>
        </div>
    </div>
    @foreach($productos->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $producto)
                <div class="col-md-4 space panel-success">
                    <div>
                        <a class="btn pull-right" href="/user/{{ $producto->user->username }}">
                            {{ $producto->user->username }}
                        </a>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Producto: {{ $producto['nombre'] }}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div>
                            <span> Marca:</span> {{ $producto['marca'] }}
                        </div>

                        <div>
                            <h4 class="price">
                                Precio: {{ $producto['precio'] }} €
                            </h4>
                        </div>
                        <div>
                            <p>
                                Descripción: {{ $producto['detalle'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="text-center">{{ $productos->links() }}</div>

@endsection