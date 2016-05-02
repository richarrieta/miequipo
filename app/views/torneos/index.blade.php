@extends('layouts.master')
@section('contenido')
 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-danger">
        @foreach ($torneos as $torneo)
        <div class="panel-heading" data-toggle="collapse" data-parent="#Panel{{$torneo->id}}" href="#Panel{{$torneo->id}}">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#Panel{{$torneo->id}}" href="#Panel{{$torneo->id}}">
                    <b>{{$torneo->nombre}}</b>
                </a>
            </h4>
        </div>
        <div id="Panel{{$torneo->id}}" class="panel-collapse collapse">
            <div class="panel-body">
                {{$torneo->id}}
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
@section('javascript')
{{HTML::script('js/views/torneos/index.js')}}
@stop

