<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MBuroCredito;


class Mburodirecciones extends Model
{
    //
    Protected $primaryKey='id';
    Protected $table='direcciones_buro';

    public function buro()
    {
        return $this->belongsTo(MBuroCredito::class,'id_institucion');
    }
    public function ted()
    {
        return $this->belongsTo(MBuroCredito::class, 'id_institucion', 'id');
    }
}
