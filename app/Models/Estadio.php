<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class Estadio extends Model
{
    public $table = 'estadios';
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    protected $fillable = [
        'nombre_estadio',
        'acerca_estadio',
        'img_principal',
        'capacidad_estadio',
        'terreno_id',
        'ciudad_id',
    ];

    // ****** Relacion uno a muchos inverso con CIUDADES ********
    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudad');
    }
    // ***************** Fin de la relacion *********************

    // ****** Relacion uno a muchos inverso con TERRENOS ********
    public function terreno()
    {
        return $this->belongsTo('App\Models\Terreno');
    }
    // ***************** Fin de la relacion *********************





    // ** Relacion uno a muchos con IMAGENES ********
    public function imagenes()
    {
        return $this->hasMany('App\Models\Imagen');
    }
    // ******* FIN DE LA RELACION *******************

    // ** Relacion uno a muchos con TRIBUNAS ********
    public function tribunas()
    {
        return $this->hasMany('App\Models\Tribuna');
    }
    // ******* FIN DE LA RELACION *******************


    // RELACION MUCHOS A MUCHOS CON MOTIVOS DE INACTIVIDAD 
    public function motivo_inactividades()
    {
        return $this->belongsToMany('App\Models\MotivoInactividad','estadio_motivo_inactividad');
    }
    // ************** FIN DE LA RELACION :'( ****************************

}
