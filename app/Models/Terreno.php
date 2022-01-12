<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class Terreno extends Model
{
    public $table = 'terrenos'; // sirve para saber con que tabla va a estar interactuando
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    protected $fillable =[
        'nombre_terreno',
        'img',
    ];

    // ********* Relacion uno a muchos con estadios **************
    public function estadios()
    {
        return $this->hasMany('App\Models\Estadio');
    }
    // ******************** Fin de la relacion ********************
}
