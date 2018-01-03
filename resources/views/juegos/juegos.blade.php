@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Juegos</h1>
    </div>
    
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Nombre del Juego" aria-describedby="basic-addon2">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="button">Buscar</button>
        </span>
    </div>
    <br>

    @if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif  

    @foreach($juegos as $value => $juego)    
    <div class="well">
        <div class="media">
            <div class="media-left media-middle">
                <a href="{{route('juegos.show',$juego->id)}}">
                    <img class="media-object" height="69" src="{{$juego->imagen}}" alt="...">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{$juego->titulo}} <span class="pull-right" style="color: #00cc00"><b>{{$juego->precio}} €</b></span></h4>
                {{$categorias[$value]->nombre }}
            </div>
        </div>
    </div>
    @endforeach

    {{ $juegos->links() }}

</div>
@endsection