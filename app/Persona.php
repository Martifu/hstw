<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    public $timestamps=false;

    public function tarjeta(){
        return $this->hasMany(TarjetasPersona::class, 'id_personas');
    }
}
