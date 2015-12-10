<?php

/**
 * Ficha
 *
 * @property integer $id 
 * @property integer $representante_id 
 * @property integer $jugador_id 
 * @property integer $club_id 
 * @property boolean $ind_hermano 
 * @property boolean $ind_pago_especial 
 * @property float $monto_mensual 
 * @property \Carbon\Carbon $fecha_ingreso 
 * @property \Carbon\Carbon $fecha_egreso 
 * @property integer $numero 
 * @property integer $posicion_id 
 * @property string $mejoras 
 * @property string $fortalezas 
 * @property string $observaciones 
 * @property integer $goles 
 * @property string $altura 
 * @property string $peso 
 * @property string $talla_camisa 
 * @property string $talla_short 
 * @property integer $estatus 
 * @property boolean $ind_active 
 * @property integer $version 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Persona $jugador 
 * @property-read \Persona $representante 
 * @property-read \Club $club 
 * @property-read \Posicion $posicion 
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bitacora[] $bitacoras 
 * @property-read \Illuminate\Database\Eloquent\Collection|\RecaudoFicha')->orderBy('id[] $recaudosFicha 
 * @property-read \Illuminate\Database\Eloquent\Collection|\FotoFicha')->orderBy('id[] $fotos 
 * @property-read mixed $monto_mensual_for 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereRepresentanteId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereJugadorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereClubId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereIndHermano($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereIndPagoEspecial($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereMontoMensual($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereFechaIngreso($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereFechaEgreso($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereNumero($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha wherePosicionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereMejoras($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereFortalezas($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereObservaciones($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereGoles($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereAltura($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha wherePeso($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereTallaCamisa($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereTallaShort($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereEstatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Ficha whereUpdatedAt($value)
 */
class Ficha extends BaseModel implements SimpleTableInterface, DecimalInterface {

    use \Traits\EloquentExtensionTrait;

