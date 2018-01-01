@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Foro del Juego ???</h3>
            </div>
            <div class="panel-body">
                @foreach ($posts as $clave => $post)
                    <ul class="list-group">
                        <a href="" style="text-decoration:none; color: inherit">
                            <li class="list-group-item"><span class="badge">{{$numMensajes[$clave]}}</span>
                            <span class="glyphicon glyphicon-envelope"></span> {{$post->titulo}}</li>
                        </a>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
@endsection