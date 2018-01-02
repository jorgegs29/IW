@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Foro</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <a href="{{route('foro.post',$idJuego)}}" style="text-decoration:none; color: inherit">
                        <li class="list-group-item"><span class="badge">14</span>
                        <span class="glyphicon glyphicon-tower"></span> &nbsp Cras justo odio</li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
@endsection