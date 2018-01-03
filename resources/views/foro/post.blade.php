@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Foro de {{$juego->titulo}}</h3>
            </div>
            <div class="panel-body">
                @foreach ($posts as $clave => $post)
                    <ul class="list-group">
                        <a href="{{route('posts.show',$post->id)}}" style="text-decoration:none; color: inherit">
                            <li class="list-group-item"><span class="badge">{{$numMensajes[$clave]}}</span>
                            <span class="glyphicon glyphicon-envelope"></span> &nbsp {{$post->titulo}}</li>
                        </a>
                    </ul>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection