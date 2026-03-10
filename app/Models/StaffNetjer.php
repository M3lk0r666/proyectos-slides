<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffNetjer extends Model
{
    protected $table = 'staff_netjers';

    protected $fillable = [
        'project_id',
        'nombre',
        'rol'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
