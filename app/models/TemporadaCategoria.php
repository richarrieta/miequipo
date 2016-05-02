<?php


class TemporadaCategoria extends BaseModel implements SimpleTableInterface, DefaultValuesInterface {

    protected $table = "temporadas_categorias";

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
        return "Temporadas categorias";
    }

        /**
     * Define una relación pertenece a Temporada
     * @return Temporada
     */
    public function temporada() {
        return $this->belongsTo('Temporada');
    }
    
    public function temporadas_equipos() {
        return $this->hasMany('TemporadaEquipo', 'temporada_categoria_id');
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
