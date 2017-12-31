@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Perfil de Usuario</h3>
            </div>
            <div class="panel-body">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                        <img class="media-object" src="images/imgperfil.jpg" alt="">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4><span class="glyphicon glyphicon-user"></span> {{$user->name}}</h4>
                        <h4><span class="glyphicon glyphicon-envelope"></span> {{$user->email}}</h4>
                        <h4><span class="glyphicon glyphicon-console"></span> Desarrollador</h4>
                    </div>
                </div>
            </div>

            <div class="well">
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-primary">Mensajes</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-success">Juegos</button>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('perfil.noticias') }}" class="btn btn-warning" >Noticias</a>
                    </div>
                </div>
                <hr>
                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-success">Añadir Juego</button>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="{{ route('noticias.create') }}" class="btn btn-warning" >Añadir Noticia</a>
                    </div>
                </div>

            </div>
        </div>
    </div>  
@endsection