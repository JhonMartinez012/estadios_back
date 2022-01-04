<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class Pais extends Model
{
    use HasFactory;
    use Userstamps;
    use SoftDeletes;


    //Relacion uno a muchos con ciudades
    public function ciudades()
    {
        return $this->hasMany('App\Models\Ciudad');
    }
}
