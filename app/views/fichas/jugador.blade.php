{{Form::hidden('id',$ficha->jugador_id)}}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8">
        <h4><span id='span-jugador-documento'>{{$jugador->documento}}</span></h4>
    </div>
</div>
<div class="row col-xs-12 col-sm-3 col-md-3">
    <div class="form-group" >
        {{Form::concurrencia($jugador)}}
        @if($jugador->foto !="")
        {{ HTML::image($base_path . $jugador->id . DIRECTORY_SEPARATOR . $jugador->foto, 'Foto' ,array('id'=>'fotoJugador','class'=>'img-responsive disparadorArchivo','data-urlsubir'=>url('fichas/subirfoto/'.$jugador->id),'data-callback'=>'fotoSubida','data-tipoarchivo'=>'image/*')) }}
        @else
        {{ HTML::image('img/usericon.jpg', 'No hay foto aun',array('id'=>'fotoJugador','class'=>'img-responsive disparadorArchivo','data-urlsubir'=>url('fichas/subirfoto/'.$jugador->id),'data-callback'=>'fotoSubida','data-tipoarchivo'=>'image/*')) }}
        @endif
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
<div class="modal fade" id="modalArchivo">
    <div class="modal-dialog">
        <div class="modal-body destino dropzone-previews" id="contenidoModalArchivo">
        </div>
    </div>
</div>