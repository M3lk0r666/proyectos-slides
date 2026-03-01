<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyPoint extends Model
{
    protected $table = 'key_points';

    protected $fillable = [
        'project_id',
        'descripcion',
        'orden',
    ];

    /**
     * Proyecto al que pertenece el punto clave.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
