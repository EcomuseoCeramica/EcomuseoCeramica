<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Taller
 *
 * @property $id
 * @property $Categoria
* @property $Tematica
 * @property $service_id
 *
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Taller extends Model
{
    
    static $rules = [
	'Categoria' => 'required',
    'Tematica' => 'required',
    'service_id' => 'required',
		

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Categoria','Tematica', 'service_id'];


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
