<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class Imagen extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    // ****** RELACION UNO A MUCHOS INVERSA CON ESTADIO *******
    public function estadio()
    {
        return $this->belongsTo('App\Models\Estadio');
    }
    // ************** FIN RELACION INVERSA ********************
}
