@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Panel de Mensajes</h3>
        </div>
        <div class="panel-body">

            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{$errors->first()}}
                </div>
            @endif 

            <ul class="list-group">
                @foreach ($mensajes as $mensaje)
                <div class="list-group-item">
                        <label>{{$mensaje->contenido}}</label>
                        <div class="pull-right">
                            <a href="{{URL::to('mensajes/' . $mensaje->id . '/edit')}}"><button><span style="color:blue" class="glyphicon glyphicon-pencil"></span></button></a>
                            {{ Form::open(array('route' => array('mensajes.destroy', $mensaje->id), 'method' => 'delete', 'class' => 'pull-right')) }}
                            <button type="submit"><span style="color:red" class="glyphicon glyphicon-trash"></span></button>
                            {{ Form::close() }}   
                        </div>
                </div>   
                @endforeach
            </ul>
        </div>
    </div>
</div> 
@endsection