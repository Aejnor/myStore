
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Añadir producto</div>

                    <div class="panel-body">
                        <form action="{{ url('/') }}/productos/create" method="post" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label for="nombre" class="col-md-4 control-label">Nombre del producto</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" autofocus>

                                    @if($errors->has('nombre'))
                                        @foreach($errors->get('nombre') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('marca') ? ' has-error' : '' }}">
                                <label for="marca" class="col-md-4 control-label">Marca</label>

                                <div class="col-md-6">
                                    <input id="marca" type="text" class="form-control" name="marca" value="{{ old('marca') }}" autofocus>

                                    @if($errors->has('marca'))
                                        @foreach($errors->get('marca') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                                <label for="precio" class="col-md-4 control-label">Precio</label>

                                <div class="col-md-6">
                                    <input id="precio" type="number" step="any" class="form-control" name="precio" value="{{ old('precio') }}" autofocus>

                                    @if($errors->has('precio'))
                                        @foreach($errors->get('precio') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">
                                <label for="categoria" class="col-md-4 control-label">Categoria</label>

                                <div class="col-md-6">
                                    <input id="categoria" type="text" class="form-control" name="categoria" value="{{ old('categoria') }}" autofocus>

                                    @if($errors->has('categoria'))
                                        @foreach($errors->get('categoria') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('detalle') ? ' has-error' : '' }}">
                                <label for="detalle" class="col-md-4 control-label">Detalles del producto</label>

                                <div class="col-md-6">
                                    <textarea id="detalle" class="form-control" name="detalle" rows="5" autofocus></textarea>

                                    @if($errors->has('detalle'))
                                        @foreach($errors->get('detalle') as $message)
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Añadir producto
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection