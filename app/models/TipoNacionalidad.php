<?php

/**
 * TipoNacionalidad
 *
 * @property integer $id 
 * @property string $nombre 
 * @property boolean $ind_active 
 * @property integer $version 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereUpdatedAt($value)
 */
class TipoNacionalidad extends BaseModel implements SimpleTableInterface {

    protected $table = "tipo_nacionalidades";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre'=>'required', 

    ];
    
    protected function getPrettyFields() {
        return [
            'nombre'=>'Nacionalidad', 

        ];
    }

    public function getPrettyName() {
        return "Nacionalidad";
    }

    

}
