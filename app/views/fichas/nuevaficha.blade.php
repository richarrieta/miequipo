{{Form::open(['url'=>'fichas/nueva', 'id'=>'nuevaFicha'])}} 
<div id='div-representante'>
    <hr>
    <h4>Datos del Representante</h4>
    {{Form::hidden('representante_id', Input::old('representante_id'), ['id'=>'representante_id'])}}
    <div class="row">
        {{Form::btInput($personaRepresentante,'tipo_nacionalidad_id',6)}}
        {{Form::btInput($personaRepresentante,'ci',6)}}     
    </div>
    <div class="row">
        {{Form::btInput($personaRepresentante,'nombre',6)}}
        {{Form::btInput($personaRepresentante,'apellido',6)}}          
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary salvar-persona" style="display: none;"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
        </div>
    </div>
</div>
<hr>
<h4>Datos del Jugador</h4>
<div id='div-jugador'>
    {{Form::hidden('jugador_id', Input::old('jugador_id'), ['id'=>'jugador_id'])}}
    <div class="row">
        <div id="div-menor">
            {{Form::btInput($personaJugador,'tipo_nacionalidad_id',6)}}
            {{Form::btInput($personaJugador,'ci',6)}}     
        </div>
    </div>
    <div class="row">
        {{Form::btInput($personaJugador,'nombre',6)}}
        {{Form::btInput($personaJugador,'apellido',6)}}          
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary salvar-persona" style="display: none;"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
       </div>
    </div>  
</div>
<hr>
@include('templates.bootstrap.submit',['nombreSubmit'=>'Siguiente','nomostrar'=>true,'icon'=>'forward', 'clase'=>'siguiente'])
@section('javascript')
{{HTML::script('js/views/fichas/nuevaficha.js')}}
@stop
{{Form::close()}}