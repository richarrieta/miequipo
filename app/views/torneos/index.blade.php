@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-danger">
        @foreach ($torneos as $torneo)
        @foreach ($torneo->temporadas as $temporada)
        @if($temporada->ind_active)
        <div class="panel-heading" data-toggle="collapse" data-parent="#Panel{{$torneo->id}}" href="#Panel{{$torneo->id}}">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#Panel{{$torneo->id}}" href="#Panel{{$torneo->id}}">
                    <b>{{$torneo->nombre}}</b> &nbsp;Temporada &nbsp; <b>( {{$temporada->periodo}} )</b>
                    <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                </a>
            </h4>
        </div>
        <div id="Panel{{$torneo->id}}" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="panel-heading">
                    @foreach ($temporada->temporadasCategorias as $categoria)                        
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="panel panel-danger">
                            <div class="table-responsive">
                                <table class="table table-bordered"> 
                                    <thead> 
                                        <tr> 
                                            <th>Categoria</th> 
                                            <th><span class="badge">{{$categoria->nombre}}</span></th>  
                                            <th>Anos</th>
                                            <th><span class="badge">{{$categoria->anos_categoria}}</span></th>
                                            <th>Maximo jugadores en listado</th>
                                            <th>{{$categoria->maximo_jugadores_listado}}</th>
                                            <th>Futbol</th>
                                            <th><span class="badge">{{$categoria->modalidad}}</span></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            @foreach ($categoria->temporadasEquipos as $equipo)
                            <div class="panel-heading" data-toggle="collapse" data-parent="#PanelEquipo{{$equipo->id}}" href="#PanelEquipo{{$equipo->id}}">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#PanelEquipo{{$equipo->id}}" href="#PanelEquipo{{$equipo->id}}">
                                        <b>Equipo:&nbsp;</b>{{$equipo->alias}}
                                        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                                    </a>
                                </h4>
                            </div>
                            <div id="PanelEquipo{{$equipo->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table table-hover"> 
                                        <thead> 
                                            <tr> 
                                                <th>#</th> 
                                                <th>Nombre</th>  
                                                <th>Anio</th>
                                                <th>Camiseta #</th>
                                        </thead> 
                                        <tbody> 
                                            <tr>
                                                @foreach ($equipo->jugadorCategoria as $jugador)
                                                <th scope="row">1</th>
                                                <td>{{$jugador->ficha->personaJugador->nombre_completo}}</td> 
                                                <td>{{$jugador->ficha->personaJugador->anio}}</td> 
                                                <td><span class="badge">{{$jugador->ficha->numero}}</span></td>
                                                @endforeach        
                                            </tr> 
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>                
            </div>
        </div>
        @endif
        @endforeach
        @endforeach
    </div>
</div>
@stop
@section('javascript')
{{HTML::script('js/views/torneos/index.js')}}
@stop

