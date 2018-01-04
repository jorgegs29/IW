@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Foro de {{$juego->titulo}}</h3>
            </div>
            <div class="panel-body">
                @if (Auth::check())
                    {{ Form::open(array('route' => 'posts.store')) }}
                    <div class="input-group">
                            {!! Form::text('titulo', Input::old('titulo'), array('required', 'type'=>'text', 'class'=>'form-control', 'placeholder'=>'Nombre del Post')) !!}
                            {!! Form::hidden('idJuego',  $juego->id) !!}
                            <span class="input-group-btn">                            
                                {{ Form::submit('+ Crear Post', array('class' => 'btn btn-success')) }}
                            </span>
                        </div><br>
                    {{ Form::close() }}
                @endif

                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif  

                @foreach ($posts as $clave => $post)
                    <ul class="list-group">
                        <a href="{{route('posts.show',$post->id)}}" style="text-decoration:none; color: inherit">
                            <li class="list-group-item"><span class="badge">{{$numMensajes[$clave]}}</span>
                            <span class="glyphicon glyphicon-envelope"></span> &nbsp {{$post->titulo}}</li>
                        </a>
                    </ul>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection