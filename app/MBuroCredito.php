<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\instituciones;
use App\Mburodirecciones;

class MBuroCredito extends Model
{
    // 
    Protected $primaryKey='id';
    Protected $table='buro_credito';

    
    public function Direcciones()
    {
        return $this->belongsTo(Mburodirecciones::class,'id_direcciones','id');
    } 
     
    public function Instituciones()
    {
        return $this->belongsTo(instituciones::class, 'id_instituciones', 'id');
    }
    
}
