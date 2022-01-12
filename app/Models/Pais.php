<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class Pais extends Model
{
    public $table = 'paises';
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    protected $fillable =[
        'nombre_corto',
        'nombre',
    ];


    //Relacion uno a muchos con ciudades
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'pais_id', 'id');
    }
}
