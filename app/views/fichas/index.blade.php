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
                <div class="col-xs-12 col-sm-1 col-md-1">
                    @if($ficha->personaJugador->foto !="")
                    {{ HTML::image($base_path . $ficha->personaJugador->id . DIRECTORY_SEPARATOR . $ficha->personaJugador->foto, 'Foto', array('id'=>'fotoJugador','class'=>'img-responsive')) }}
                    @else
                    {{ HTML::image('img/usericon.jpg', 'No hay foto aun',array('id'=>'fotoJugador','class'=>'img-responsive')) }}
                    @endif
                </div>
                {{Form::hidden('fichas[]', $ficha->id)}}
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <b>{{$ficha->personaJugador->nombre_completo}}</b>
                    @unless($ficha->personaJugador->informacion_contacto)
                    <br><a href="#" data-toggle="tooltip" data-original-title="{{$ficha->personaJugador->informacion_contacto}}">(Información de contacto)</a> 
                    @endunless
                    <br>Representante: {{$ficha->personaRepresentante->nombre_completo}}
                    <br>Cédula: <b>{{$ficha->personaRepresentante->ci}}</b>
                    <br><a href="#" data-toggle="tooltip" data-original-title="{{$ficha->personaRepresentante->informacion_contacto}}">(Información de contacto)</a>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <br>Ficha: <b>{{$ficha->numero}}</b><br>
                    <br>Ano: <b>{{$ficha->personaJugador->anio}}</b>
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