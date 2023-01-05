<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    static $rules = [
		'Nombre' => 'required',
		'Apellido1' => 'required',
		'Apellido2' => 'required',
        'Correo' => 'required',
        'Telefono' => 'required',
        'Tipo_Persona' => 'required',
        'Tipo_Artesania' => 'required',

    ];
    protected $perPage = 20;
        /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre','Apellido1','Apellido2','Correo','Telefono','Tipo_Persona', 'Tipo_Artesania'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    
    use HasFactory;
    public $timestamps = false;
}
