<?php

/**
 * Parroquia
 *
 * @property integer $id
 * @property integer $municipio_id
 * @property string $nombre
 * @property boolean $ind_active
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Municipio $municipio
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereMunicipioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereUpdatedAt($value)
 */
class Parroquia extends BaseModel implements SimpleTableInterface {

    protected $table = "parroquias";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'municipio_id', 'nombre',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'municipio_id' => 'required|integer',
        'nombre' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'municipio_id' => 'Municipio',
            'nombre' => 'Parroquia',
        ];
    }

    public function getPrettyName() {
        return "Parroquias";
    }

    /**
     * Define una relación pertenece a Municipio
     * @return Municipio
     */
    public function municipio() {
        return $this->belongsTo('Municipio');
    }

    public function getParent() {
        return "municipio_id";
    }

    public static function getCombo($idMunicipio = "", array $condiciones = []) {
        $municipio = Municipio::find((int) $idMunicipio);
        $retorno = array('' => 'Seleccione.');
        if (is_object($municipio)) {
            $municipios = $municipio->parroquias;
            foreach ($municipios as $registro) {
                $retorno[$registro->id] = $registro->nombre;
            }
        } else {
            $retorno = array('' => 'Seleccione primero un municipio');
        }
        return $retorno;
    }

    public function getTableFields() {
        return [
            'municipio->estado->nombre', 'municipio->nombre', 'nombre'
        ];
    }

}
