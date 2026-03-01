<?php

namespace App\Services;

use App\Models\Presentation;
use App\Adapters\PresentationAdapter;

class PresentationService
{
    public function get(string $slug): array
    {
        /* $presentation = Presentation::with([
            'keyPoints',
            'missingItems',
            'staffNetjer',
            'clientContacts',
            'activities',
            'reports',
            'ticketGlobalAgents.tickets',
            'announcements'
        ])->where('slug', $slug)->firstOrFail(); */
        $presentation = Presentation::with([
            'projects.keyPoints',
            'projects.missingItems',
            'projects.staffNetjer',
            'projects.clientContacts',
            'projects.activities',
            'reports',
            'ticketGlobalAgents.tickets',
            'announcements'
        ])->where('slug', $slug)->firstOrFail();

        return PresentationAdapter::toArray($presentation);
    }
}