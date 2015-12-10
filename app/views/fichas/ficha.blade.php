@include('templates.errores')
{{Form::hidden('id',$ficha->id, ['id'=>'id'])}}
{{Form::hidden('jugador_id',$ficha->jugador_id, ['id'=>'jugador_id'])}}
{{Form::hidden('representante_id',$ficha->representante_id, ['id'=>'representante_id'])}}
{{Form::hidden('ind_sincedula',$ficha->jugador->ind_sincedula, ['id'=>'ind_sincedula'])}}
<div class="row">
    {{Form::btSelect('parentesco_id', Parentesco::getCombo("Parentesco"), @$parentesco->id, 4)}}
</div>
<div class="row">
    {{Form::btInput($ficha,'fecha_ingreso',6)}}
    {{Form::btInput($ficha,'fecha_egreso',6)}}
</div>
<div class="row">
    {{Form::btInput($ficha,'club_id',6)}}
    {{Form::btInput($ficha,'posicion_id',6)}}
</div>
<div class="row">
    {{Form::btInput($ficha,'fortalezas', 12,'textarea')}}
</div>
<div class="row">
    {{Form::btInput($ficha,'mejoras', 12,'textarea')}}
</div>
<div class="row">
    {{Form::btInput($ficha,'observaciones', 12,'textarea')}}
</div>
@include('templates.bootstrap.submit',['nomostrar'=>true])