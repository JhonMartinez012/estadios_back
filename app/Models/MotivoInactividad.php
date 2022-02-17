<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class MotivoInactividad extends Model
{
    public $table = 'motivos_inactividades'; // Nombre de la tabla en la DB
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    protected $fillable =[
        'nombre_motivo',
    ];


    // RELACION MUCHOS A MUCHOS CON ESTADIOS
    public function estadios()
    {
        return $this->belongsToMany('App\Models\Estadio','estadio_motivo_inactividad');
    }
    // ************** FIN DE LA RELACION :'( ****************************

}
