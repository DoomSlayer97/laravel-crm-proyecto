<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model {
    
    protected $table = 'pais';

    protected $fillable = [
        'nombre'
    ];

    //relaciones del modelo
    public function Estados() {
        return $this -> hasMany(Estado::class, 'id_pais');
    }

}
