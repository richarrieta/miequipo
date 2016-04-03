<?php

/**
 * Bitacora
 *
 * @property integer $id
 * @property integer $ficha_id
 * @property \Carbon\Carbon $fecha
 * @property string $nota
 * @property integer $usuario_id
 * @property boolean $ind_activo
 * @property boolean $ind_alarma
 * @property boolean $ind_atendida
 * @property boolean $ind_active
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Ficha $ficha
 * @property-read \Usuario $usuario
 * @property-read mixed $notafor
 * @property-read mixed $vencida
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereFichaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereNota($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereUsuarioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereIndActivo($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereIndAlarma($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereIndAtendida($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereUpdatedAt($value)
 */
class Bitacora extends BaseModel implements DefaultValuesInterface, SimpleTableInterface {

    protected $table = "bitacoras";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'ficha_id', 'fecha', 'nota', 'usuario_id',
        'ind_active', 'ind_alarma','ind_atendida'
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save, 
     * si el modelo no cumple con estas reglas el metodo save retornará false, 
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'ficha_id' => 'required|integer',
        'fecha' => 'required_if:ind_alarma,1',
        'nota' => 'required',
        'ind_atendida'=> 'required',
        'usuario_id' => 'required|integer',
        'ind_activo' => 'required',
        'ind_alarma' => 'required',
    ];
    protected $dates = ['fecha'];

    protected function getPrettyFields() {
        return [
            'notafor' => 'Notas',
            'ficha_id' => 'Solicitud',
            'fecha' => 'Fecha',
            'nota' => 'Notas',
            'usuario_id' => 'Usuario',
            'ind_activo' => '¿Activo?',
            'ind_alarma' => '¿Alarma?',
            'ind_atendida' => '¿Atendida?',
        ];
    }

    public function getPrettyName() {
        return "bitacoras";
    }

    public function getTableFields() {
        return [
            'notafor'
        ];
    }

    public function getDefaultValues() {
        return [
            'fecha' => Carbon::now(),
            'usuario_id' => Sentry::getUser()->id,
            'ind_activo' => true,
            'ind_alarma' => false,
            'ind_atendida' => false,
        ];
    }

    /**
     * Define una relación pertenece a Ficha
     * @return Solicitud
     */
    public function ficha() {
        return $this->belongsTo('Ficha');
    }

    /**
     * Define una relación pertenece a Usuario
     * @return Usuario
     */
    public function usuario() {
        return $this->belongsTo('Usuario');
    }

    public function setFechaAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }

    public function getNotaforAttribute() {
        return $this->nota . '<br><small>' . $this->created_at->format('d/m/Y h:i a') . '</small>';
    }

    public function getVencidaAttribute(){
        $hoy = \Carbon\Carbon::now();
        if($hoy->gt($this->fecha) && $this->ind_alarma && !$this->ind_atendida){
            return true;
        }
        return false;
    }

    public function atendida(){
        $this->ind_atendida = true;
        $this->save();
    }

    public static function registrar($mensaje, $ficha_id, $alarma = false, $usuario_id = null) {
        $bitacora = new Bitacora();
        $bitacora->nota = $mensaje;
        $bitacora->ficha_id = $ficha_id;
        if($alarma){
            $bitacora->fecha = Carbon::now()->format('d/m/Y') ;
            $bitacora->ind_active = true;
            $bitacora->ind_alarma = true;
            $bitacora->ind_atendida = false;
            $bitacora->usuario_id = $usuario_id;
        }
        return $bitacora->save();
    }

    
}
