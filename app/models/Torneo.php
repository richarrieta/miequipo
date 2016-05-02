<?php


class Torneo extends BaseModel implements SimpleTableInterface, DefaultValuesInterface {

    protected $table = "torneos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre' 
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
        ];
    }

    public function getPrettyName() {
        return "torneos";
    }

    public function temporadas() {
        return $this->hasMany('Temporada', 'torneo_id');
    }

   
    public function getTableFields() {
        return [
            'nombre'
        ];
    }

    public function getDefaultValues() {
        return [
            'ind_active' => 1,
        ];
    }

}
