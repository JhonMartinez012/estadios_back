<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class EstadioMotivoInactividad extends Model
{
    public $table = 'estadio_motivo_inactividad';
    use HasFactory;
    use Userstamps;
    use SoftDeletes;

    protected $fillable = [
        'estadio_id',
        'motivo_inactividad_id',
        'fecha'
    ];

}
