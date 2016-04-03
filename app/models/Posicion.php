<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Posicion
 *
 * @property integer $id 
 * @property string $nombre 
 * @property boolean $ind_active 
 * @property integer $version 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Posicion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Posicion whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Posicion whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\Posicion whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Posicion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Posicion whereUpdatedAt($value)
 */
class Posicion extends BaseModel {

    protected $table = "posiciones";

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
        return "posiciones";
    }
}
