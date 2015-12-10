<?php

/**
 * Municipio
 *
 * @property integer $id 
 * @property integer $estado_id 
 * @property string $nombre 
 * @property boolean $ind_active 
 * @property integer $version 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Estado $estado 
 * @property-read \Illuminate\Database\Eloquent\Collection|\Parroquia[] $parroquias 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereUpdatedAt($value)
 */
class Municipio extends BaseModel implements SimpleTableInterface {

    protected $table = "municipios";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'estado_id', 'nombre',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false,
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'estado_id' => 'required|integer',
        'nombre' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'estado_id' => 'Estado',
            'nombre' => 'Municipio',
        ];
    }

    public function getPrettyName() {
        return "Municipios";
    }

    /**
     * Define una relación pertenece a Estado
     * @return Estado
     */
    public function estado() {
        return $this->belongsTo('Estado');
    }

    public function parroquias() {
        return $this->hasMany('Parroquia');
    }

    public function getParent() {
        return "estado_id";
    }

    public static function getCombo($idEstado = "", array $condiciones = []) {
        $estado = Estado::find((int) $idEstado);
        $retorno = array('' => 'Seleccione.');
        if (is_object($estado)) {
            $municipios = $estado->municipios;
            foreach ($municipios as $registro) {
                $retorno[$registro->id] = $registro->nombre;
            }
        } else {
            $retorno = array('' => 'Seleccione primero un estado');
        }
        return $retorno;
    }

    public function getTableFields() {
        return [
            'estado->nombre', 'nombre'
        ];
    }

}
