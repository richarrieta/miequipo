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
<div class="row">
    {{Form::btInput($representante,'nivel_academico_id')}}
</div>
@include('fichas/direccion-representante')
<div class="row">
    {{Form::btInput($representante,'email',4)}}
    {{Form::btInput($representante,'twitter',4)}}
    {{Form::btInput($representante,'facebook',4)}}
</div>  
<div class="row">
    {{Form::btInput($representante,'observaciones')}}
</div>  
@include('templates.bootstrap.submit',['nomostrar'=>true])