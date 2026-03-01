<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MissingItem extends Model
{
    protected $fillable = [
        'project_id',
        'descripcion'
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
