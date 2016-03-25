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

        @unless(is_null($ficha->id))
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
                    <a target="_blank" href="{{url('fichas/ver/'.$ficha->id)}}" class="btn btn-primary btn-lg">
                        <span class="glyphicon glyphicon-search"></span> Ver
                    </a>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-print"></span> Imprimir <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">

                        </ul>
                    </div>
                </div>
            </div> 
        </div>
        @endunless
    </div>
</div>
@stop
@section('javascript')
{{HTML::script('js/views/fichas/planilla.js')}}
@stop

