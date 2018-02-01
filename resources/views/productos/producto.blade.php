@if($productos->isEmpty())
    <p>No hay productos para mostrar.</p>
@endif

@foreach($productos->chunk(1) as $chunk)
    <div class="container">
        <div class="row panel">
            @foreach($chunk as $producto)
                <div class="col-md-12">
                    <div>
                        <a class="btn pull-right" href="/user/{{ $producto->user->username }}">
                            {{ $producto->user->username }}
                        </a>
                    </div>

                    <div>
                        <h4>
                            Producto: {{ $producto['nombre'] }}
                        </h4>
                    </div>

                    <div>
                        <h4>
                            <strong>Precio:</strong> {{ $producto['precio'] }} €
                        </h4>
                    </div>
                    <div>
                        <p>
                            <strong>Descripción:</strong> {{ $producto['detalle'] }}
                        </p>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
@endforeach