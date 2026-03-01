<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'presentation_id',
        'image_path',
        'texto',
        'orden'
    ];

    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }
}