    protected $table = "fichas";

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'jugador_id', 'representante_id', 'parentesco_id', 'club_id', 'ind_hermano','ind_pago_especial',
        'fecha_ingreso', 'fecha_egreso', 'monto_mensual', 'numero', 'posicion_id', 
        'mejoras', 'fortalezas', 'observaciones', 'goles', 'altura', 'peso', 'talla_camisa', 'talla_short',
    ];

    /**
     * Reglas que debe cumplir el objeto al momento de ejecutar el metodo save,
     * si el modelo no cumple con estas reglas el metodo save retornará false,
     * y los cambios realizados no haran persistencia.
     * @link http://laravel.com/docs/validation#available-validation-rules
     * @var array
     */
    protected $rules = [
        'jugador_id' => 'required|integer',
        'representante_id' => 'required|integer',
        'club_id' => 'required|integer',
        'ind_hermano' => 'required',
        'ind_pago_especial' => 'required',
        'fecha_ingreso' => '',
        'fecha_egreso' => '',
        'monto_mensual' => '',
    ];
    protected $dates = ['fecha_ingreso', 'fecha_egreso', 'created_at'];

    protected function getPrettyFields() {
        return [
            'id' => 'Número de ficha',
            'jugador_id'  => 'Jugados', 
            'representante_id' => 'Representante',
            'club_id' => 'Club', 
            'parentesco_id' => 'Parentesco del representante',
            'ind_hermano' => 'Tiene hermanos en el club?',
            'ind_pago_especial' => 'Pago especial?',
            'fecha_ingreso' => 'Fecha de ingreso', 
            'fecha_egreso' => 'Fecha de egreso', 
            'monto_mensual' => 'Monto mensual', 
            'numero' => 'Número', 
            'posicion_id' => 'Posición', 
            'mejoras' => 'Areas a mejorar', 
            'fortalezas' => 'Fortalezas', 
            'observaciones' => 'Observaciones', 
            'goles' => 'Goles con el club', 
            'altura' => 'Altura', 
            'peso' => 'Peso', 
            'talla_camisa' => 'Talla de camisa', 
            'talla_short' => 'Talla de short',
        ];
    }

    public function __construct(array $values = []) {
        parent::__construct($values);
    }

    public function getPrettyName() {
        return "fichas";
    }

    /**
     * Define una relación pertenece al Jugador
     * @return jugador
     */
    public function jugador() {
        return $this->belongsTo('Persona');
    }

    /**
     * Define una relación pertenece al Representante
     * @return representante
     */
    public function representante() {
        return $this->belongsTo('Persona');
    }

    /**
     * Define una relación pertenece a Club
     * @return Club
     */
    public function club() {
        return $this->belongsTo('Club');
    }

    /**
     * Define una relación pertenece a Posicion
     * @return Posicion
     */
    public function posicion() {
        return $this->belongsTo('Posicion');
    }

    public function bitacoras() {
        return $this->hasMany('Bitacora');
    }

    public function recaudosFicha() {
        return $this->hasMany('RecaudoFicha')->orderBy('id');
    }

    public function fotos() {
        return $this->hasMany('FotoFicha')->orderBy('id');
    }

    public function setFechaIngresoAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha_ingreso'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }

    public function setFechaEgresoAttribute($value) {
        if ($value != "") {
            $this->attributes['fecha_egreso'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }

    public function reglasCreacion() {
        $this->rules = [
            'jugador_id' => 'required',
            'representante_id' => 'required',
        ];
    }

    public static function crear(array $values) {
        $ficha = new Ficha();
        $ficha->fill($values);
        $ficha->reglasCreacion();
        $ficha->estatus = "ELA";
        $ficha->validate();
        return $ficha;
    }

    public function createdModel($model) {
        $recaudos = Recaudo::all()->whereIndActive(true)->get();
        $recaudos->each(function ($recaudo) use ($model) {
            $recFicha = new RecaudoFicha();
            $recFicha->ficha()->associate($model);
            $recFicha->recaudo()->associate($recaudo);
            $recFicha->save();
        });

        Bitacora::registrar('Se registró la ficha.', $model->id);
    }

    public function getTableFields() {
        return [
            'numero',
            'descripcion',
            'created_at'
        ];
    }

    public static function getDecimalFields() {
        return [
            'monto_mensual'
        ];
    }

    public function setMontoMensualAttribute($value) {
        $this->attributes['monto_mensual'] = tf($value);
    }

    public function getMontoMensualForAttribute() {
        return tm($this->monto_mensual);
    }

    public function scopeOrdenar($query) {
        return $query->orderBy('fichas.id', 'DESC');
    }

    public function scopeEagerLoad($query) {
        return $query->with('representante')
                     ->with('jugador');
    }
    
    public function scopeAplicarFiltro($query, $filtro) {
        $query->leftJoin('personas', 'fichas.jugador_id', '=', 'personas.id')
                ->leftJoin('clubes', 'fichas.club_id', '=', 'clubes.id')
                ->leftJoin('parroquias', 'personas.parroquia_id', '=', 'parroquias.id')
                ->leftJoin('municipios', 'parroquias.municipio_id', '=', 'municipios.id')
                ->leftJoin('estados', 'municipios.estado_id', '=', 'estados.id')
                ->distinct()
                ->select('fichas.*');

       
        //filtros de busqueda.
        $campos = array_except($filtro, ['_token']);
        foreach ($campos as $campo => $valor) {
            //se quitan espacios vacios del array.
            if (is_array($valor)) {
                $valor = array_filter($valor);
            }
            if ($valor != '' && count($valor) > 0) {
                //laravel cambia el . por _ por eso se usa el replace
                $campo = str_replace('personas_', 'personas.', $campo);
                $campo = str_replace('fichas_', 'fichas.', $campo);
                $query = $this->parseFilter($campo, $valor, $query);
            }
        }
        return $query;
    }

    public function getJugador() {
        return $this->jugador;
    }

    public function getRepresentante() {
        return $this->representante;
    }
}
