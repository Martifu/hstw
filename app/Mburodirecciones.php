<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MBuroCredito;


class Mburodirecciones extends Model
{
    //
    
    public $timestamps = false;
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
    public function direcciones()
    {
        return $this->belongsTo(MBuroCredito::class, 'id_direcciones', 'id');
    }
}
