<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\MBuroCredito;

class instituciones extends Model
{
    // 
    Protected $primaryKey='id';
    Protected $table='instituciones';

    public function buro()
    {
        return $this->belongsTo(MBuroCredito::class,'id_producto');
    }

}
