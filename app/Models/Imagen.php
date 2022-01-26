<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class Imagen extends Model
{
    public $table="imagenes";
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    protected $fillable=[
        'ruta_img',
        'estadio_id',

    ];

    // ****** RELACION UNO A MUCHOS INVERSA CON ESTADIO *******
    public function estadio()
    {
        return $this->belongsTo('App\Models\Estadio');
    }
    // ************** FIN RELACION INVERSA ********************
}
