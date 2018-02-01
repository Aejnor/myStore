@extends('layouts.app')

@section('content')
    <div>
        <p>Nombre: <strong>{{ $producto['nombre'] }}</strong></p>
        <p>Precio: <strong>{{ $producto['precio'] }}</strong></p>
    </div>
@endsection