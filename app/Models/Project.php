<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $casts = [
        'fecha_programada' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    protected $fillable = [
        'presentation_id',
        'cliente_nombre',
        'cliente_logo_path',
        'nombre',
        'tecnologia',
        'estatus_label',
        'estatus_color',
        'fecha_programada',
        'horario'
    ];

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function keyPoints()
    {
        return $this->hasMany(KeyPoint::class)->orderBy('orden');
    }

    public function missingItems()
    {
        return $this->hasMany(MissingItem::class);
    }

    public function staffNetjer()
    {
        return $this->hasMany(StaffNetjer::class);
    }

    public function clientContacts()
    {
        return $this->hasMany(ClientContact::class);
    }
}
