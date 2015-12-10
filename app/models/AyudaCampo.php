<?php

/**
 * AyudaCampo
 *
 * @property integer $id 
 * @property string $formulario 
 * @property string $campo 
 * @property string $ayuda 
 * @property boolean $ind_active 
 * @property integer $version 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereFormulario($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereCampo($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereAyuda($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereUpdatedAt($value)
 */
class AyudaCampo extends BaseModel {

    /**
     * Tabla del modelo
     * @var string
     */
    protected $table = 'ayuda_campos';
    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = array('campo', 'formulario', 'ayuda');

    public static function buscar($form, $nombre) {
        return static::where('campo', 'LIKE', $nombre)->where('formulario', 'LiKE', $form)->first();
    }

    public static function crear($formulario, $campo) {
        $values = compact('formulario','campo');
        return static::create(array_merge($values, ['ayuda'=>'Pendiente por Documentar']));
    }
    public function validate($model = null)
    {
        if(parent::validate()){
            if(is_object(static::buscar($this->formulario, $this->campo)) && !isset($this->id)){
                $this->errors->add('formulario','El formulario debe ser unico');
            }
            return !$this->hasErrors();
        }
        return false;
    }


    /**
     * Array clave valor que le asocia a un atributo del modelo una oración o una frase que describe al atributo.
     * Se usa para construir los mensajes de error.
     * @return array
     */
    protected function getPrettyFields(){
        return array(
            'formulario' => 'Formulario',
            'campo' => 'Campo',
            'ayuda' => 'Documentación',
        );
    }

    /**
     * Oración o palabra mas descriptiva del nombre de la tabla que maneja el modelo
     *
     * @return string
     */
    public function getPrettyName() {
        return "Ayuda para los campos";
    }

}
