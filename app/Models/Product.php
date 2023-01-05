<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $Nombre
 * @property $precio
 * @property $Descripcion
 * @property $Utilidad
 * @property $Material
 * @property $image
 * @property $Tipo
 * @property $persona_id
 *
 * @property Persona $persona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'Nombre' => 'required',
		'precio' => 'required',
		'Descripcion' => 'required',
    'Utilidad' => 'required',
    'Material' => 'required',
    'persona_id' => 'required',
    'Tipo' => 'required',
		'image' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','precio','Descripcion','Material','Utilidad','image', 'persona_id','Tipo'];


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
