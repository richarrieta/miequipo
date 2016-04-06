<?php

/**
 * Persona
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $foto
 * @property integer $tipo_nacionalidad_id
 * @property integer $documento_identidad
 * @property string $sexo
 * @property integer $estado_civil_id
 * @property string $lugar_nacimiento
 * @property \Carbon\Carbon $fecha_nacimiento
 * @property string $pais_id
 * @property integer $parroquia_id
 * @property string $ciudad
 * @property string $zona_sector
 * @property string $calle_avenida
 * @property string $apto_casa
 * @property string $telefono_fijo
 * @property string $telefono_celular
 * @property string $email
 * @property string $facebook
 * @property string $twitter
 * @property string $observaciones
 * @property boolean $ind_active
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoNacionalidad $tipoNacionalidad
 * @property-read \EstadoCivil $estadoCivil
 * @property-read \Parroquia $parroquia
 * @property-read \Illuminate\Database\Eloquent\Collection|\Ficha[] $fichas
 * @property-read mixed $edad
 * @property-read mixed $documento
 * @property-read mixed $nombre_completo
 * @property-read mixed $informacion_contacto
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Persona whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereApellido($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereFoto($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTipoNacionalidadId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereDocumentoIdentidad($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereSexo($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEstadoCivilId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereLugarNacimiento($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona wherePaisId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereParroquiaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCiudad($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereZonaSector($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCalleAvenida($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereAptoCasa($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTelefonoFijo($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTelefonoCelular($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereFacebook($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTwitter($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereObservaciones($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereIndActive($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereUpdatedAt($value)
 * @property boolean $ind_sincedula 
 * @property integer $ci 
 * @property integer $user_id 
 * @property-read \NivelAcademico $nivelAcademico 
 * @method static \Illuminate\Database\Query\Builder|\Persona whereIndSincedula($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCi($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereUserId($value)
 */
class Persona extends BaseModel implements SimpleTableInterface, DefaultValuesInterface {

    protected $table = "personas";
    protected $dates = ['fecha_nacimiento'];

    /**
     * Campos que se pueden llenar mediante el uso de mass-assignment
     * @link http://laravel.com/docs/eloquent#mass-assignment
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'tipo_nacionalidad_id', 'ci', 'sexo',
        'estado_civil_id', 'lugar_nacimiento', 'fecha_nacimiento',
        'nivel_academico_id', 'parroquia_id', 'ciudad',
        'zona_sector', 'calle_avenida', 'apto_casa',
        'telefono_fijo', 'telefono_celular', 'email',
        'twitter', 'facebook', 'observaciones', 
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
        'apellido' => 'required',
        'tipo_nacionalidad_id' => 'integer',
        'ci' => 'integer',
        'sexo' => '',
        'estado_civil_id' => 'integer',
        'lugar_nacimiento' => '',
        'fecha_nacimiento' => '',
        'parroquia_id' => 'integer',
        'ciudad' => '',
        'zona_sector' => '',
        'calle_avenida' => '',
        'apto_casa' => '',
        'telefono_fijo' => 'max:20|min:7|regex:/^[0-9.-]*$/',
        'telefono_celular' => 'max:20|min:7|regex:/^[0-9.-]*$/',
        'email' => 'email',
        'twitter' => '',
        'facebook' => '',
        'observaciones' => '',
    ];

    protected function getPrettyFields() {
        return [
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'tipo_nacionalidad_id' => 'Nacionalidad',
            'ci' => 'C.I.',
            'sexo' => 'Sexo',
            'estado_civil_id' => 'Estado civil',
            'lugar_nacimiento' => 'Lugar de nacimiento',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'nivel_academico_id' => 'Nivel de instrucción',
            'estado_id' => 'Estado',
            'edad' => 'Edad',
            'municipio_id' => 'Municipio',
            'parroquia_id' => 'Parroquia',
            'ciudad' => 'Ciudad',
            'zona_sector' => 'Zona o sector',
            'calle_avenida' => 'Calle o avenida',
            'apto_casa' => 'Apto/casa Nro.',
            'telefono_fijo' => 'Teléfono fijo',
            'telefono_celular' => 'Teléfono celular',
            'email' => 'Email',
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'observaciones' => 'Observaciones',
            'documento' => 'Documento',
        ];
    }

    public function getPrettyName() {
        return "personas";
    }

    /**
     * Define una relación pertenece a TipoNacionalidad
     * @return TipoNacionalidad
     */
    public function tipoNacionalidad() {
        return $this->belongsTo('TipoNacionalidad');
    }

    /**
     * Define una relación pertenece a EstadoCivil
     * @return EstadoCivil
     */
    public function estadoCivil() {
        return $this->belongsTo('EstadoCivil');
    }

     /**
     * Define una relación pertenece a NivelAcademico
     * @return NivelAcademico
     */
    public function nivelAcademico() {
        return $this->belongsTo('NivelAcademico');
    }
    /**
     * Define una relación pertenece a Parroquia
     * @return Parroquia
     */
    public function parroquia() {
        return $this->belongsTo('Parroquia');
    }

    public static function findOrNewByCedula($nacionalidad, $cedula) {
        $var = static::whereTipoNacionalidadId((int) $nacionalidad)->whereCi((int) $cedula)->first();
        if ($var == null) {
            return new Persona();
        }
        return $var;
    }

    public function fichas() {
        return $this->hasMany('Ficha', 'jugador_id');
    }

    public function setFechaNacimientoAttribute($value) {
        if ($value != "") {
            $value = str_replace('/', '-', $value);
            $value = date_create($value);
            $value = date_format($value, 'Y-m-d');
            $this->attributes['fecha_nacimiento'] = Carbon::createFromFormat('Y-m-d', $value)->toDateString();
        }
    }

    public function getEdadAttribute() {
        if ($this->fecha_nacimiento != null) {
            return $this->fecha_nacimiento->age;
        }
        return "";
    }
    
    public function getAnioAttribute() {
        if ($this->fecha_nacimiento != null) {
            return $this->fecha_nacimiento->year;
        }
        return "";
    }

    public function getDocumentoAttribute() {
        if ($this->tipoNacionalidad != null && $this->ci != null) {
            return $this->tipoNacionalidad->nombre . ' - ' . $this->ci;
        }
        return $this->ci;
    }

    public function getNombreCompletoAttribute() {
        return $this->nombre . ' ' . $this->apellido;
    }

    public function getInformacionContactoAttribute() {
        $contactos = "";
        if ($this->telefono_fijo != "") {
            $contactos .= "Fijo: " . $this->telefono_fijo . '<br>';
        }
        if ($this->telefono_celular != "") {
            $contactos .= "Celular: " . $this->telefono_celular . '<br>';
        }
        if ($this->email != "") {
            $contactos .= "Email: " . $this->email . '<br>';
        }
        if ($this->twitter != "") {
            $contactos .= "Twitter: " . $this->twitter . '<br>';
        }
        if ($this->twitter != "") {
            $contactos .= "Facebook: " . $this->facebook . '<br>';
        }
        if ($contactos == "") {
            return "No tiene información de contacto.";
        }
        return $contactos;
    }

    public function getTableFields() {
        return [
            'documento', 'nombre', 'apellido', 'sexo', 'estadoCivil->nombre'
        ];
    }

    public function getDefaultValues() {
        return [
            'ind_active' => 1,
        ];
    }

}
