<div id="direccion_representante"> 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5">
            <h4> Usar dirección del representante?</h4>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-1">
            <a class="btn btn-primary btn-xs glyphicon glyphicon-transfer" 
               title="Copiar dirección del jugador" data-id='{{$representante->id}}' data-url='personas/copiar'>               
            </a>
        </div>
    </div>
    <div class="row">
        {{Form::btInput($jugador,'parroquia->municipio->estado_id',4, 'text', ['data-url'=>'estados/municipios','data-child'=>'parroquia_municipio_id'])}}
        {{Form::btInput($jugador,'parroquia->municipio_id',4, 'text', ['data-url'=>'municipios/parroquias','data-child'=>'parroquia_id'])}}
        {{Form::btInput($jugador,'parroquia_id',4)}}
    </div>
    <div class="row">
        {{Form::btInput($jugador,'ciudad',4)}}
        {{Form::btInput($jugador,'zona_sector',4)}}
        {{Form::btInput($jugador,'calle_avenida',4)}}
    </div>
    <div class="row">
        {{Form::btInput($jugador,'apto_casa',4)}}
        {{Form::btInput($jugador,'telefono_fijo',4)}}
        {{Form::btInput($jugador,'telefono_celular',4)}}
    </div>
</div>
