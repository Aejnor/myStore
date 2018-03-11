@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12 text-center row">
            <table class="mt-4 table table-striped table-bordered">
                <tbody class="bg-dark">
                <tr>
                    <th scope="col" @if(Request::is('profile/configuration/account')) class="bg-color5" @endif>
                        <a href="{{route('profile.conf.account')}}">Modificar perfil</a>
                    </th>
                    <th scope="col" @if(Request::is('profile/configuration/password')) class="bg-color5" @endif>
                        <a href="{{route('profile.conf.password')}}">Modificar contraseña</a>
                    </th>
                    <th scope="col" @if(Request::is('profile/configuration/delete')) class="bg-color5" @endif>
                        <a href="{{route('profile.conf.delete')}}">Borrar usuario</a>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 form-group row center">
            @if( session('exito') )
                <div class="alert alert-success text-center" role="alert">
                    <h5>Actualización correcta</h5>
                </div>
            @elseif( session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    <h5>{{ session('error') }}</h5>
                </div>
            @endif
            <form action="{{ Request::url() }}" method="POST" enctype="multipart/form-data" class="ml-4">
                {{ csrf_field() }}
                @if(Request::is('profile/edit/account'))
                    @include('partials.account')
                @elseif(Request::is('profile/edit/password'))
                    @include('partials.password')
                @elseif(Request::is('profile/edit/delete'))
                    @include('partials.delete')
                @endif
            </form>
        </div>
    </div>
@endsection