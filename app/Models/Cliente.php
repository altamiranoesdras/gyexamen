<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Cliente
 * @package App\Models
 * @version March 10, 2022, 12:25 pm CST
 *
 * @property \App\Models\Departamento $departamento
 * @property \App\Models\Municipio $municipio
 * @property \App\Models\User $usuarioCrea
 * @property \App\Models\User $usuarioActualiza
 * @property \Illuminate\Database\Eloquent\Collection $clienteProcutos
 * @property string $codigo
 * @property string $nombres
 * @property string $apellidos
 * @property string $dpi
 * @property string $fecha_nacimiento
 * @property string $telefono
 * @property string $correo
 * @property integer $departamento_id
 * @property integer $municipio_id
 * @property string $direccion
 * @property boolean $no_asociado
 * @property integer $usuario_crea
 * @property integer $usuario_actualiza
 */
class Cliente extends Model
{
    use SoftDeletes;

    public $table = 'clientes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'codigo',
        'nombres',
        'apellidos',
        'dpi',
        'fecha_nacimiento',
        'telefono',
        'correo',
        'departamento_id',
        'municipio_id',
        'direccion',
        'no_asociado',
        'usuario_crea',
        'usuario_actualiza'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'string',
        'nombres' => 'string',
        'apellidos' => 'string',
        'dpi' => 'string',
        'fecha_nacimiento' => 'date',
        'telefono' => 'string',
        'correo' => 'string',
        'departamento_id' => 'integer',
        'municipio_id' => 'integer',
        'direccion' => 'string',
        'no_asociado' => 'boolean',
        'usuario_crea' => 'integer',
        'usuario_actualiza' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'nullable|string|max:45',
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'dpi' => 'required|string|max:45',
        'fecha_nacimiento' => 'required',
        'telefono' => 'required|string|max:45',
        'correo' => 'nullable|string|max:255',
        'departamento_id' => 'required|integer',
        'municipio_id' => 'required|integer',
        'direccion' => 'required|string|max:255',
        'no_asociado' => 'nullable|boolean',
        'usuario_crea' => 'required',
        'usuario_actualiza' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function departamento()
    {
        return $this->belongsTo(\App\Models\Departamento::class, 'departamento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function municipio()
    {
        return $this->belongsTo(\App\Models\Municipio::class, 'municipio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usuarioCrea()
    {
        return $this->belongsTo(\App\Models\User::class, 'usuario_crea');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usuarioActualiza()
    {
        return $this->belongsTo(\App\Models\User::class, 'usuario_actualiza');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clienteProcutos()
    {
        return $this->hasMany(\App\Models\ClienteProcuto::class, 'cliente_id');
    }
}
