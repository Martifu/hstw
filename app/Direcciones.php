<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $table = 'direcciones';
    public $timestamps=false;

    public function Direcciones()
    {
        return $this->hasMany(Direcciones::class);
    }

}
