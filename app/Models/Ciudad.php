<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Ciudad extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;


    //Relacion uno a muchos inversa con pais
    public function pais()
    {
        return $this->belongsTo('App\Models\Pais');
    }
    // **************** Fin de la Relacion ***********

    // ***** Relacion de uno a muchos con estadios ********
    public function estadios()
    {
        return $this->hasMany('App\Models\Estadio');
    }
    // **************** Fin relacion **********************

}
