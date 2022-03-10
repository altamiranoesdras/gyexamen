<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Departamento
 * @package App\Models
 * @version March 10, 2022, 12:24 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $clientes
 * @property \Illuminate\Database\Eloquent\Collection $municipios
 * @property string $nombre
 */
class Departamento extends Model
{
    use SoftDeletes;

    public $table = 'departamentos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clientes()
    {
        return $this->hasMany(\App\Models\Cliente::class, 'departamento_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function municipios()
    {
        return $this->hasMany(\App\Models\Municipio::class, 'departamento_id');
    }
}
