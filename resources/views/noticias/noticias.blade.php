@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Noticias</h1>
    </div>

    @if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif  

    @foreach ($noticias as $noticia)
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><big>{{$noticia->titulo}}</big></h3>
            <h5>{{$noticia->created_at}}</h5>
            <h5>{{$noticia->juego}}</h5>
        </div>
        <div class="panel-body">
            {{$noticia->descripcion}}
        </div>
    </div>
    @endforeach
    {{ $noticias->links() }}

</div>
@endsection