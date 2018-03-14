@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12 text-center row">
            <table class="mt-4 table table-striped table-bordered">
                <tbody class="bg-dark">
                <tr>
                    <th scope="col" @if(Request::is('profile/edit/account')) class="bg-color5" @endif>
                        <a href="{{route('profile.account')}}">Modificar perfil</a>
                    </th>
                    <th scope="col" @if(Request::is('profile/edit/password')) class="bg-color5" @endif>
                        <a href="{{route('profile.password')}}">Modificar contraseña</a>
                    </th>
                    <th scope="col" @if(Request::is('profile/edit/delete')) class="bg-color5" @endif>
                        <a href="{{route('profile.delete')}}">Borrar usuario</a>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 form-group row justify-content-center">
            @if( session('exito') )
                <div class="alert alert-success text-center" role="alert">
                    <h5>Actualización correcta</h5>
                </div>
            @elseif( session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    <h5>{{ session('error') }}</h5>
                </div>
            @endif
            <form action="{{ Request::url() }}" method="POST" id="formularioEditarUser" enctype="multipart/form-data" class="col-md-8">
                {{ csrf_field() }}
                <div class="card">
                @if(Request::is('profile/edit/account'))
                    @include('users.partials.account')
                @elseif(Request::is('profile/edit/password'))
                    @include('users.partials.password')
                @elseif(Request::is('profile/edit/delete'))
                    @include('users.partials.delete')
                @endif
                </div>
            </form>
        </div>
    </div>
@endsection