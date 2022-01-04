<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Tribuna extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;


    // ******** Relacion uno a muchos inversa con ESTADIOS ************
    public function estadios()
    {
        return $this->belongsTo('App\Models\Estadio');
    }
    // **************** FIN RELACION **********************************
}
