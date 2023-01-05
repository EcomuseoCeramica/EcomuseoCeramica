<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Service
 *
 * @property $id
 * @property $Ruta
 * @property $Vestimenta
 * @property $Dificultad
 * @property $Duracion
 * @property $service_id
 *
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Tour extends Model
{
    static $rules = [
		'Ruta' => 'required',
        'Vestimenta' => 'required',
		'Dificultad' => 'required',
        'Duracion' => 'required',
		'service_id' => 'required',
        
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Ruta','Vestimenta','Dificultad','Duracion','service_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    


    public $timestamps = false;
    
      /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->hasOne('App\Models\Service', 'id', 'service_id');
    }
    
}
