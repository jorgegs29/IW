@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Editar Noticia: <small>{{$noticia->titulo}}</small></h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
        {{ Form::model($noticia, array('route' => array('noticias.update', $noticia->id), 'method' => 'PUT')) }}

            <div class="form-group">
                {{ Form::label('titulo', 'Titulo') }}
                {{ Form::text('titulo', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('descripcion', 'Email') }}
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
</div>

@endsection