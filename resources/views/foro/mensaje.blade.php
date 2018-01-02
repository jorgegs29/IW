@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{$post->titulo}}</h3>
            </div>
            <div class="panel-body">

            @if (Session::has('message'))
	            <div class="alert alert-success">{{ Session::get('message') }}</div>
                <hr>
            @endif  

                @foreach($mensajes as $clave => $mensaje)
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                        <img class="media-object" src="https://robohash.org/ + {{$users[$clave]->name}} + ?size=100x100" alt="/images/imgperfil.jpg">
                        </a>
                    </div>
                    <div class="media-body">    
                        <h4 class="media-heading">{{$users[$clave]->name}} <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span> &nbsp {{$mensaje->created_at}}</small></h4>
                        {{$mensaje->contenido}}
                    </div>
                </div>
                <hr>
                @endforeach
                {{ $mensajes->links() }}

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        {{$errors->first()}}
                    </div>
                @endif
                <div class="well">
                    <h2>Nuevo Mensaje</h2>
                    {{ Form::open(array('url' => 'mensajes')) }}
                        <div class="form-group">
                            {{ Form::label('contenido', 'Contenido') }}
                            {{ Form::textarea('contenido', Input::old('contenido'), array('class' => 'form-control')) }}
                        </div>
                            {!! Form::hidden('idPost',  $post->id) !!}                            
                            {{ Form::submit('Publicar Mensaje', array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection