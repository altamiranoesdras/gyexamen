<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ProductoTipo
 * @package App\Models
 * @version March 10, 2022, 12:25 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection $clienteProcutos
 * @property \Illuminate\Database\Eloquent\Collection $productos
 * @property string $nombre
 */
class ProductoTipo extends Model
{
    use SoftDeletes;

    public $table = 'producto_tipos';
    
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
    public function clienteProcutos()
    {
        return $this->hasMany(\App\Models\ClienteProcuto::class, 'producto_tipo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function productos()
    {
        return $this->hasMany(\App\Models\Producto::class, 'tipo_id');
    }
}
