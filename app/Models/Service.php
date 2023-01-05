<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $id
 * @property $Nombre
 * @property $Fecha
 * @property $CantidadMin
 * @property $Precio
 * @property $Descripcion
 * @property $image
 * @property $persona_id
 *
 * @property Persona $persona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
    'Fecha' => 'required',
		'Precio' => 'required',
    'CantidadMin' => 'required',
		'Descripcion' => 'required',
    'persona_id' => 'required',
		'image' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Precio','Descripcion','image','Fecha','CantidadMin', 'persona_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    


    public $timestamps = false;
    
      /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }

}
