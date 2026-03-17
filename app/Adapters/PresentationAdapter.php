<?php

namespace App\Adapters;

use App\Models\Presentation;

class PresentationAdapter
{
    public static function toArray(Presentation $p): array
    {
        return [
            'presentacion' => [
                'logo' => $p->logo_path,
                'titulo' => $p->titulo,
                'subtitulo' => $p->subtitulo,
                'periodo' => $p->periodo,
            ],

            'proyectos' => $p->projects->map(fn ($project) => [
                'cliente' => [
                    'nombre' => $project->cliente_nombre,
                    'logo' => $project->cliente_logo_path,
                    'color' => $project->cliente_color ?? '#111827',
                ],
                'nombre' => $project->nombre,
                'tecnologia' => $project->tecnologia,
                /* 'fecha_programada' => optional($project->fecha_programada)->format('d/m/Y'), */
                'fecha_programada' => $project->fecha_programada ? $project->fecha_programada->format('d/m/Y') : null,
                'horario' => $project->horario,
                'estatus' => [
                    'label' => $project->estatus_label,
                    'color' => $project->estatus_color,
                ],
                'puntos_clave' => $project->keyPoints->pluck('descripcion')->toArray(),
                'faltantes' => $project->missingItems->pluck('descripcion')->toArray(),
                'personal_netjer' => $project->staffNetjer->map(fn ($p) => [
                    'nombre' => $p->nombre,
                    'rol' => $p->rol,
                ])->toArray(),
                'responsables_cliente' => $project->clientContacts->map(fn ($c) => [
                    'nombre' => $c->nombre,
                    'puesto' => $c->puesto,
                ])->toArray(),
                'actividades' => $project->activities->map(fn ($a) => [
                    'item' => $a->item,
                    'tema' => $a->tema,
                    'descripcion' => $a->descripcion,
                    'estado' => $a->estado,
                    'dateline' => optional($a->dateline)->format('d/m/Y'),
                    'comentarios' => $a->comentarios,
                    'responsable' => $a->responsable,
                ])->toArray(),
            ])->toArray(),

            'reportes' => $p->reports->map(fn ($r) => [
                'item' => $r->item,
                'cliente' => $r->cliente,
                'responsable_elaboracion' => $r->responsable_elaboracion,
                'fecha_revision_interna' => optional($r->fecha_revision_interna)->format('d/m/Y'),
                'fecha_entrega_cliente' => optional($r->fecha_entrega_cliente)->format('d/m/Y'),
                'fecha_revision_cliente' => optional($r->fecha_revision_cliente)->format('d/m/Y'),
                'responsable_sesion' => $r->responsable_sesion,
            ])->toArray(),

            'tickets' => [
                'globales' => [
                    'agentes' => $p->ticketGlobalAgents->map(fn ($a) => [
                        'nombre' => $a->agente_nombre,
                        'asignados' => $a->asignados,
                        'cerrados' => $a->cerrados,
                        'primera_respuesta' => $a->primera_respuesta,
                        'espera_cliente' => $a->espera_cliente,
                        'en_curso' => $a->en_curso,
                        'pendiente' => $a->pendiente,
                    ])->toArray(),
                ],
                'por_agente' => $p->ticketGlobalAgents->map(fn ($a) => [
                    'agente' => $a->agente_nombre,
                    'tickets' => $a->tickets->map(fn ($t) => [
                        'solicitante' => $t->solicitante,
                        'asunto' => $t->asunto,
                        'ticket' => $t->ticket_codigo,
                        'estatus' => $t->estatus,
                        'responsable' => $t->responsable,
                    ])->toArray(),
                ])->toArray(),
            ],

            'anuncios' => $p->announcements
                ->sortBy('orden')
                ->map(fn ($a) => [
                    'imagen' => $a->imagen_path,
                    'texto' => $a->texto,
                ])->toArray(),
        ];
    }
}