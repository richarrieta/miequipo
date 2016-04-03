<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Club
 *
 * @property integer $id 
 * @property string $nombre 
 * @property string $escudo 
 * @property string $direccion_sede 
 * @property string $telefono_fijo 
 * @property string $telefono_celular 
 * @property string $email 
 * @property string $facebook 
 * @property string $twitter 
 * @property float $cuota_mensual 
 * @property string $observaciones 
 * @property boolean $ind_verificado 
 * @property boolean $ind_active 
 * @property integer $version 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Club whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereEscudo($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereDireccionSede($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereTelefonoFijo($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereTelefonoCelular($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereFacebook($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereTwitter($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereCuotaMensual($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereObservaciones($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereIndVerificado($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Club whereUpdatedAt($value)
 */
class Club extends BaseModel {

    protected $table = "clubs";

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
            'escudo' => 'Escudo',
            'direccion_sede' => 'Direccion',
            'telefono_fijo' => 'Telefono',
            'telefono_celular' => 'Celular',
            'email' => 'Email',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'cuota_mensual' => 'Cuota Mensual',
            'observaciones' => 'Observaciones',
            'ind_verificado' => 'Verificado?',
        ];
    }

    public function getPrettyName() {
        return "clubs";
    }
}
