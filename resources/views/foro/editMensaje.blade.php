@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Editar Mensaje</h1>
    </div>
    <div class="well">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{$errors->first()}}
            </div>
        @endif

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