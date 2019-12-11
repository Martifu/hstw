<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcredito extends Model
{
    //
    Protected $primaryKey='id';
    
    public $timestamps = false;
    Protected $table='credito';

    function personas_credito()
    {
        return $this->hasMany(Persona::class, 'id_persona', 'id');
    }
}
