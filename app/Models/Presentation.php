<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $fillable = [
        'slug','titulo','subtitulo','periodo','logo_path'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function ticketGlobalAgents()
    {
        return $this->hasMany(TicketGlobalAgent::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}
