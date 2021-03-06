@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row centro">
            <div class="col-md-6 col-md-offset-2">
                <div class="card bg-info text-center border-danger espacio centro">
                    <div class="card-header border-danger bg-info"><strong>Añadir producto</strong></div>
                    <form action="{{ url('/') }}/productos/create" id="formularioCreateProducto" method="post"
                          class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-6 control-label espacioArriba"><strong>Nombre del
                                    producto</strong></label>

                            <div class="col-md-12 ">
                                <input
                                        id="nombre"
                                        type="text"
                                        class="form-control"
                                        name="nombre"
                                        value="{{ old('nombre') }}"
                                        autofocus
                                >

                                @if($errors->has('nombre'))
                                    @foreach($errors->get('nombre') as $message)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @include('layouts.spinner')

                        </div>

                        <div class="form-group{{ $errors->has('marca') ? ' has-error' : '' }}">
                            <label for="marca" class="col-md-6 control-label"><strong>Marca</strong></label>

                            <div class="col-md-12">
                                <input
                                        id="marca"
                                        type="text"
                                        class="form-control"
                                        name="marca"
                                        value="{{ old('marca') }}"
                                        autofocus
                                >

                                @if($errors->has('marca'))
                                    @foreach($errors->get('marca') as $message)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @include('layouts.spinner')

                        </div>

                        <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                            <label for="precio" class="col-md-6 control-label"><strong>Precio</strong></label>

                            <div class="col-md-12">
                                <input
                                        id="precio"
                                        type="number"
                                        step="any"
                                        class="form-control precio"
                                        name="precio"
                                        value="{{ old('precio') }}"
                                        autofocus
                                >

                                @if($errors->has('precio'))
                                    @foreach($errors->get('precio') as $message)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @include('layouts.spinner')

                        </div>


                        <div class="form-group{{ $errors->has('categoria') ? ' has-error' : '' }}">
                            <label id="categoria" for="categoria"
                                   class="col-md-6 control-label tags"><strong>Categoria</strong></label>


                            <div class="col-md-12">
                                <input
                                        id="categoria"
                                        type="text"
                                        class="form-control tags"
                                        name="categoria"
                                        value="{{ old('categoria') }}"
                                        autofocus
                                >
                                @if($errors->has('categoria'))
                                    @foreach($errors->get('categoria') as $message)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @include('layouts.spinner')

                        </div>

                        <div class="form-group{{ $errors->has('detalle') ? ' has-error' : '' }}">
                            <label for="detalle" class="col-md-6 control-label"><strong>Detalles del
                                    producto</strong></label>

                            <div class="col-md-12">
                                <textarea
                                        id="detalle"
                                        class="form-control"
                                        name="detalle"
                                        rows="5"
                                        autofocus
                                ></textarea>

                                @if($errors->has('detalle'))
                                    @foreach($errors->get('detalle') as $message)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @include('layouts.spinner')
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4 centro">
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


@push('scripts')
    <script src="{{ asset('js/validacionProducto.js') }}"></script>
@endpush