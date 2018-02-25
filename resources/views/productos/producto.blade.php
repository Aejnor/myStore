@if($productos->isEmpty())
    <p>No hay productos para mostrar.</p>
@endif

@foreach($productos->chunk(1) as $chunk)
    <div class="container">
        <div class="row">
            @foreach($chunk as $producto)
                <div class="col-md-12">
                    <div class="card card-body border-secondary mb-3 text-center centro bg-light">
                        <div class="card-header bg-secondary text-white">
                            <h3>
                                Producto: {{ $producto['nombre'] }}
                            </h3>
                        </div>

                        <ul class="list-group list-group-flush">
                            <div class="list-group-item bg-light">
                                <span><strong>Marca:</strong></span> {{ $producto['marca'] }}
                            </div>
                            <div class="list-group-item bg-light">
                                <span class="price">
                                    <strong>Precio:</strong> {{ $producto['precio'] }} €
                                </span>
                            </div>
                            <div class="list-group-item bg-light">
                                <p>
                                    <strong>Descripción: </strong>{{ $producto['detalle'] }}
                                </p>
                            </div>
                        </ul>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
@endforeach