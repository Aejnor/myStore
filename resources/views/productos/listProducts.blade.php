@foreach($productos->chunk(3) as $chunk)
    <div class="row">
        @foreach($chunk as $producto)
            <div class="col-md-4">
                <div class="card card-body border-secondary mb-2 centro bg-light">
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
                        <div class="list-group-item bg-light">
                            <strong>Vendedor: <a class="badge badge-pill badge-info pull-right"
                                                 href="/user/{{ $producto->user->username }}">
                                    {{ $producto->user->name.' '.$producto->user->surname }}
                                </a></strong>
                        </div>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

<div class="pagination">{{ $productos->links("pagination::bootstrap-4") }}</div>
