@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Panel de Noticias</h3>
        </div>
        <div class="panel-body">

            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            <ul class="list-group">
                @foreach ($noticias as $noticia)
                <div class="list-group-item">
                        <label>{{$noticia->titulo}}</label>
                        <div class="pull-right">
                            <a href="{{URL::to('noticias/' . $noticia->id . '/edit')}}"><button><span style="color:blue" class="glyphicon glyphicon-pencil"></span></button></a>
                            {{ Form::open(array('route' => array('noticias.destroy', $noticia->id), 'method' => 'delete', 'class' => 'pull-right')) }}
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