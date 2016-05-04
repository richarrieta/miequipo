<?php


class JugadorCategoria extends BaseModel implements SimpleTableInterface, DefaultValuesInterface {

    protected $table = "jugador_temporada";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'goles_temporada' 
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
    ];

    protected function getPrettyFields() {
        return [
            'goles_temporada' => 'Goles en la temporada',
        ];
    }

    public function getPrettyName() {
        return "Jugador por categoria";
    }

        /**
     * Define una relación pertenece a Ficha
     * @return Ficha
     */
    public function ficha() {
        return $this->belongsTo('Ficha');
    }
    
    public function temporadasEquipo() {
        return $this->belongsTo('TemporadaEquipo');
    }

   
    public function getTableFields() {
        return [
            'goles_temporada'
        ];
    }

    public function getDefaultValues() {
        return [
            'ind_active' => 1,
        ];
    }

}
