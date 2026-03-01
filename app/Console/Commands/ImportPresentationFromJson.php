<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Presentation,
    Project,
    Activity,
    KeyPoint,
    MissingItem,
    StaffNetjer,
    ClientContact,
    Report,
    TicketGlobalAgent,
    TicketAgentItem,
    Announcement
};
use Carbon\Carbon;

class ImportPresentationFromJson extends Command
{
    protected $signature = 'presentation:import {slug} {--path=}';
    protected $description = 'Importa una presentación desde un archivo JSON a la base de datos';

    public function handle()
    {
        $slug = $this->argument('slug');
        $path = $this->option('path')
            ?? storage_path("app/presentaciones/{$slug}.json");

        if (!file_exists($path)) {
            $this->error("Archivo no encontrado: {$path}");
            return Command::FAILURE;
        }

        $data = json_decode(file_get_contents($path), true);

        DB::transaction(function () use ($data, $slug) {
            $this->importPresentation($data, $slug);

            $presentation = $this->importPresentation($data, $slug);

            $this->importProjects($presentation, $data['proyectos'] ?? []);
            $this->importReports($presentation, $data['reportes'] ?? []);
            $this->importTickets($presentation, $data['tickets'] ?? []);
            $this->importAnnouncements($presentation, $data['anuncios'] ?? []);
        });

        

        $this->info('✅ Presentación importada correctamente');
        return Command::SUCCESS;
    }

    protected function importPresentation(array $data, string $slug): Presentation
    {
        return Presentation::updateOrCreate(
            ['slug' => $slug],
            [
                'titulo'     => $data['presentacion']['titulo'],
                'subtitulo'  => $data['presentacion']['subtitulo'] ?? null,
                'periodo'    => $data['presentacion']['periodo'],
                'logo_path'  => $data['presentacion']['logo'] ?? null,
            ]
        );
    }

    protected function importProjects(Presentation $presentation, array $projects): void
    {
        foreach ($projects as $p) {

            $project = $presentation->projects()->create([
                'cliente_nombre'    => $p['cliente']['nombre'],
                'cliente_logo_path' => $p['cliente']['logo'] ?? null,
                'nombre'            => $p['nombre'],
                'tecnologia'        => $p['tecnologia'],
                'estatus_label'     => $p['estatus']['label'],
                'estatus_color'     => $p['estatus']['color'],
                'fecha_programada' => $this->parseDate($p['fecha_programada'] ?? null),
                'horario'           => $p['horario'] ?? null,
            ]);

            // Puntos clave
            foreach ($p['puntos_clave'] ?? [] as $i => $text) {
                $project->keyPoints()->create([
                    'descripcion' => $text,
                    'orden' => $i
                ]);
            }

            // Faltantes
            foreach ($p['faltantes'] ?? [] as $text) {
                $project->missingItems()->create([
                    'descripcion' => $text
                ]);
            }

            // Personal Netjer
            foreach ($p['personal_netjer'] ?? [] as $person) {
                $project->staffNetjer()->create($person);
            }

            // Responsables Cliente
            foreach ($p['responsables_cliente'] ?? [] as $person) {
                $project->clientContacts()->create($person);
            }

            // Actividades
            foreach ($p['actividades'] ?? [] as $a) {
                $a['dateline'] = $this->parseDate($a['dateline'] ?? null);
                $project->activities()->create($a);
                
            }
        }
    }

    protected function importReports(Presentation $presentation, array $reports): void
    {
        foreach ($reports as $r) {
            $r['fecha_revision_interna'] =
            $this->parseDate($r['fecha_revision_interna'] ?? null);

            $r['fecha_entrega_cliente'] =
                $this->parseDate($r['fecha_entrega_cliente'] ?? null);

            $r['fecha_revision_cliente'] =
            $this->parseDate($r['fecha_revision_cliente'] ?? null);
            $presentation->reports()->create($r);
        }
    }

    protected function importTickets(Presentation $presentation, array $tickets): void
    {
        foreach ($tickets['globales']['agentes'] ?? [] as $agentData) {

            $agent = $presentation->ticketGlobalAgents()->create([
                'agente_nombre' => $agentData['nombre'],
                'asignados' => $agentData['asignados'],
                'cerrados' => $agentData['cerrados'],
                'primera_respuesta' => $agentData['primera_respuesta'],
                'espera_cliente' => $agentData['espera_cliente'],
                'en_curso' => $agentData['en_curso'],
                'pendiente' => $agentData['pendiente'],
            ]);

            $agentTickets = collect($tickets['por_agente'])
                ->firstWhere('agente', $agentData['nombre'])['tickets'] ?? [];

            foreach ($agentTickets as $t) {
                $agent->tickets()->create([
                    'solicitante' => $t['solicitante'],
                    'asunto' => $t['asunto'],
                    'ticket_codigo' => $t['ticket'],
                    'estatus' => $t['estatus'],
                    'responsable' => $t['responsable'],
                ]);
            }
        }
    }

    protected function importAnnouncements(Presentation $presentation, array $items): void
    {
        foreach ($items as $i => $a) {
            $presentation->announcements()->create([
                'imagen_path' => $a['imagen'] ?? null,
                'texto' => $a['texto'],
                'orden' => $i
            ]);
        }
    }

    protected function parseDate(?string $date): ?string
    {
        if (!$date) {
            return null;
        }

        try {
            return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        } catch (\Exception $e) {
            return null; // o lanzar excepción si prefieres ser estricto
        }
    }
}
    
