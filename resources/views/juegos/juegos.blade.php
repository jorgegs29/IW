@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        {!! Form::open(array('route' => 'juegos.search', 'class'=>'form navbar-form navbar-right searchform')) !!}
            {!! Form::text('search', null, array('required', 'class'=>'form-control', 'placeholder'=>'Buscar Juego')) !!}
            {!! Form::submit('Buscar', array('class'=>'btn btn-primary')) !!}
        {!! Form::close() !!}
        <h1>Juegos</h1>
    </div>
    
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