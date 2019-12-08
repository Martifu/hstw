<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarjetasPersona extends Model
{

    protected $table = 'tarjetas_personas';
    public $timestamps=false;

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
