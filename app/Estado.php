<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model {
    
    protected $table = 'estado';

    protected $fillable = [
        'nombre'
    ];

    //relaciones del modelo
    public function Pais() {
        return $this -> belongsTo(Pais::class, 'id_pais');
    }

}
