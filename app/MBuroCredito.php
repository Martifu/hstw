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

    public $timestamps = false;
    
    public function Direcciones()
    {
        return $this->belongsTo(Mburodirecciones::class,'id_direcciones','id');
    } 
     
    
    public function instituciones()
    {
        return $this->hasMany(instituciones::class, 'id');
    }
    
}
    
    

