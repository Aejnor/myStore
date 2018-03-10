@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 class="text-center espaciobajo">Lista de Productos</h1>
            </div>
        </div>
    </div>


    <div id="productlist">
        @include('productos.listProducts')
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/paginationIndex.js') }}" defer></script>
@endpush