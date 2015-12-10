@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-danger">
        <div class="panel-heading" data-toggle="collapse" data-parent="#PanelBusqueda" href="#PanelBusqueda">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#PanelBusqueda" href="#PanelBusqueda">
                    Búsqueda
                </a>
            </h4>
        </div>
        <div id="PanelBusqueda" class="panel-collapse collapse">
            <div class="panel-body">
                {{Form::busqueda(['url'=>'fichas','method'=>'GET'])}}                
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>

                        <a href="{{url('fichas')}}" class="btn btn-default btn-reset"><i class="glyphicon glyphicon-trash"></i> Cancelar</a>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <div class="panel panel-danger">
        <div class="panel-heading"></div>
        <div class="panel-body" id='fichas-lista'>
            @foreach ($fichas as $ficha)
            <div class="row filaLista marcar-ficha">
                {{Form::hidden('fichas[]', $ficha->id)}}
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <b>{{$ficha->jugador->nombre_completo}}</b>
                    <br><a href="#" data-toggle="tooltip" data-original-title="{{$ficha->jugador->informacion_contacto}}">(Información de contacto)</a>                            
                    <br>Representante: {{$ficha->representante->nombre_completo}}
                    <br>Cédula: <b>{{$ficha->representante->ci}}</b><br>
                    <br><a href="#" data-toggle="tooltip" data-original-title="{{$ficha->representante->informacion_contacto}}">(Información de contacto)</a>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <br>Ficha: <b>{{$ficha->numero}}</b><br>
                    <br>Estatus: <b>{{$ficha->estatus_display}}</b>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3">
                </div>

                <div class="col-xs-12 col-sm-2 col-md-2 text-right">
                    {{HTML::button('fichas/ver/'.$ficha->id, 'search','Ver Ficha')}}
                    <?php
                    $id = Sentry::getUser()->id;
                    ?>
                    {{HTML::button('fichas/modificar/'.$ficha->id, 'pencil','Modificar Ficha')}}
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@stop
@section('javascript')
{{HTML::script('js/views/fichas/index.js')}}
@stop