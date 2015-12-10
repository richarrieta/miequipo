<?php

/**
 * Parentesco
 *
 * @property integer $id 
 * @property string $nombre 
 * @property string $inverso 
 * @property boolean $ind_active 
 * @property integer $version 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereInverso($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereUpdatedAt($value)
 */
class Parentesco extends BaseModel implements SimpleTableInterface {

    protected $table = "parentescos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'inverso'
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre' => 'required|max:100',
        'inverso' => 'required|max:100'
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'inverso' => 'Parentesco inverso',
        ];
    }

    public function getPrettyName() {
        return "Parentesco";
    }

}
