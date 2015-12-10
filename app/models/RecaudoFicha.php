<?php

/**
 * RecaudoFicha
 *
 * @property-read \Ficha $ficha 
 * @property-read \Recaudo $recaudo 
 * @property-write mixed $fecha_vencimiento 
 * @property-write mixed $documento 
 * @property-read mixed $documento_link 
 * @property-read mixed $estatus_display 
 */
class RecaudoFicha extends BaseModel implements DefaultValuesInterface, SimpleTableInterface {

    protected $table = "recaudo_ficha";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'ficha_id', 'recaudo_id', 'ind_recibido', 'fecha_vencimiento', 'documento',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'ficha_id' => 'required|integer',
        'recaudo_id' => 'required|integer',
        'ind_recibido' => '',
        'fecha_vencimiento' => '',
        'documento' => '',
    ];
    protected $dates = ['fecha_vencimiento'];

    protected function getPrettyFields() {
        return [
            'ficha_id' => 'Solicitud',
            'recaudo_id' => 'Recaudo',
            'ind_recibido' => '¿Recibido?',
            'fecha_vencimiento' => 'Fecha de vencimiento',
            'documento' => 'Documento',
            'documento_link' => 'Ver'
        ];
    }

    public function getPrettyName() {
        return "recaudo_ficha";
    }

    /**
     * Define una relación pertenece a una Ficha
     * @return Ficha
     */
    public function ficha() {
        return $this->belongsTo('Ficha');
    }

    /**
     * Define una relación pertenece a Recaudo
     * @return Recaudo
     */
    public function recaudo() {
        return $this->belongsTo('Recaudo');
    }

    public static function findOrNewByFichaRecaudo($ficha, $recaudo) {
        $var = static::whereFichaId((int) $ficha)->whereRecaudoId((int) $recaudo)->first();
        if ($var == null) {
            return new RecaudoFicha();
        }
        return $var;
    }

    public function setFechaVencimientoAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha_vencimiento'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }

    public function setDocumentoAttribute() {
        if (Input::hasFile('documento')) {
            $base_path = storage_path('adjuntos');
            $base_path = $base_path . DIRECTORY_SEPARATOR . $this->ficha_id;

            if (!File::exists($base_path)) {
                File::makeDirectory($base_path);
            }
            $file = Input::file('documento');
            $fileName = $file->getClientOriginalName();
            if ($this->documento != "") {
                File::delete($base_path . DIRECTORY_SEPARATOR . $this->documento);
            }
            while (File::exists($base_path . DIRECTORY_SEPARATOR . $fileName)) {
                $fileName.=rand(0, 9) . $fileName;
            }
            $file->move($base_path, $fileName);
            $this->attributes['documento'] = $fileName;
        }
    }

    public function getDocumentoLinkAttribute() {
        if ($this->documento == "") {
            return "No tiene";
        }
        return HTML::link('recaudosficha/descargar/' . $this->id, 'Descargar');
    }

    public function getDefaultValues() {
        return [
            'ind_recibido' => false,
        ];
    }

    public function getTableFields() {
        return [
            'recaudo->descripcion',
            'ind_recibido',
            'fecha_vencimiento',
            'documento_link',
        ];
    }

    public function validate($model = null) {
        if (parent::validate($model)) {
            if ($this->fecha_vencimiento == "" && $this->recaudo->ind_vence) {
                $this->addError('fecha_vencimiento', "La fecha de vencimiento es necesaria");
            }
        }
        return !$this->hasErrors();
    }

}
