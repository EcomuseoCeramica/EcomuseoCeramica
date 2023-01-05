<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Service
 *
 * @property $id
 * @property $Nombre
 * @property $Identificacion
 * @property $TipoID
 * @property $Apellido1
 * @property $Apellido2
 * @property $Alimentacion
 * @property $CantidadPer
 * @property $Correo
 * @property $Extra
 * @property $Estado
 * @property $Telefono
 * @property $service_id
 *
 * @property Service $services
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Reserva extends Model
{
    static $rules = [
		'Nombre' => 'required',
        'Identificacion' => 'required',
        'TipoID' => 'required',
        'Apellido1' => 'required',
        'Apellido2' => 'required',
        'Correo' => 'required',
        'Telefono' => 'required',
        'Alimentacion' => 'required',
        'CantidadPer' => 'required',
        'service_id' => 'required',


    ];

    protected $perPage = 20;

        /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Identificacion','TipoID','Apellido1','Apellido2','Correo', 'Telefono', 'Alimentacion','CantidadPer','Estado','Extra','service_id'];


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
