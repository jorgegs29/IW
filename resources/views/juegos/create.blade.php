@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Nuevo Juego</h1>
    </div>
        <div class="well">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{$errors->first()}}
                </div>
            @endif

            {{ Form::open(array('url' => 'juegos')) }}
                <div class="form-group">
                    {{ Form::label('titulo', 'Titulo') }}
                    {{ Form::text('titulo', Input::old('titulo'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('descripcion', 'Descripcion') }}
                    {{ Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('precio', 'Precio') }}
                    {{ Form::number('precio', Input::old('precio'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('imagen', 'Imagen') }}
                    {{ Form::text('imagen', Input::old('imagen'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('idCategoria', 'Categoria') }}
                    {!! Form::select('idCategoria', $categorias->pluck('nombre','id'), Input::old('idCategoria'), ['class' => 'form-control']) !!}
                </div>
                    {{ Form::submit('Publicar Juego', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
</div>
@endsection