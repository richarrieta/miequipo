<?php

class Recaudo extends BaseModel implements SimpleTableInterface {

    protected $table = "recaudos";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion', 'ind_obligatorio', 'ind_vence', 'ind_active'
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'ind_obligatorio' => 'required',
        'ind_vence' => 'required',
        'ind_active' => 'required',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'ind_obligatorio' => 'Obligatorio',
            'ind_vence' => '¿Vence?',
            'ind_active' => '¿Activo?',
        ];
    }

    public function getPrettyName() {
        return "Recaudo";
    }

    public function getTableFields(){
        return [
            'nombre', 'descripcion', 'ind_obligatorio', 'ind_vence', 'ind_active'
        ];
    }

}
