@extends('layouts.app')

@section('content')
    <div class="text-center mt-2 mb-3">
        <h1>Productos de {{ $user['name'].' '.$user['surname'] }}</h1>
    </div>
    @include('productos.producto')
    <div class="text-center">{{ $productos->links('pagination::bootstrap-4') }}</div>
@endsection