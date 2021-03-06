{{Form::hidden('id',$ficha->representante_id)}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8">
        <h4><span id='span-solicitante-documento'>{{$representante->documento}}</span></h4>
    </div>
</div>
<div class="row">
    {{Form::btInput($representante,'nombre',4)}}
    {{Form::btInput($representante,'apellido',4)}}
    {{Form::btInput($representante,'sexo',4,"select",[], BaseModel::$cmbsexo)}}     
</div>
<div class="row">
    {{Form::btInput($representante,'lugar_nacimiento',8)}}
    {{Form::btInput($representante,'fecha_nacimiento',4)}}
</div>
<div class="row">
    {{Form::btInput($representante,'edad',6,'text',['disabled'=>'disabled'])}}
    {{Form::btInput($representante,'estado_civil_id',6)}}    
</div>
<hr>
<h4>Direcci&oacute;n de habitaci&oacute;n</h4> 
<div class="row">
    {{Form::btInput($representante,'parroquia->municipio->estado_id',4, 'text', ['data-url'=>'estados/municipios','data-child'=>'parroquia_municipio_id'])}}
    {{Form::btInput($representante,'parroquia->municipio_id',4, 'text', ['data-url'=>'municipios/parroquias','data-child'=>'parroquia_id'])}}
    {{Form::btInput($representante,'parroquia_id',4)}}
</div>
<div class="row">
    {{Form::btInput($representante,'ciudad',4)}}
    {{Form::btInput($representante,'zona_sector',4)}}
    {{Form::btInput($representante,'calle_avenida',4)}}
</div>
<div class="row">
    {{Form::btInput($representante,'apto_casa',4)}}
    {{Form::btInput($representante,'telefono_fijo',4)}}
    {{Form::btInput($representante,'telefono_celular',4)}}
</div>
<div class="row">
    {{Form::btInput($representante,'email',4)}}
    {{Form::btInput($representante,'twitter',4)}}
    {{Form::btInput($representante,'facebook',4)}}
</div>  
<div class="row">
    {{Form::btInput($representante,'observaciones')}}
</div>  
@include('templates.bootstrap.submit',['nomostrar'=>true])