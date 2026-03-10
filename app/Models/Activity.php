<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'project_id',
        'item',
        'tema',
        'descripcion',
        'estado',
        'dateline',
        'comentarios',
        'responsable'
    ];

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }

    public function project()
{
    return $this->belongsTo(Project::class);
}
}
