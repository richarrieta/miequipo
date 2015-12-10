{{Form::hidden('id',$ficha->jugador_id)}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8">
        <h4><span id='span-jugador-documento'>{{$jugador->documento}}</span></h4>
    </div>
</div>
<div class="row">
    {{Form::btInput($jugador,'nombre',4)}}
    {{Form::btInput($jugador,'apellido',4)}}
    {{Form::btInput($jugador,'sexo',4,"select",[], BaseModel::$cmbsexo)}}    
</div>
<div class="row">
    {{Form::btInput($jugador,'lugar_nacimiento',8)}}
    {{Form::btInput($jugador,'fecha_nacimiento',4)}}
</div>
<div class="row">
    {{Form::btInput($jugador,'edad',4,'text',['disabled'=>'disabled'])}}
</div>
<hr>
<h4>Direcci&oacute;n de habitaci&oacute;n</h4> 
<div class="row">
    {{Form::btInput($jugador,'parroquia->municipio->estado_id',4, 'text', ['data-url'=>'estados/municipios','data-child'=>'parroquia_municipio_id'])}}
    {{Form::btInput($jugador,'parroquia->municipio_id',4, 'text', ['data-url'=>'municipios/parroquias','data-child'=>'parroquia_id'])}}
    {{Form::btInput($jugador,'parroquia_id',4)}}
</div>
<div class="row">
    {{Form::btInput($jugador,'zona_sector',4)}}
    {{Form::btInput($jugador,'calle_avenida',4)}}
    {{Form::btInput($jugador,'apto_casa',4)}}
</div>
<div class="row">
    {{Form::btInput($jugador,'telefono_fijo',4)}}
    {{Form::btInput($jugador,'telefono_celular',4)}}
    {{Form::btInput($jugador,'telefono_otro',4)}}
</div>
<div class="row">
    {{Form::btInput($jugador,'email',6)}}
    {{Form::btInput($jugador,'twitter',6)}}
    {{Form::btInput($jugador,'facebook',6)}}
</div> 
@include('templates.bootstrap.submit',['nomostrar'=>true])
