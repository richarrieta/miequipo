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
    {{Form::btInput($jugador,'lugar_nacimiento',4)}}
    {{Form::btInput($jugador,'fecha_nacimiento',4)}}
    {{Form::btInput($jugador,'edad',4,'text',['disabled'=>'disabled'])}}
</div>
@include('fichas/direccion_representante')
<div class="row">
    {{Form::btInput($jugador,'email',4)}}
    {{Form::btInput($jugador,'twitter',4)}}
    {{Form::btInput($jugador,'facebook',4)}}
</div> 
@include('templates.bootstrap.submit',['nomostrar'=>true])
