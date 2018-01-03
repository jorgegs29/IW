@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">{{$juego->titulo}}</h3>
        </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="{{$juego->imagen}}" alt="/images/imgjuego.jpg">
                    </a>
                </div>
                <div class="media-body">
                <div class="well">
                    <h4><span class="label label-warning">Titulo: {{$juego->titulo}}</span></h4>
                    <h4><span class="label label-success">Precio: {{$juego->precio}} €</span></h4>
                    <h4><span class="label label-info">Categoria: {{$categoria->nombre}}</span></h4>
                    <h4><span class="label label-default">Desarrollador: {{$usuario->name}}</span></h4>
                </div>
                </div>
                <br>
                <div class="well">
                    <h4><span class="label label-primary">Descripcion </span></h4>
                    <h4>{{$juego->descripcion}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection