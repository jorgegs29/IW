@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Nueva Noticia</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            {{ Form::open(array('url' => 'noticias')) }}

                <div class="form-group">
                    {{ Form::label('titulo', 'Titulo') }}
                    {{ Form::text('titulo', Input::old('titulo'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('descripcion', 'Descripcion') }}
                    {{ Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('juego', 'Juego') }}
                    {{ Form::text('juego', Input::old('juego'), array('class' => 'form-control')) }}
                </div>

                    {{ Form::submit('Publicar Noticia', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection