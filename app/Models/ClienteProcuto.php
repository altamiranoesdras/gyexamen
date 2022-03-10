<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class ClienteProcuto
 * @package App\Models
 * @version March 10, 2022, 12:26 pm CST
 *
 * @property \App\Models\Cliente $cliente
 * @property \App\Models\ProductoTipo $productoTipo
 * @property \App\Models\Producto $producto
 * @property \App\Models\User $usuarioCrea
 * @property \App\Models\User $usuarioActualiza
 * @property integer $cliente_id
 * @property integer $producto_tipo_id
 * @property integer $producto_id
 * @property string|\Carbon\Carbon $fecha_contacto
 * @property string $fecha_probable_adquiere
 * @property string $acuerdo
 * @property integer $usuario_crea
 * @property integer $usuario_actualiza
 */
class ClienteProcuto extends Model
{
    use SoftDeletes;

    public $table = 'cliente_procutos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'cliente_id',
        'producto_tipo_id',
        'producto_id',
        'fecha_contacto',
        'fecha_probable_adquiere',
        'acuerdo',
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
        'cliente_id' => 'integer',
        'producto_tipo_id' => 'integer',
        'producto_id' => 'integer',
        'fecha_contacto' => 'datetime',
        'fecha_probable_adquiere' => 'date',
        'acuerdo' => 'string',
        'usuario_crea' => 'integer',
        'usuario_actualiza' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cliente_id' => 'required|integer',
        'producto_tipo_id' => 'required|integer',
        'producto_id' => 'required|integer',
        'fecha_contacto' => 'required',
        'fecha_probable_adquiere' => 'required',
        'acuerdo' => 'required|string',
        'usuario_crea' => 'required',
        'usuario_actualiza' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function productoTipo()
    {
        return $this->belongsTo(\App\Models\ProductoTipo::class, 'producto_tipo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class, 'producto_id');
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
}
