<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $Descripcion
 * @property $image
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Galeria extends Model
{
    static $rules = [
		'Descripcion' => 'required',
		'image' => 'required',

    ];
    protected $perPage = 20;
        /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Descripcion','image'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    use HasFactory;
    public $timestamps = false;
}
