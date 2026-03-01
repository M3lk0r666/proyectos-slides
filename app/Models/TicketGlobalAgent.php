<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketGlobalAgent extends Model
{
    protected $fillable = [
        'presentation_id',
        'agente_nombre',
        'asignados',
        'cerrados',
        'primera_respuesta',
        'espera_cliente',
        'en_curso',
        'pendiente'
    ];

    /**
     * La presentación a la que pertenece este agente.
     */
    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }

    /**
     * Tickets detallados del agente.
     */
    public function tickets()
    {
        return $this->hasMany(TicketAgentItem::class);
    }
}
