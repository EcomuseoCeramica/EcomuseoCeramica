<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Product
 *
 * @property $id
 * @property $Titulo
 * @property $Descripcion
 * @property $Video
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Informacion extends Model
{
    use HasFactory;

    static $rules = [
		'Titulo' => 'required',
		'Descripcion' => 'required',
		'Video' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Titulo','Descripcion','Video'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    


    public $timestamps = false;
    
}
