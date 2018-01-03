@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Editar Juego: <small>{{$juego->titulo}}</small></h1>
    </div>
    <div class="well">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{$errors->first()}}
            </div>
        @endif

        {{ Form::model($juego, array('route' => array('juegos.update', $juego->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('titulo', 'Titulo') }}
                {{ Form::text('titulo', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('descripcion', 'Descripcion') }}
                {{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('precio', 'Precio') }}
                {{ Form::number('precio', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('imagen', 'Imagen') }}
                {{ Form::text('imagen', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('idCategoria', 'Categoria') }}
                {!! Form::select('idCategoria', $categorias->pluck('nombre','id'), null, ['class' => 'form-control']) !!}
            </div>
            {{ Form::submit('Editar Juego', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
</div>
@endsection