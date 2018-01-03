@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Foro</h3>
            </div>
            <div class="panel-body">
                @foreach($juegos as $value => $juego)
                    <ul class="list-group">
                        <a href="{{route('foro.post',$juego->id)}}" style="text-decoration:none; color: inherit">
                            <li class="list-group-item"><span class="badge">{{$numPosts[$value]}}</span>
                            <span class="glyphicon glyphicon-tower"></span> &nbsp {{$juego->titulo}}</li>
                        </a>
                    </ul>
                @endforeach
                {{ $juegos->links() }}
            </div>
        </div>
    </div>
@endsection