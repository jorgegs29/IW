@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Editar Noticia: <small>{{$noticia->titulo}}</small></h1>
    </div>
    <div class="well">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{$errors->first()}}
            </div>
        @endif

        {{ Form::model($noticia, array('route' => array('noticias.update', $noticia->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('titulo', 'Titulo') }}
                {{ Form::text('titulo', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('descripcion', 'Descripcion') }}
                {{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('juego', 'Juego') }}
                {{ Form::text('juego', null, array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('Editar Noticia', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
</div>
@endsection