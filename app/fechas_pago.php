<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fechas_pago extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'fechas_de_pago';
    public $timestamps = false;

    function credito_fechas()
    {
        return $this->hasMany(mcredito::Class, 'id', 'id_credito');
    }
}
