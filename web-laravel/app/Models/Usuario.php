<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $usuario
 * @property $contrasena
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    static $rules = [
		'usuario' => 'required',
		'contrasena' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['usuario','contrasena'];



}
