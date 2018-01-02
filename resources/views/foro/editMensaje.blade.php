@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Editar Mensaje</h1>
    </div>
    <div class="well">
        {{ Form::model($mensaje, array('route' => array('mensajes.update', $mensaje->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('contenido', 'Contenido') }}
                {{ Form::textarea('contenido', null, array('class' => 'form-control')) }}
            </div>
            {{ Form::submit('Editar Mensaje', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
</div>
@endsection