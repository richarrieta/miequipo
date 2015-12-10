@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-8 col-md-8">
    <div class="panel-group" id="accordion">
        @if($nuevo)
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#Panel">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#Panel">
                        Nueva Ficha
                    </a>
                </h4>
            </div>
            <div id="Panel" class="panel-collapse collapse in">
                <div class="panel-body">
                    @include('templates.errores')
                    @include('fichas.nuevaficha')
                </div>
            </div>
        </div>
        @else
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelUno">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelUno">
                        Ficha &nbsp;{{$ficha->id}}
                    </a>
                </h4>
            </div>            
            <div id="PanelUno" class="panel-collapse collapse in">
                <div class="panel-body">             
                    {{Form::open(['url'=>'fichas/modificar','id'=>'form-ficha'])}}
                    @include('fichas.ficha')
                    {{Form::close()}}   
                </div>
            </div>      
        </div>
        @unless(is_null($ficha->id))
       <div class="panel panel-danger">
            <div class="panel-heading"  data-toggle="collapse" data-parent="#accordion" href="#PanelDos">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelDos">
                        Jugador
                    </a>
                </h4>
            </div>         
            <div id="PanelDos" class="panel-collapse collapse">
                <div class="panel-body">
                    {{Form::open(['url'=>'personas/modificar','id'=>'form-persona','class'=>'saveajax'])}}
                    @include('fichas.jugador')
                    {{Form::close()}}
                </div>
            </div>         
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelTres">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelTres">
                        Representante
                    </a>
                </h4>
            </div>                          
            <div id="PanelTres" class="panel-collapse collapse">
                <div class="panel-body">
                    {{Form::open(['url'=>'personas/crear/'.$jugador->id.'/false','id'=>'form-persona','class'=>'saveajax'])}}
                    @include('fichas.representante')
                    {{Form::close()}}
                </div>
            </div>   
        </div>             
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelSeis">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelSeis">
                        Recaudos
                    </a>
                </h4>
            </div>  
            <div id="PanelSeis" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('fichas.recaudos')
                </div>
            </div>  
        </div>        
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#PanelOcho">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#PanelOcho">
                        Galeria Fotos
                    </a>
                </h4>
            </div>
            <div id="PanelOcho" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('fichas.galeriafotos')
                </div>
            </div>   
        </div><!-------------------------------------------------------------------->
        @endunless
        @endif
    </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 hidden-xs">
    <div class="panel-group" id="accordionlateral">
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelAyuda">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordionlateral" href="#PanelAyuda">
                        Sección de ayuda
                    </a>
                </h4>
            </div>
            <div id="PanelAyuda" class="panel-collapse collapse collapse in">
                <div class="panel-body">
                    <p>Sitúe el cursor en un campo para ver mas información.</p>
                    <div class="row alert-warning text-justify" id="contenedor-ayudas" style="padding: 5px;">
                    </div>
                </div>
            </div>
        </div>

        <div id="div-cne" class="panel panel-danger" style="display:none;">
            <div class="panel-heading">CNE</div>
            <div class="panel-body text-center">
                <div class="row alert-warning text-justify" data-id="" style="padding: 5px;">
                    <iframe id="icne" src="" width="370px" height="510px" ></iframe>
                </div>
            </div>
        </div>
        <div id="div-seniat" class="panel panel-danger" style="display:none;">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelSeniat">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordionlateral" href="#PanelSeniat">
                        SENIAT
                    </a>
                </h4>
            </div>
            <div  id="PanelSeniat" class="panel-collapse collapse collapse in">
                <div class="panel-body">
                    <iframe id="iseniat" src="" width="350px" height="540px" ></iframe>
                </div>
            </div>
        </div>     
        <div id="div-sate" class="panel panel-danger" style="display:none;">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelSate">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordionlateral" href="#PanelSate">
                        SATE
                    </a>
                </h4>
            </div>
            <div  id="PanelSate" class="panel-collapse collapse collapse in">
                <div class="panel-body">
                    <iframe id="isate" src="" width="350px"  height="540px" ></iframe>
                </div>
            </div>
        </div>

        @unless(is_null($solicitud->id))
        <div id="div-bitacora" class="panel panel-danger" style="display:block;">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelBitacora">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordionlateral" href="#PanelBitacora">
                        Bitácora
                    </a>
                </h4>
            </div>
            <div id="PanelBitacora" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('solicitudes.bitacora')
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelPlanilla">
                <h4 class="panel-title">
                    Planilla
                </h4>
            </div>
            <div class="panel-body">
                <div class="text-center">
                    <a target="_blank" href="{{url('solicitudes/ver/'.$solicitud->id)}}" class="btn btn-primary btn-lg">
                        <span class="glyphicon glyphicon-search"></span> Ver
                    </a>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-print"></span> Imprimir <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>{{HTML::link('solicitudes/planilla/'.$solicitud->id, 'Planilla', ['target'=>'_blank'])}}</li>
                            @if($solicitud->TipoVivienda && $solicitud->Tenencia)
                            <li>{{HTML::link('solicitudes/informe/'.$solicitud->id, 'Informe Socioeconomico', ['target'=>'_blank'])}}</li>
                            @endif
                            <li>{{HTML::link('solicitudes/bitacora/'.$solicitud->id, 'Bitacora', ['target'=>'_blank'])}}</li>
                        </ul>
                    </div>
                </div>
            </div> 
        </div>
        @if($solicitud->estatus == 'ACA')
        <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelPlanilla">
                <h4 class="panel-title">
                    Solicitar Aprobacion
                </h4>
            </div>
            <div class="panel-body">
                <div class="text-center">   
                    {{HTML::buttonText('solicitudes/solicitaraprobacion/'.$solicitud->id , 'certificate', 'Solicitar Aprobacion', true)}}                           
                </div>
            </div> 
        </div>
        @endif
        @endunless
    </div>
</div>
@stop
@section('javascript')
{{HTML::script('js/views/solicitudes/solicitud.js')}}
@stop

