<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'presentation_id',
        'item',
        'cliente',
        'responsable_elaboracion',
        'fecha_revision_interna',
        'fecha_entrega_cliente',
        'fecha_revision_cliente',
        'responsable_sesion'
    ];

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }
}
