<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketAgentItem extends Model
{
    protected $fillable = [
        'ticket_global_agent_id',
        'solicitante',
        'asunto',
        'ticket_codigo',
        'estatus',
        'responsable'
    ];

    public function globalAgent()
    {
        return $this->belongsTo(TicketGlobalAgent::class, 'ticket_global_agent_id');
    }
}
