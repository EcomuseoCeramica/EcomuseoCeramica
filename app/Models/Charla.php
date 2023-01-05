<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Charla
 *
 * @property $id
 * @property $HoraInicio
 * @property $HoraFin
 * @property $Ubicación
* @property $service_id
 *
 * @property Charla $charla
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Charla extends Model
{
    static $rules = [
		'HoraInicio' => 'required',
        'HoraFin' => 'required',
		'Ubicacion' => 'required',
		'service_id' => 'required',
        
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['HoraInicio','HoraFin','Ubicacion','service_id'];


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

    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
}
