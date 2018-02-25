@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-dark">
            <div class="card-header bg-dark text-white">
                <h2 class="card-title text-center"><img src="{{$user->avatar}}" width="40px" height="40px">    {{$user->name.' '.$user->surname }}</h2>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-md-6">
                    <p><span class="badge-info badge-pill">Nombre:</span> <strong>{{$user->name }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="badge-info badge-pill">Apellidos:</span> <strong>{{$user->surname }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="badge-info badge-pill">Email:</span> <strong>{{$user->email }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="badge-info badge-pill">Web:</span> <strong>{{$user->website }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="badge-info badge-pill">Direccion:</span> <strong>{{$user->address }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="badge-info badge-pill">Telefono:</span> <strong>{{$user->phone}}</strong></p>
                </div>
                <div class="col-md-12">
                    <p><span class="badge-info badge-pill">Descripcion:</span> <strong>{{$user->about }}</strong></p>
                </div>
            </div>


        </div>
    </div>
@endsection