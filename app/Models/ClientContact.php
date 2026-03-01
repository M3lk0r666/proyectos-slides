<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientContact extends Model
{
    protected $fillable = [
        'project_id',
        'nombre',
        'puesto'
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
