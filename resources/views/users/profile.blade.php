@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="panel-title text-center">{{$user->username }}</h2>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-md-6">
                    <p><span class="label label-info">Nombre:</span> <strong>{{$user->name }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="label label-info">Apellidos:</span> <strong>{{$user->surname }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="label label-info">Email:</span> <strong>{{$user->email }}</strong></p>
                </div>
                <div class="col-md-6">
                    <p><span class="label label-info">Web:</span> <strong>{{$user->website }}</strong></p>
                </div>
                <div class="col-md-12">
                    <p><span class="label label-info">Biografia:</span> <strong>{{$user->about }}</strong></p>
                </div>
            </div>


        </div>
    </div>
@endsection