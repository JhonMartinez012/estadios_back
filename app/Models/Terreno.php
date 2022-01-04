<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class Terreno extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    // ********* Relacion uno a muchos con estadios **************
    public function estadios()
    {
        return $this->hasMany('App\Models\Estadio');
    }
    // ******************** Fin de la relacion ********************
}
