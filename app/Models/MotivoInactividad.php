<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class MotivoInactividad extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;


    // RELACION MUCHOS A MUCHOS CON ESTADIOS
    public function estadios()
    {
        return $this->belongsToMany('App\Models\Estadio');
    }
    // ************** FIN DE LA RELACION :'( ****************************

}
